<?php

/**
  * @author Leong Wai Loc
  */

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;
use XSLTProcessor;

class ReportsController extends Controller
{
    public function fetchDefaultSalesData($start = '', $end = '')
    {
        $startDate = ($start == '' && $end == '')
            ? Carbon::now()->subMonths(3)->startOfDay()
            : ($start ?: Carbon::parse($start));

        $endDate = ($start == '' && $end == '')
            ? Carbon::now()->endOfDay()
            : ($end ?: Carbon::parse($end));


        $orders = Order::whereBetween('created_on', [$startDate, $endDate])->get();

        // Fetch sales by category
        $salesByCategory = DB::table('order_item')
            ->join('order', 'order_item.order_id', '=', 'order.id')
            ->join('product', 'order_item.product_id', '=', 'product.id')
            ->select(DB::raw('SUM(order_item.subtotal) as total_sales, product.category'))
            ->whereBetween('order.created_on', [$startDate, $endDate])
            ->groupBy('product.category')
            ->get();


        // Fetch sales data for the last 3 months
        if ($start === null && $end === null) {
            $lastThreeMths = Carbon::now()->subMonths(3);
            $salesData = DB::table('order')
                ->select(DB::raw('SUM(total) as total_sales, DATE_FORMAT(created_on, "%Y-%m") as month'))
                ->where('created_on', '>=', $lastThreeMths)
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        } else {
            $salesData = DB::table('order')
                ->select(DB::raw('SUM(total) as total_sales, DATE_FORMAT(created_on, "%Y-%m") as month'))
                ->whereBetween('created_on', [$startDate, $endDate])
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        }

        return [
            'orders' => $orders,
            'salesByCategory' => $salesByCategory,
            'salesData' => $salesData,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }

    public function reports()
    {
        $data = $this->fetchDefaultSalesData();
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];

        $orders = $data['orders'];
        $totalSubtotal = $orders->sum('subtotal');
        $salesByCategory = $data['salesByCategory'];
        $salesData = $data['salesData'];

        return view('admin.pages.report-page', [
            'salesByCategory' => $salesByCategory,
            'salesData' => $salesData,
            "orders" => $orders,
            'totalSubtotal' => $totalSubtotal,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    public function filterOrdersForReport(Request $request)
    {
        $request->validate([
            'txtStartdate' => 'required|date',
            'txtEnddate' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->input('txtStartdate'))->startOfDay();
        $endDate = Carbon::parse($request->input('txtEnddate'))->endOfDay();
        $data = $this->fetchDefaultSalesData($startDate, $endDate);

        $orders = $data['orders'];
        $totalSubtotal = $orders->sum('subtotal');
        $salesByCategory = $data['salesByCategory'];
        $salesData = $data['salesData'];

        return view('admin.pages.report-page', compact('orders', 'totalSubtotal', 'salesByCategory', 'salesData', 'startDate', 'endDate'));
    }

    public function downloadReport(Request $request)
    {
        $reportName = $request->input('reportName');
        $startDate = $request->input('reportStartDate');
        $endDate = $request->input('reportEndDate');
        $jsonData = json_decode($request->input('exportReport'), true);

        $xmlData = new SimpleXMLElement('<report></report>');
        $xmlData->addChild('report_name', $reportName);
        $xmlData->addChild('start_date', $startDate);
        $xmlData->addChild('end_date', $endDate);

        // Handle different report types
        switch ($reportName) {
            case 'sales_by_category':
                $salesByCategory = $xmlData->addChild('sales_by_category');
                foreach ($jsonData as $data) {
                    $category = $salesByCategory->addChild('category');
                    $category->addChild('name', $data['category']);
                    $category->addChild('total_sales', $data['total_sales']);
                }
                break;

            case 'sales_figure':
                $salesFigure = $xmlData->addChild('sales_figure');
                foreach ($jsonData as $data) {
                    $sale = $salesFigure->addChild('sale');
                    $sale->addChild('month', $data['month']);
                    $sale->addChild('total_sales', $data['total_sales']);
                }
                break;
        }

        $xmlContent = $xmlData->asXML();

        if ($request->input('action') == 'download_xml') {

            return Response::make($xmlContent, 200, [
                'Content-Type' => 'application/xml',
                'Content-Disposition' => 'attachment; filename="' . $reportName . '-report.xml"'
            ]);

        } else if ($request->input('action') == 'download_xlsx') {
            $xmlContent = $xmlData->asXML(); // Get XML string from SimpleXMLElement
            $response = Http::post('http://localhost:5000/api/XMLToXSLT/xml2xlsx', [
                'xmlContent' => $xmlContent
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $message = $data['Message'] ?? 'File successfully downloaded!';

                // Pass the message to your view
                $data = $this->fetchDefaultSalesData();
                return view('admin.pages.report-page', [
                    'salesByCategory' => $data['salesByCategory'],
                    'salesData' => $data['salesData'],
                    "orders" => $data['orders'],
                    'totalSubtotal' => $data['orders']->sum('subtotal'),
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ])->with('successMessage', $message);
            } else {
                return view('admin.pages.report-page', [
                    'salesByCategory' => $data['salesByCategory'],
                    'salesData' => $data['salesData'],
                    "orders" => $data['orders'],
                    'totalSubtotal' => $data['orders']->sum('subtotal'),
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ])->with('errorMessage', 'Failed to convert XML to XLSX.');
            }
        }
    }

    public function uploadXmlReport(Request $request)
    {
        $request->validate([
            'xmlFile' => 'required|file|mimes:xml',
        ]);

        if ($request->hasFile('xmlFile')) {
            $file = $request->file('xmlFile');
            $xmlFilePath = $file->store('uploads');
            $xmlContent = simplexml_load_file(storage_path('app/' . $xmlFilePath));

            $xml = simplexml_load_file(storage_path('app/' . $xmlFilePath));

            $xslFileName = $this->getXslByXmlFileName($file->getClientOriginalName());
            if ($xslFileName === null) {
                return back()->withErrors('No matching XSL file found for the uploaded XML.');
            }

            $xslFilePath = base_path('public/xslt/') . $xslFileName;

            $xsl = new \DOMDocument;
            $xsl->load($xslFilePath);

            $proc = new XSLTProcessor();
            $proc->importStylesheet($xsl);
            $htmlContent = $proc->transformToXML($xmlContent);

            return view('admin.pages.report-page', compact('htmlContent'));
        }
    }

    protected function getXslByXmlFileName($xmlFileName)
    {
        switch ($xmlFileName) {
            case 'sales_by_category-report.xml':
                return 'sales_category.xsl';
            case 'sales_figure-report.xml':
                return 'sales-figure_time.xsl';
            default:
                return null;
        }
    }
}
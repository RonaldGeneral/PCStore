@extends('admin.layouts.default')

@section('custom-admin-head')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stop

@section('content')
<div class="page-path">
    Report & Analytics
</div>

@if(isset($htmlContent))
    <div class="row">
        <div class="col-1">
            <a class="btn btn-primary" href="{{ route('admin.reports') }}">Back</a>
        </div>
        <div class="col-5">
            <form action="{{ route('admin.upload-xml') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-start mb-4">
                    <input type="file" name="xmlFile" required />
                    <button type="submit" class="btn btn-secondary mx-2 p-2">Import XML Report</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="d-flex d-flex-gap mt-4">
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body">
                        @php echo $htmlContent; @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>

@else
    @php
        if ($startDate != null && $endDate != null) {
            $startDate = Carbon\Carbon::parse($startDate)->format('Y-m-d');
            $endDate = Carbon\Carbon::parse($endDate)->format('Y-m-d');
        }
    @endphp
    <div class="row justify-content-between">
        <div class="col-6">
            <form action="{{ route('admin.filter-orders') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-start mb-4">
                    <span class="d-inline-block align-middle">
                        <p class="text-muted fs-09 fw-bold mx-2 me-3 mt-2 align-middle">Filter By Date</p>
                    </span>
                    <input type="date" class="btn btn-secondary mx-2 fs-09 py-0" value="{{ old('startDate', $startDate ?? '') }}" id="txtStartdate" name="txtStartdate"></input>
                    <span class="d-inline-block align-middle">
                        <p class="text-muted fs-09 fw-bold mx-3 mt-2 align-middle"> to </p>
                    </span>
                    <input type="date" class="btn btn-secondary mx-2 fs-09 py-0" value="{{ old('endDate', $endDate ?? '') }}" id="txtEnddate" name="txtEnddate"></input>
                    <button type="submit" class="btn btn-primary mx-2 py-0">Generate Report</button>
                </div>
            </form>
        </div>
        <div class="col-5">
            <form action="{{ route('admin.upload-xml') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-start mb-4 float-end">
                    <input type="file" name="xmlFile" required />
                    <button type="submit" class="btn btn-secondary mx-2 p-2">Import XML Report</button>
                </div>
            </form>
        </div>
    </div>

    <div id="FormViewOrder" class="col-12">
        <div class="d-flex d-flex-gap w-100 justify-content-evenly">
            <div class="card shadow-lg col bg-info">
                <div class="card-body text-center">
                    <div class="h5 mb-2">Sales</div>
                    <div class="h3 my-3 fw-bold">RM {{ $totalSubtotal ? number_format($totalSubtotal, 2) : 0.00}}
                    </div>
                </div>
            </div>
            <div class="card shadow-lg col bg-warning rounded">
                <div class="card-body text-center">
                    <div class="h5 mb-2">Number of Orders</div>
                    <div class="h3 my-3 fw-bold">
                        {{ $orders ? $orders->count() : 0 }}
                    </div>
                </div>
            </div>
            <div class="card shadow-lg col bg-danger">
                <div class="card-body text-center">
                    <div class="h5 mb-2">Completed Orders</div>
                    <div class="h3 my-3 fw-bold">
                        {{ $orders ? $orders->where('status', 4)->count() : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex d-flex-gap mt-4">
            <div class="col-6">
                <div class="card p-3">
                    <div class="card-body">
                        <form action="{{ route('admin.download-report') }}" method="POST">
                            @csrf
                            <h5>Sales Figure</h5>
                            <div>
                                <canvas id="sales-figure"></canvas>
                            </div>
                            <input type="hidden" name="reportName" value="sales_figure" />
                            <input type="hidden" name="reportStartDate" value="{{ $startDate }}" />
                            <input type="hidden" name="reportEndDate" value="{{ $endDate }}" />
                            <input type="hidden" name="exportReport" value="{{ json_encode($salesData) }}" />
                            <script>
                                const salesData = @json($salesData);

                                var data = {
                                    labels: salesData.map(data => data.month),
                                    datasets: [
                                        {
                                            label: "Total Sales (RM)",
                                            data: salesData.map(data => data.total_sales),
                                            backgroundColor: 'rgba(151,187,205,0.2)',
                                            borderColor: 'rgba(151,187,205,1)',
                                            pointBackgroundColor: 'rgba(151,187,205,1)',
                                            pointBorderColor: "#fff",
                                            pointHoverBackgroundColor: "#fff",
                                            pointHoverBorderColor: 'rgba(151,187,205,1)',
                                            pointHoverBorderColor: 'rgba(220,220,220,1)',
                                            fill: false,
                                            tension: 0.1
                                        },
                                    ]
                                };

                                var ctx = document.getElementById("sales-figure").getContext("2d");

                                new Chart(ctx, {
                                    type: 'line',
                                    data: data,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                            <br /><br />
                            <button type="submit" name="action" class="btn btn-secondary mx-2" value="download_xml">Download as XML</button>
                            <button type="submit" name="action" class="btn btn-success mx-2" value="download_xlsx">Download as XSLX (Excel)</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card p-3">
                    <div class="card-body">
                        <form action="{{ route('admin.download-report') }}" method="POST">
                            @csrf
                            <h5 class="header-title mb-3">Sales by Category</h5>
                            <div>
                                <canvas id="sales-category-chart"></canvas>
                            </div>
                            <input type="hidden" name="reportName" value="sales_by_category" />
                            <input type="hidden" name="reportStartDate" value="{{ $startDate }}" />
                            <input type="hidden" name="reportEndDate" value="{{ $endDate }}" />
                            <input type="hidden" name="exportReport" value="{{ json_encode($salesByCategory) }}" />

                            <script>
                                const ctx2 = document.getElementById('sales-category-chart').getContext('2d');

                                new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: @json($salesByCategory->pluck('category')),
                                        datasets: [{
                                            label: 'Sales by Category (RM)',
                                            data: @json($salesByCategory->pluck('total_sales')->map(fn($item) => (float) $item)),
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                            <br /><br />
                            <button type="submit" name="action" class="btn btn-secondary mx-2" value="download_xml">Download as XML</button>
                            <button type="submit" name="action" class="btn btn-success mx-2" value="download_xlsx">Download as XSLX (Excel)</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    const startDateInput = document.getElementById('txtStartdate');
    const endDateInput = document.getElementById('txtEnddate');

    startDateInput.addEventListener('change', () => {
        const startDate = new Date(startDateInput.value);
        const minEndDate = new Date(startDate);
        minEndDate.setDate(minEndDate.getDate() + 1);

        endDateInput.min = minEndDate.toISOString().split('T')[0];
    });
</script>
@stop
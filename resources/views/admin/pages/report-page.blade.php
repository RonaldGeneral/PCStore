@extends('admin.layouts.default')

@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
<script src="{{ URL::asset('external/admin-header.js') }}"></script>
@stop

@section('content')
<div class="page-path">
    Report & Analytics
</div>

<!-- <asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:StoreConnString %>" SelectCommand="SELECT SUM(total) as sales, COUNT(id) as num, (SELECT COUNT(id) FROM [order] WHERE status = 3) as complete FROM [order] "></asp:SqlDataSource>
<asp:SqlDataSource ID="SqlDataSource2" runat="server" ConnectionString="<%$ ConnectionStrings:StoreConnString %>" SelectCommand="SELECT TOP 3 oi.product_id,p.title, p.img_src1, SUM(subtotal) as sales, SUM(quantity) AS quan FROM product p, order_item oi WHERE p.id = oi.product_id GROUP BY oi.product_id, p.img_src1,p.title ORDER BY SUM(quantity) desc,SUM(subtotal) DESC"></asp:SqlDataSource> -->

<div class="d-flex justify-content-start mb-4">
    <span class="d-inline-block align-middle">
        <p class="text-muted fs-09 fw-bold mx-2 me-3 mt-2 align-middle">Filter By Date</p>
    </span>
    <input type="date" class="btn btn-secondary mx-2 fs-09 py-0" value="2023-01-01" id="txtStartdate"></input>
    <span class="d-inline-block align-middle">
        <p class="text-muted fs-09 fw-bold mx-3 mt-2 align-middle"> to </p>
    </span>
    <input type="date" class="btn btn-secondary mx-2 fs-09 py-0" value="2023-08-01" id="txtEnddate"></input>
</div>

<div id="FormViewOrder" class="col-12"><!-- SqlDataSource1 -->
    <div class="d-flex d-flex-gap w-100 justify-content-evenly">
        <div class="card shadow-lg col bg-info">
            <div class="card-body text-center">
                <div class="h5 mb-2">Sales</div>
                <div class="h3 my-3 fw-bold">RM
                </div>
            </div>
        </div>
        <div class="card shadow-lg col bg-warning rounded">
            <div class="card-body text-center">
                <div class="h5 mb-2">Number of Orders</div>
                <div class="h3 my-3 fw-bold">
                    quantity
                </div>
            </div>
        </div>
        <div class="card shadow-lg col bg-danger">
            <div class="card-body text-center">
                <div class="h5 mb-2">Completed Order</div>
                <div class="h3 my-3 fw-bold">
                    completed quant
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex d-flex-gap mt-4">
        <div class="col-6">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Sales Figure</h5>

                    <div>
                        <canvas id="sales-figure">

                        </canvas>
                    </div>

                    <script>
                        const canvasSF = document.getElementById('sales-figure');

                        new Chart(canvasSF, {
                            type: 'line',
                            data: {
                                labels: [
                                        <%# getDates("SUM") %>

                                    ],
                                datasets: [{
                                    label: 'Sales Figure (RM)',
                                    data: [<%# getSales("SUM") %>],
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1
                                }]
                            },
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Sales Order</h5>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>

                    <script>
                        const ctx = document.getElementById('myChart');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [<%# getDates("COUNT") %>],
                                datasets: [{
                                    label: 'Number of Sales',
                                    data: [<%# getSales("COUNT") %>],
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

                </div>
            </div>
        </div>
    </div>

    <div class="d-flex d-flex-gap mt-4">
        <div class="col-6">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Best Selling Products</h5>

                    <div id="bestSelling" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">

                            <div id="repeaterAdmin"> <!-- SqlDataSource2 -->
                                <div class="carousel-item ">
                                    <div class="card m-auto" style="width: 18rem;">
                                        <a class="text-center" href="#productDetails">
                                            <img src="" width="225" class="p-3 m-auto">
                                        </a>

                                        <div class="card-body text-center">
                                            <div class="card-title h6">
                                                title
                                            </div>
                                            <div class="text-muted fs-09">RM
                                            </div>
                                            <div class="h4 mt-2">
                                                quantity<small class="text-muted ms-2">Sold</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bestSelling" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bestSelling" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Total Sales By Category</h5>
                    <div>
                        <canvas id="salesCategory"></canvas>
                    </div>

                    <script>
                        const ctxSC = document.getElementById('salesCategory');
                        new Chart(ctxSC, {
                            type: 'doughnut',
                            data: {
                                labels: [
                                    'Accessories',
                                    'Prebuilt',
                                    'Laptop'
                                ],
                                datasets: [{
                                    label: 'Total Sales Number',
                                    data: [<%# getCat() %>],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                    ],
                                    hoverOffset: 4,
                                }]
                            },
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
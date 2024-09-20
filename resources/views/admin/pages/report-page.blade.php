@extends('admin.layouts.default')

@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
<script src="{{ URL::asset('external/admin-header.js') }}"></script>
@stop

@section('content')
<div class="page-path">
    Report & Analytics
</div>

<div class="d-flex justify-content-start mb-4">
    <span class="d-inline-block align-middle">
        <p class="text-muted fs-09 fw-bold mx-2 me-3 mt-2 align-middle">Filter By Date</p>
    </span>
    <input type="date" class="btn btn-secondary mx-2 fs-09 py-0" value="" id="txtStartdate"></input>
    <span class="d-inline-block align-middle">
        <p class="text-muted fs-09 fw-bold mx-3 mt-2 align-middle"> to </p>
    </span>
    <input type="date" class="btn btn-secondary mx-2 fs-09 py-0" value="" id="txtEnddate"></input>
</div>

<div id="FormViewOrder" class="col-12">
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
                        <canvas id="sales-figure"></canvas>
                    </div>

                    <script>
                        const ctxSF = document.getElementById('sales-figure').getContext('2d');

                        new Chart(ctxSF, {
                            type: 'line',
                            data: {
                                labels: @json($salesData->pluck('date')),
                                datasets: [{
                                    label: 'Sales Figure (RM)',
                                    data: @json($salesData->pluck('total_sales')), 
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        type: 'time',
                                        time: {
                                            unit: 'day'
                                        }
                                    },
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

        <div class="col-6">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Sales by Category</h5>
                    <div>
                        <canvas id="sales-category-chart"></canvas>
                    </div>

                    <script>
                        const ctx = document.getElementById('sales-category-chart').getContext('2d');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: @json($salesByCategory->pluck('name')), // Category names
                                datasets: [{
                                    label: 'Sales by Category (RM)',
                                    data: @json($salesByCategory->pluck('total_sales')), // Sales totals
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

                </div>
            </div>
        </div>
    </div>

    <!-- <div class="d-flex d-flex-gap mt-4">
        <div class="col-6">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Best Selling Products</h5>

                    <div id="bestSelling" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">

                            <div id="repeaterAdmin">
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
    </div> -->
</div>

<script>
    const startDateInput = document.getElementById('txtStartdate');
    const endDateInput = document.getElementById('txtEnddate');

    startDateInput.addEventListener('change', () => {
        const startDate = new Date(startDateInput.value);
        const minEndDate = new Date(startDate);
        minEndDate.setDate(minEndDate.getDate() + 1); // Set min end date to the next day

        endDateInput.min = minEndDate.toISOString().split('T')[0]; // Set the min attribute
    });
</script>
@stop
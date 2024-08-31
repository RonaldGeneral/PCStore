@extends('admin.layouts.default')

@section('content')
<div class="page-path">
    <a class="me-2" href="{{url()->previous()}}">
        <svg class="mb-2 me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg>
        Order Details #0001290
     </a>
    
</div>
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-10 col-sm-11">

        <div class="steps">
            <progress id="progress" value=0 max=100></progress>
            <div class="step-item">
                <button class="step-button text-center" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    1
                </button>
                <div class="step-title">
                    Ordered
                </div>
            </div>
            <div class="step-item">
                <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2
                </button>
                <div class="step-title">
                    To Ship
                </div>
            </div>
            <div class="step-item">
                <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3
                </button>
                <div class="step-title">
                    Completed
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex">
    <div class="col-7 mx-4">
        <div class="card p-3">
            <div class="card-body">
                <h5 class="header-title mb-3">Items</h5>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="d-flex">
                                   <div class="me-3 d-inline-block col-3"> 
                                        <a href="{{ url('admin/product-details') }}">
                                            <img src="https://microless.com/cdn/products/0e26f97ec0304e2e71951d4f72a84c21-md.jpg"
                                                title="product-img" class="rounded" height="64">

                                        </a>
                                   </div>
                                        <p class="m-0 d-inline-block align-middle font-16 col-10">
                                            <a href="{{ url('admin/product-details') }}">Asus Tuf F17 FX707ZC4</a>
                                        </p>
                                    
                                </td>
                                <td>1</td>
                                <td>RM 4,298.00</td>
                                <td>RM 4,298.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-3">
            <div class="card-body">
                <h5 class="header-title mb-3">Order Summary</h5>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Subtotal :</td>
                                <td>RM 4,298.00</td>
                            </tr>
                            <tr>
                                <td>Shipping Fee : </td>
                                <td>RM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.00</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Total :</th>
                                <th class="bg-light">RM 4,306.00</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<div class="d-flex mt-4 justify-content-start">
    <div class="col-3 mx-4">
        <div class="card p-3">
            <div class="card-body">
                <h5 class="header-title mb-3">Contact Information</h5>

                <h6>Mary Jones</h6>

                <address class="my-0 pt-2 font-14 address-lg">
                    20, Jalan Melaka 20<br>
                    50634 Setapak<br>
                    Kuala Lumpur<br>
                    <span class="text-muted">Mobile: 011-28391022</span>
                    <br>
                    <span class="text-muted">Email: jones1@gmail.com
                </address>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-3">
        <div class="card p-3">
            <div class="card-body">
                <h5 class="header-title mb-3">Billing Information</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span> Credit Card</p>
                        <p class="mb-2"><span class="fw-bold me-2">Provider:</span> CIMB Bank</p>
                        <p class="mb-2"><span class="fw-bold me-2">Holder Name:</span> Mary Jones</p>
                        <p class="mb-2"><span class="fw-bold me-2">Expiration Date:</span> 02/2028</p>
                    </li>
                </ul>

            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

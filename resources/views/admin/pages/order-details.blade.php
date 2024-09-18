@extends('admin.layouts.default')

@section('content')
<div class="page-path">
    <a class="me-2" href="{{url()->previous()}}">
        <svg class="mb-2 me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg>
        Order Details #{{$order->id}}
     </a>
    
</div>
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-10 col-sm-11">

        <div class="steps">
            <progress id="progress" value={{($order->status - 1) * 34}} max=100></progress>
            <div class="step-item">
                <button class="step-button text-center" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    1
                </button>
                <div class="step-title">
                    Order Created
                </div>
            </div>
            <div class="step-item">
                <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="{{$order->status >= 2?'true':'false'}}" aria-controls="collapseTwo">
                    2
                </button>
                <div class="step-title">
                    Driver Assigned
                </div>
            </div>
            <div class="step-item">
                <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="{{$order->status >= 3?'true':'false'}}" aria-controls="collapseThree">
                    3
                </button>
                <div class="step-title">
                    Ongoing
                </div>
            </div>
            <div class="step-item">
                <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="{{$order->status >= 4?'true':'false'}}" aria-controls="collapseThree">
                    4
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
                            @foreach ($order->orderItems as $item)

                            <tr>
                                <td class="d-flex">
                                   <div class="me-3 d-inline-block col-3"> 
                                        <a href="{{ route('products.view', $item->product->id) }}">
                                            <img src="{{Storage::disk('products')->url($item->product->img_src1)}}"
                                                title="product-img" class="rounded" height="64">

                                        </a>
                                   </div>
                                        <p class="m-0 d-inline-block align-middle font-16 col-10">
                                            <a href="{{ route('products.view', $item->product->id) }}">{{$item->product->title}}</a>
                                        </p>
                                    
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>RM {{number_format($item->price, 2, '.', ',')}}</td>
                                <td>RM {{number_format($item->subtotal, 2, '.', ',')}}</td>
                            </tr>

                            @endforeach
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
                                <td>RM {{number_format($order->subtotal, 2, '.', ',')}}</td>
                            </tr>
                            <tr>
                                <td>Shipping Fee : </td>
                                <td>RM {{number_format($order->delivery_fee, 2, '.', ',')}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Total :</th>
                                <th class="bg-light">RM {{number_format($order->total, 2, '.', ',')}}</th>
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

                <h6>{{$order->customer->name}}</h6>

                <address class="my-0 pt-2 font-14 address-lg">
                    {{$order->customer->address}}<br>
                    {{$order->customer->postcode}} {{$order->customer->city}}<br>
                    {{$order->customer->state}}<br>
                    <span class="text-muted">Mobile: {{$order->customer->phone}}</span>
                    <br>
                    <span class="text-muted">Email: {{$order->customer->email}}
                </address>

            </div>
        </div>
    </div> <!-- end col -->

    @if($order->payment)

        <div class="col-3">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Billing Information</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            
                            @switch($order->payment->payment_method)
                                @case('tng')
                                    <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span>TnG Ewallet</p>
                                    <p class="mb-2"><span class="fw-bold me-2">TnG number:</span> {{$order->payment->tng_number}}</p>
                                    @break
                                @case('fpx')
                                    <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span>FPX Transfer</p>
                                    <p class="mb-2"><span class="fw-bold me-2">FPX Bank Name:</span> {{$order->payment->fpx_bank_name}}</p>
                                    <p class="mb-2"><span class="fw-bold me-2">Card Number:</span> {{$order->payment->card_number}}</p>
                                    @break
                                @case('card')
                                    <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span>Debit/Credit card</p>
                                    <p class="mb-2"><span class="fw-bold me-2">Card number:</span> {{$order->payment->card_number}}</p>
                                    @break
                            @endswitch
                        </li>
                    </ul>

                </div>
            </div>
        </div> 

    @endif
</div>
@stop

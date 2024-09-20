@extends('front.layouts.default')

@section('content')
<div>
    <h4 class="fs-4 h4 fw-bold">Payment Summary</h4>

    <div class="d-flex mt-4 justify-content-between">
        <div class="card mb-4 col-8">
            <div class="card-body">
                <div class="row px-2 mb-3 text-muted fw-bold">
                    <div class="col-7">Product Details</div>
                    <div class="col-2">Quantity</div>
                    <div class="col-3 text-center">Total</div>
                </div>
                @foreach($order->orderItems as $item)
                <!-- Single item -->
                <div class="row w-100">
                    <div class="col-3">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <a class="w-100" href="{{ route('front.viewProduct', $item->product->id) }}">
                                <img src="{{ Storage::disk('products')->url($item->product->img_src1) }}" width="150" height="150">
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- Data -->
                        <p>
                            <a class="link-primary fs-6 text-decoration-none" href="{{ route('front.viewProduct', $item->product->id) }}">
                                <strong>{{$item->product->title}}</strong>
                            </a>
                        </p>
                    </div>
                    <div class="col-3">
                        <!-- Quantity -->
                        <div class="d-flex mb-4 justify-content-center" >
                            <div class="form-outline d-flex ">
                                <input name="quantity" type="number" size="50" min="1" max="50" value="{{$item->quantity}}"
                                    class="form-control w-100 text-center" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <!-- Price -->
                        <p class="text-end pe-3 w-75 fs-6">
                            <strong>RM {{number_format($item->subtotal, 2, '.', ',')}}</strong>
                        </p>
                    </div>
                </div>
                <hr class="my-4" />
                @endforeach
            </div>
        </div>
         {!! $payment_html !!}
    </div>

    <a class="btn btn-primary" href="{{route('front.home')}}">Back to Home</a>
</div>
@stop
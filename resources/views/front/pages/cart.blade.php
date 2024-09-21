@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/cart.css') }}" rel="stylesheet" />
@stop

@section('content')
<!-- Author: Teh Chong Shin -->
<h2 class="fw-bold pb-3">Shopping Cart</h2>
<div class="row d-flex justify-content-center my-4">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row px-2 mb-3 text-muted fw-bold">
                    <div class="col-6">Product Details</div>
                    <div class="col-3">Quantity</div>
                    <div class="col-2 text-end">Total</div>
                </div>

                @foreach($items as $item)
                <!-- Single item -->
                <div class="row">
                    <div class="col-2">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <a class="w-100" href="{{ route('front.viewProduct', $item->product->id) }}">
                                <img src="{{ Storage::disk('products')->url($item->product->img_src1) }}">
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
                        <div class="d-flex mb-4 justify-content-center" style="max-width: 300px">
                            <div class="form-outline d-flex ">
                                <input name="quantity" type="number" size="50" min="1" max="50" value="{{$item->quantity}}"
                                    class="form-control w-100 text-center" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 d-flex">
                        <!-- Price -->
                        <p class="text-end pe-3 w-75 fs-6">
                            <strong>RM {{number_format($item->subtotal, 2, '.', ',')}}</strong>
                        </p>
                        <form action="{{route('front.cartDelete')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{$item->product->id}}" name="product_id"/>
                            
                            <button class="btn h-25" title="Remove item">
                                <svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'>
                                    <path
                                        d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z' />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <hr class="my-4" />
                @endforeach

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0">Summary</h5>
            </div>
            <div class="card-body p-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div class="fs-5">
                            <strong>Total amount</strong>
                        </div>
                        <span class="fs-5"><strong>RM {{number_format($subtotal, 2, '.', ',')}}</strong></span>
                    </li>
                </ul>

                @if(count($items) > 0)
                <a class="btn shadow w-100 btn-primary btn-block" href="{{route('front.viewCheckout')}}">Checkout</a>
                @endif

            </div>
        </div>
    </div>
</div>

@stop
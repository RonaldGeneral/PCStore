@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/productDetails.css') }}" rel="stylesheet" />
@stop

@section('content')
<!-- Author: Teh Chong Shin -->
@if($product->status == 1)
<div class="d-flex">
    <div class="col-2"></div>
    <div class="col-4 my-5 ms-3">
        <div>
            <h2>{{$product->title}}</h2>
            <span class="svg-yellow">
                @foreach ($product->total_rating['formatted'] as $star)
                    @switch($star)
                        @case('f')
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                            </svg>
                            @break

                        @case('h')
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                            </svg>
                            @break
                        
                        @case('e')
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                            </svg>
                            @break
                    @endswitch
                @endforeach
            </span>
        </div>
    </div>
</div>



<div class="d-flex">


    <div class="col-2"></div>

    <!--product image-->


    <div class="col-4 my-5">
        <div class="card border-0">
            <div>
                <div class="col-3"></div>
                <div class="d-flex justify-content-center">
                    <img src="{{Storage::disk('products')->url($product->img_src1)}}" width="300" height="300">
                </div>
                <div class="d-flex d-flex-gap justify-content-center">
                    <div class="card">
                        <img src="{{Storage::disk('products')->url($product->img_src1)}}" width="150" height="150">
                    </div>
                    @if($product->img_src2)
                    <div class="card">
                        <img src="{{Storage::disk('products')->url($product->img_src2)}}" width="150" height="150">
                    </div>
                    @endif
                    @if($product->img_src3)
                    <div class="card">
                        <img src="{{Storage::disk('products')->url($product->img_src3)}}" width="150" height="150">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>





    <!--product quantity-->

    <div class="col-4 my-5">

        <div class="card border-0 bg-light p-3">
            <div class="card mt-3 p-2">
                <div class="d-flex px-4 py-3">
                    <div class="col-4">Price</div>
                    <div class="col-8 fs-6">RM {{number_format($product->price, 2, '.', ',')}}</div>
                </div>
            </div>

            <form action="{{route('front.addToCart')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}"/>
                <div class="card mt-3 p-2">
                    <div class="d-flex px-4">
                        <div class="col-4">
                            <div class="mt-3">Quantity </div>
                        </div>
                        <div class="col-8 d-flex mb-3 mt-2" style="max-width: 300px">
                            <div class="form-outline d-flex">
                                <input name="quantity" type="number" min="1" max="50" value="1" size="50"
                                    class="form-control w-75 text-center">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3 p-2">
                    <div class="d-flex px-4">
                        <div class="col-12 d-flex d-flex-gap justify-content-around">
                            <button id="btnBuy" class="btn btn-primary d-flex" name="submit" value="buy">Buy Now</button>
                            <button class="btn btn-outline-info d-flex" id="btnCart" name="submit" value="cart">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
            </form>

        </div>


    </div>





</div>


<!--Nav bar-->


<div class="d-flex">

    <div class="col-2"> </div>

    <div class="col-8 my-5">
        <div class="class">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">Description</a>
                </li>
            </ul>
        </div>
    </div>


</div>


<div class="d-flex">

    <div class="col-2"></div>

    <div class="col-8 ">

        <div class="card mb-5 p-4">
            <div class="mt-4">

                {{$product->description}}
            </div>


        </div>
    </div>
</div>

<div class="d-flex">

    <div class="col-2"></div>

    <div class="col-8 ">

        <div class="card mb-5">

            <div>
                <div class="table-responsive table-bordered mt-4 col-11 m-auto p-3">
                    <table class="table table-centered mb-0 table-striped">
                        <thead class="table-light">
                            <tr>
                                <th colspan="2">Specification</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($attrs as $id => $name)
                            <tr class="">
                                <td class="py-3 d-flex justify-content-between">
                                    {{$name}}
                                </td>
                                <td class="py-3 border-1">{{$product_attrs[$id]??''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>


</div>
@endif
@stop
@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/productCatalog.css') }}" rel="stylesheet" />
@stop

@section('content')    
<!-- Author: Teh Chong Shin -->

<div class="d-flex">
    <div class="col-1"></div>
    <div class="col-8 mt-5 ms-5">
<form action="" method="GET">
        <select id="ddlCategory" name="order" class="btn btn-lg btn-outline-light dropdown-toggle border text-dark">
            <option {{($order=='pa' || !$order)?'selected':''}} value="pa">Price, Ascending</option>
            <option {{($order=='pd')?'selected':''}} value="pd">Price, Descending</option>
            <option {{($order=='aa')?'selected':''}} value="aa">Alphabet, Ascending</option>
            <option {{($order=='ad')?'selected':''}} value="ad">Alphabet, Descending</option>
        </select>

    </div>
</div>



<div class="d-flex">


    <!--Accordion 1-->
    <div class="ms-5 col-3 me-5">

        <div class="card px-3 my-3 filter pb-4 me-1">
            
                
                <h2 class="mt-5 text-center">Filter<button class="btn btn-outline-dark ms-5">Apply Filter</button></h2>
                
                <div class="accordion mt-3" id="accordioncat">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordioncathead">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Category
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#category">
                            <div class="accordion-body">
                                <div class="d-flex row ps-3">
                                    <!--accordion content 1-->
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="checkbox" {{in_array('prebuilt', $categories)?'checked':''}} class="" name="category[]" value="prebuilt">
                                        <div class="fs-6">Prebuilt Desktop</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="checkbox" {{in_array('laptop', $categories)?'checked':''}} class="" name="category[]" value="laptop">
                                        <div class="fs-6">Laptop</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="checkbox" {{in_array('accessories', $categories)?'checked':''}} class="" name="category[]" value="accessories">
                                        <div class="fs-6">PC Accessories</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Accordion 2-->
                <div class="accordion mt-5" id="accordionbrand">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordionbrandhead">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Brand</button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#price">
                            <div class="accordion-body">
                                <div class="d-flex row ps-3">
                                    <!--accordion content 2-->
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="radio" {{(!$price)?'checked':''}} class="" name="price" value="">
                                        <div class="fs-6">All</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="radio" {{$price==1?'checked':''}} class="" name="price" value="1">
                                        <div class="fs-6">Under RM 1000</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="radio" {{$price==2?'checked':''}} class="" name="price" value="2" >
                                        <div class="fs-6">RM 1000 - RM 2999</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="radio" {{$price==3?'checked':''}} class="" name="price" value="3" >
                                        <div class="fs-6">RM 3000 - RM 4999</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="radio" {{$price==4?'checked':''}} class="" name="price" value="4" >
                                        <div class="fs-6">RM 5000 - RM 6999</div>
                                    </label>
                                    <label class="w-100 d-flex d-flex-gap py-2">
                                        <input type="radio" {{$price==5?'checked':''}} class="" name="price" value="5" >
                                        <div class="fs-6">Above RM 7000</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <!--Row products-->
    <div class="col-7">

        <div class="row">


            @foreach ($products as $product)
            <div class="col-4 my-3">

                <div class="card m-auto" style="width: 18rem;">
                    <a href="{{ route('front.viewProduct', $product->id) }}" class="m-auto">
                        <img id="prod1" style="height: 250px; width: 250px;" src="{{ Storage::disk('products')->url($product->img_src1) }}" class="m-auto my-2" />
                    </a>
                    <div class="card-body text-start">
                        <a href="{{ route('front.viewProduct', $product->id) }}" class="card-title link-primary fs-6">
                            {{$product->title}}
                        </a>
                        <h4 class="fs-5">RM {{number_format($product->price, 2, '.', ',')}}</h4>
                        <div class="d-flex m-auto text-start">

                            @foreach ($product->total_rating['formatted'] as $star)
                                @switch($star)
                                    @case('f')
                                        <svg class="svg-yellow" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                        </svg>
                                        @break

                                    @case('h')
                                        <svg class="svg-yellow" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                                        </svg>
                                        @break
                                    
                                    @case('e')
                                        <svg class="svg-yellow" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                        </svg>
                                        @break
                                @endswitch
                            @endforeach
                            <h4 class="my-auto">{{$product->total_rating['original']}}</h4>
                        </div>

                    </div>
                    <a id="buy-btn" class="btn productbutton shadow-sm" href="{{ route('front.viewProduct', $product->id) }}">
                        View Product
                    </a>
                </div>

            </div>
            @endforeach


        </div>

    </div>
</div>


@stop
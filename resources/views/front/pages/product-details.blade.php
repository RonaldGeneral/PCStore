@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/productDetails.css') }}" rel="stylesheet" />
@stop

@section('content')
<div class="d-flex">
    <div class="col-2"></div>
    <div class="col-4 my-5 ms-3">
        <div>
            <h2>Lenovo Ideapad 3</h2>
            <span class="svg-yellow">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                </svg>
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
                    <img src="res/product2.png" width="300" height="300">
                </div>
                <div class="d-flex d-flex-gap justify-content-center">
                    <div class="card">
                        <img src="res/product2.png" width="150" height="150">
                    </div>
                    <div class="card">
                        <img src="res/product2.png" width="150" height="150">
                    </div>
                    <div class="card">
                        <img src="res/product2.png" width="150" height="150">
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!--product quantity-->

    <div class="col-4 my-5">

        <div class="card border-0 bg-light p-3">
            <div class="card mt-3 p-2">
                <div class="d-flex px-4">
                    <div class="col-4">Price</div>
                    <div class="col-8">RM 2,999.00</div>
                </div>
            </div>

            <div class="card mt-3 p-2">
                <div class="d-flex px-4">
                    <div class="col-4">Brand</div>
                    <div class="col-8">Lenovo</div>
                </div>
            </div>

            <div class="card mt-3 p-2">
                <div class="d-flex px-4">
                    <div class="col-4">Dimensions</div>
                    <div class="col-8">(L x W x H): 25 cm x 35 cm x 2cm</div>
                </div>
            </div>

            <div class="card mt-3 p-2">
                <div class="d-flex px-4">
                    <div class="col-4">Number of stock</div>
                    <div class="col-8">40</div>
                </div>
            </div>

            <div class="card mt-3 p-2">
                <div class="d-flex px-4">
                    <div class="col-4">
                        <div class="mt-2">Color</div>
                    </div>
                    <div class="col-8 d-flex d-flex-gap">
                        <button class="btn btn-outline-dark">Black</button>
                        <button class="btn btn-outline-warning">Yellow</button>
                    </div>



                </div>
            </div>

            <div class="card mt-3 p-2">
                <div class="d-flex px-4">


                    <div class="col-4">
                        <div class="mt-3">Quantity </div>
                    </div>

                    <div class="col-8 d-flex mb-3 mt-2" style="max-width: 300px">
                        <div class="form-outline d-flex">

                            <input type="number" min="1" max="50" value="1" size="50"
                                class="form-control w-75 text-center">

                        </div>
                    </div>
                </div>
            </div>




            <div class="card mt-3 p-2">
                <div class="d-flex px-4">
                    <div class="col-4">

                    </div>
                    <div class="col-8 d-flex d-flex-gap">
                        <button id="btnBuy" class="btn btn-primary">Buy Now</button>

                        <button class="btn btn-outline-info" id="btnCart">Add to Cart</button>


                    </div>



                </div>
            </div>

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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="product_details_review.aspx">Reviews</a>
                </li> -->
            </ul>
        </div>
    </div>


</div>


<div class="d-flex">

    <div class="col-2"></div>

    <div class="col-8 ">

        <div class="card mb-5 p-4">
            <div class="mt-4">

                <h4>Description:</h4>

                <ul class="text-muted" style="list-style-type: disc;">
                    <li>
                        <p>14″ 2-in-1 laptop with AMD Ryzen™ processors for powerful performance</p>
                    </li>
                    <li>
                        <p>360-degree convertible design for versatile modes of use</p>
                    </li>
                    <li>
                        <p>Enough storage &amp; swift memory for faster executions</p>
                    </li>
                    <li>
                        <p>Smart AI features, rapid charging, &amp; optional Lenovo Digital Pen</p>
                    </li>
                    <li>
                        <p>Swift memory &amp; storage for multitasking</p>
                    </li>
                </ul>
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
                            <tr class="">
                                <td class="py-3 d-flex justify-content-between">
                                    Processor
                                </td>
                                <td class="py-3 border-1">Up to AMD Ryzen™ 7 8845HS</td>
                            </tr>
                            <tr>
                                <td class="py-3 d-flex justify-content-between">
                                    Operating System
                                </td>
                                <td class="py-3 border-1">Up to Windows 11 Pro</td>
                            </tr>
                            <tr>
                                <td class="py-3 d-flex justify-content-between">
                                    Graphics
                                </td>
                                <td class="py-3 border-1">AMD Radeon™ Graphics (UMA)</td>
                            </tr>
                            <tr>
                                <td class="py-3 d-flex justify-content-between">
                                    Memory
                                </td>
                                <td class="py-3 border-1">Up to 16GB LPDDR5X</td>
                            </tr>
                            <tr>
                                <td class="py-3 d-flex justify-content-between">
                                    Storage
                                </td>
                                <td class="py-3 border-1">Up to 1TB PCIe M.2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>


</div>
@stop
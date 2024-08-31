@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/productCatalog.css') }}" rel="stylesheet" />
@stop

@section('content')
<div class="d-flex">
    <div class="col-1"></div>
    <div class="col-8 mt-5">

        <select id="ddlCategory" class="btn btn-lg btn-outline-light dropdown-toggle border text-dark">
            <option selected value="">Price, Ascending</option>
            <option value="">Price, Descending</option>
            <option value="">Date added, Latest</option>
            <option value="">Date added, Earliest</option>
        </select>

    </div>
</div>



<div class="d-flex">

    <div class="col-1"></div>


    <!--Accordion 1-->
    <div class="col-3 me-5">

        <div class="card px-3 my-5 filter pb-4 me-1">
            <h2 class="mt-5 text-center">Filter</h2>
            <div class="accordion mt-5" id="accordioncat">
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
                                <!-- <asp:CheckBoxList runat="server">
                                    <option Value="prebuilt">Prebuilt Desktop</option>
                                    <option Value="laptop">Laptop</option>
                                    <option Value="accessories">PC Accessories</option>

                                </asp:CheckBoxList> -->
                                <label class="w-100 d-flex d-flex-gap py-2">
                                    <input type="checkbox" checked="" class="" >
                                    <div class="fs-6">Prebuilt Desktop</div>
                                </label>
                                <label class="w-100 d-flex d-flex-gap py-2">
                                    <input type="checkbox" checked="" class="" >
                                    <div class="fs-6">Laptop</div>
                                </label>
                                <label class="w-100 d-flex d-flex-gap py-2">
                                    <input type="checkbox" checked="" class="" >
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
                        data-bs-parent="#brand">
                        <div class="accordion-body">
                            <div class="d-flex col">
                                <!--accordion content 2-->
                                <asp:CheckBoxList runat="server">
                                    <option Value="">Asus</option>
                                    <option Value="">Lenovo</option>
                                    <option Value="">Acer</option>
                                    <option Value="">MSI</option>
                                    <option Value="">HP</option>
                                </asp:CheckBoxList>

                            </div>
                        </div>
                    </div>

                </div>


                <!--Accordion 3-->

                <div class="accordion mt-5" id="accordionprice">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordionpricehead">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Price
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#price">
                            <div class="accordion-body">
                                <div class="d-flex col">
                                    <!--accordion content 1-->
                                    <asp:RadioButtonList runat="server">
                                        <option Value="">Under RM 1,000.00</option>
                                        <option Value="">RM 1,000.00 - RM 2,999.00</option>
                                        <option Value="">RM 3,000.00 - RM 4,999.00</option>
                                        <option Value="">RM 5,000.00 - RM 6,999.00</option>
                                        <option Value=""> Above RM 7,000.00</option>
                                    </asp:RadioButtonList>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>





    <!--Row 1 products-->
    <div class="col-7">

        <div class="d-flex d-flex-gap justify-content-center mt-5">


            <div class="col-4">

                <div class="card m-auto" style="width: 18rem;">
                    <asp:ImageButton ID="prodcatimgbtn1" runat="server" Height="250px" Width="250px"
                        ImageUrl="res/product1.png" PostBackUrl="~/view/front/product_details.aspx"
                        CssClass="m-auto my-2" />
                    <div class="card-body text-start">
                        <h4 class="card-title text-primary">Prebuilt A</h4>
                        <h4>RM 5999</h4>
                        <div class="d-flex m-auto text-start">

                            <span class="svg-yellow d-flex justify-content-center me-2">
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
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                            </span>
                            <h4>5.0</h4>
                        </div>

                    </div>
                    <asp:LinkButton ID="prodcatbuybtn1" runat="server" CssClass="btn productbutton shadow-sm"
                        Text="View Product" PostBackUrl="~/view/front/product_details.aspx">View Product
                    </asp:LinkButton>
                </div>

            </div>



            <div class="col-4">

                <div class="card m-auto" style="width: 18rem;">
                    <asp:ImageButton ID="prodcatimgbtn2" runat="server" Height="250px" Width="250px"
                        CssClass="m-auto my-2" ImageUrl="res/product2.png"
                        PostBackUrl="~/view/front/product_details.aspx" />
                    <div class="card-body text-start">
                        <h4 class="card-title text-primary">Lenovo Ideapad 3</h4>
                        <h4>RM 2599</h4>
                        <div class="d-flex m-auto text-start">
                            <span class="svg-yellow d-flex justify-content-center me-2">
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
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                            <h4>4.0</h4>
                        </div>

                    </div>
                    <asp:LinkButton ID="prodcatbuybtn2" runat="server" CssClass="btn productbutton shadow-sm"
                        Text="View Product" PostBackUrl="~/view/front/product_details.aspx">View Product
                    </asp:LinkButton>
                </div>

            </div>


            <div class="col-4">

                <div class="card m-auto" style="width: 18rem;">
                    <asp:ImageButton ID="prodcatimgbtn3" runat="server" Height="250px" Width="250px"
                        CssClass="m-auto my-2" ImageUrl="res/product3.png"
                        PostBackUrl="~/view/front/product_details.aspx" />
                    <div class="card-body text-start">
                        <h4 class="card-title text-primary">Logitech TKL Keyboard</h4>
                        <h4>RM 259</h4>
                        <div class="d-flex m-auto text-start">
                            <span class="svg-yellow d-flex justify-content-center me-2">
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
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                            </span>
                            <h4>5.0</h4>

                        </div>

                    </div>
                    <asp:LinkButton ID="prodcatbuybtn3" runat="server" CssClass="btn productbutton shadow-sm"
                        Text="View Product" PostBackUrl="~/view/front/product_details.aspx">View Product
                    </asp:LinkButton>
                </div>

            </div>

        </div>

        <!--Row 2 products-->


        <div class="d-flex d-flex-gap  justify-content-center mt-5">


            <div class="col-4">

                <div class="card m-auto" style="width: 18rem;">
                    <asp:ImageButton ID="prodcatimgbtn4" CssClass="m-auto my-2" runat="server" Height="250px"
                        Width="250px" ImageUrl="res/product4.png" PostBackUrl="~/view/front/product_details.aspx" />
                    <div class="card-body text-start">
                        <h4 class="card-title text-primary">Logitech Hero Mouse</h4>
                        <h4>RM 169</h4>
                        <div class="d-flex m-auto text-start">
                            <span class="svg-yellow d-flex justify-content-center me-2">
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
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                            <h4>4.0</h4>

                        </div>

                    </div>
                    <asp:LinkButton ID="prodcatbuybtn4" runat="server" CssClass="btn productbutton shadow-sm"
                        Text="View Product" PostBackUrl="~/view/front/product_details.aspx">View Product
                    </asp:LinkButton>
                </div>

            </div>



            <div class="col-4">

                <div class="card m-auto" style="width: 18rem;">
                    <asp:ImageButton ID="prodcatimgbtn5" CssClass="m-auto my-2" runat="server" Height="250px"
                        Width="250px" ImageUrl="res/product5.png" PostBackUrl="~/view/front/product_details.aspx" />
                    <div class="card-body text-start">
                        <h4 class="card-title text-primary">LG Ultragear FHD Monitor</h4>
                        <h4>RM 1200</h4>
                        <div class="d-flex m-auto text-start">
                            <span class="svg-yellow d-flex justify-content-center me-2">
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
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                            <h4>3.0</h4>

                        </div>

                    </div>
                    <asp:LinkButton ID="prodcatbuybtn5" runat="server" CssClass="btn productbutton shadow-sm"
                        Text="View Product" PostBackUrl="~/view/front/product_details.aspx">View Product
                    </asp:LinkButton>
                </div>

            </div>


            <div class="col-4">

                <div class="card m-auto" style="width: 18rem;">
                    <asp:ImageButton ID="prodcatimgbtn6" CssClass="m-auto my-2" runat="server" Height="250px"
                        Width="250px" ImageUrl="res/product6.png" PostBackUrl="~/view/front/product_details.aspx" />
                    <div class="card-body text-start">
                        <h4 class="card-title text-primary">Logitech Headset</h4>
                        <h4>RM 269</h4>
                        <div class="d-flex m-auto text-start">
                            <span class="svg-yellow d-flex justify-content-center me-2">
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
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                            <h4>4.0</h4>

                        </div>

                    </div>
                    <asp:LinkButton ID="prodcatbuybtn6" runat="server" CssClass="btn productbutton shadow-sm"
                        Text="View Product" PostBackUrl="~/view/front/product_details.aspx">View Product
                    </asp:LinkButton>
                </div>

            </div>

        </div>

    </div>
</div>


@stop
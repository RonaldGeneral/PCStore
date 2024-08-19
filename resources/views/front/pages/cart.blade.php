<!-- <link href="style/cart.css" rel="stylesheet" /> -->
@extends('front.layouts.default')

@section('content')

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
                <!-- Single item -->
                <div class="row">
                    <div class="col-2">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <asp:LinkButton CssClass="w-100" runat="server"
                                PostBackUrl="~/view/front/product_details.aspx"><img src="res/featprod3.png">
                            </asp:LinkButton>
                        </div>
                    </div>

                    <div class="col-3">
                        <!-- Data -->
                        <p>
                            <asp:LinkButton CssClass="link-secondary text-decoration-none" runat="server"
                                PostBackUrl="~/view/front/product_details.aspx"><strong>Razor Keyboard</strong>
                            </asp:LinkButton>
                        </p>
                    </div>

                    <div class="col-3">
                        <!-- Quantity -->
                        <div class="d-flex mb-4" style="max-width: 300px">
                            <div class="form-outline d-flex justify-content-center">
                                <asp:TextBox TextMode="Number" min="0" max="50" Text="1"
                                    CssClass="form-control w-50 text-center" runat="server"></asp:TextBox>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 d-flex">
                        <!-- Price -->
                        <p class="text-end pe-3 w-75">
                            <strong>RM 17.90</strong>
                        </p>
                        <asp:LinkButton runat="server" CssClass="btn h-25" title="Remove item" Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'>
                  <path
                    d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z' />
                </svg>"></asp:LinkButton>
                    </div>
                </div>

                <hr class="my-4" />

                <!-- Single item -->
                <div class="row">
                    <div class="col-2">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <asp:LinkButton CssClass="w-100" runat="server"
                                PostBackUrl="~/view/front/product_details.aspx"><img src="res/featprod2.png">
                            </asp:LinkButton>
                        </div>
                    </div>

                    <div class="col-3">
                        <!-- Data -->
                        <p>
                            <asp:LinkButton CssClass="link-secondary text-decoration-none" runat="server"
                                PostBackUrl="~/view/front/product_details.aspx"><strong>Lenovo Ideapad 5i</strong>
                            </asp:LinkButton>
                        </p>
                        <p class="text-muted mb-0">Color: Blue</p>
                        <p class="text-muted mb-0">Processor: Intel i7</p>
                    </div>

                    <div class="col-3">
                        <!-- Quantity -->
                        <div class="d-flex mb-4" style="max-width: 300px">
                            <div class="form-outline d-flex justify-content-center">
                                <asp:TextBox TextMode="Number" min="0" max="50" Text="2"
                                    CssClass="form-control w-50 text-center" runat="server"></asp:TextBox>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 d-flex">
                        <!-- Price -->
                        <p class="text-end pe-3 w-75">
                            <strong>RM 17.99</strong>
                        </p>
                        <asp:LinkButton runat="server" CssClass="btn h-25" title="Remove item" Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'>
                  <path
                    d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z' />
                </svg>"></asp:LinkButton>
                    </div>
                </div>

                <!-- Single item -->
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
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        <span class="col-7"> Subtotal</span>
                        <span class="col-1">RM</span>
                        <span class="text-end col-2">1,249.90</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span class="col-7"> Shipping</span>
                        <span class="col-1">RM</span>
                        <span class="text-end col-2">4.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                            <strong>Total amount</strong>
                            <strong>
                                <p class="mb-0">(including GST)</p>
                            </strong>
                        </div>
                        <span><strong>RM 1,253.90</strong></span>
                    </li>
                </ul>

                <asp:LinkButton runat="server" Text="Checkout" CssClass="btn shadow w-100 btn-primary btn-block"
                    PostBackUrl="~/view/front/checkout.aspx">
                </asp:LinkButton>

            </div>
        </div>
    </div>
</div>

@stop
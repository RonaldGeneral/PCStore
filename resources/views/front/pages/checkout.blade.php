@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/checkout.css') }}" rel="stylesheet" />
@stop

@section('content')

<script>
    var inputField = document.getElementById('floatingMobile'); inputField.addEventListener('focus', function () {
        if (inputField.value.trim() === '') {
            inputField.value = '+60 ';
        }
    });

    inputField.addEventListener('blur', function () {
        if (inputField.value.trim() === '+60') {
            inputField.value = '';
        }
    });

    function toggleSelection(checkboxId) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            if (checkbox.id !== checkboxId) {
                checkbox.checked = false;
            }
        });
        document.getElementById(checkboxId).checked = true;
    }

</script>

<div id="content" class="p-3 ">
    <div class="container py-5">
        <h2 class="fw-bold pb-3">Delivery Information</h2>
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="contactInfo w-75">
                    <h3 class="mb-0">Contact Info</h3>
                    <br />
                    <div class="form-floating mb-3">
                        <input id="txtName" class="form-control" placeholder="floatingInput">
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtEmail" placeholder="floatingInput" type="email">
                        <label for="txtEmail">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtMobile" placeholder="floatingInput">
                        <label for="txtMobile">Mobile</label>
                    </div>
                </div>

                <div class="addressInfo w-75">
                    <h3 class="mb-0">Address Info</h3>
                    <br />

                    <div class="form-floating mb-3">
                        <textarea id="txtAddress" style="height: 90px" class="form-control" placeholder="floatingInput"></textarea>
                        <label for="txtAddress">Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="txtPostcode" class="form-control" placeholder="floatingInput" maxlength="5">
                        <label for="txtPostcode">Postcode</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="txtCity" class="form-control" placeholder="floatingInput">
                        <label for="txtCity">City</label>
                    </div>

                    <div class="input-group mb-3">
                        <select ID="ddlStates" runat="server" class="form-select" >
                            <option selected>State</option>
                            <option value="1">Kuala Lumpur</option>
                            <option value="2">Penang</option>
                            <option value="3">Johor</option>
                            <option value="4">Melaka</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="paymentBox">
                <h3 class="mb-0">Select Payment Method</h3>
                <br />

                <div class="paymentOption" onclick="toggleSelection('<%= cashCheckbox.ClientID %>')">
                    <asp:Image ID="ImageCOD" runat="server" src="res/COD.png" alt="Cash" />
                    <label for="cashCheckbox">Cash On Delivery</label>
                    <asp:CheckBox ID="cashCheckbox" runat="server" ClientIDMode="Static" />
                </div>
                <br />

                <div class="paymentOption" onclick="toggleSelection('<%= fpxCheckbox.ClientID %>')">
                    <asp:Image ID="ImageFPX" runat="server" src="res/FPX.png" alt="FPX" />
                    <label for="fpxCheckbox">FPX</label>
                    <asp:CheckBox ID="fpxCheckbox" runat="server" ClientIDMode="Static" />
                </div>
                <br />

                <div class="paymentOption" onclick="toggleSelection('<%= tngCheckbox.ClientID %>')">
                    <asp:Image ID="ImageTnGo" runat="server" src="res/TnGo.png" alt="Touch 'n Go" />
                    <label for="tngCheckbox">Touch 'n Go</label>
                    <asp:CheckBox ID="tngCheckbox" runat="server" ClientIDMode="Static" />
                </div>

                <br />

                <h3 class="mb-0">Order Summary</h3>
                <br />

                <div class="orderSummary">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td style="text-align: right;">RM</td>
                        </tr>
                        <tr class="black-line">
                            <td>Delivery Fee</td>
                            <td style="text-align: right;">RM</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td style="text-align: right;">RM</td>
                        </tr>
                    </table>
                </div>
                <br />
                <div class="d-grid gap-2">
                    <input type="button" id="btnCheckout" value="Checkout" class="btn btn-primary py-2"/>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/checkout.css') }}" rel="stylesheet" />
@stop

@section('content')
<!-- Author: Teh Chong Shin -->
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
                        <input id="txtName" class="form-control" placeholder="floatingInput" value="{{$customer['name']}}" disabled>
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtEmail" placeholder="floatingInput" type="email" value="{{$customer['email']}}" disabled>
                        <label for="txtEmail">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtMobile" placeholder="floatingInput" value="{{$customer['phone']}}" disabled>
                        <label for="txtMobile">Mobile</label>
                    </div>
                </div>

                <div class="addressInfo w-75">
                    <h3 class="mb-0">Address Info</h3>
                    <br />

                    <div class="form-floating mb-3">
                        <textarea id="txtAddress" style="height: 90px" class="form-control" placeholder="floatingInput" disabled> {{$customer['address']}}</textarea>
                        <label for="txtAddress">Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="txtPostcode" class="form-control" placeholder="floatingInput" maxlength="5" value="{{$customer['postcode']}}" disabled>
                        <label for="txtPostcode">Postcode</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="txtCity" class="form-control" placeholder="floatingInput" value="{{$customer['city']}}" disabled>
                        <label for="txtCity">City</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="txtState" class="form-control" placeholder="floatingInput" value="{{$customer['state']}}" disabled>
                        <label for="txtState">State</label>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="paymentBox">
                
                <form action="{{route('order.makePayment')}}" method="POST">
                    @csrf
                    <div class="m-2">
                        <h3 class="mx-0 fs-5 mb-4">Select Payment Method</h3>
                        <div class="form-check">
                            <label class="fs-6 form-check-label mb-3" for="tng" class="">
                                TnG EWallet
                            </label><input type="radio" id="tng" name="payment" class="form-check-input me-3" value="tng" />
                        </div>
                        <div class="form-check">
                            <label class="fs-6 form-check-label mb-3" for="fpx" class="">
                                FPX Transfer
                            </label><input type="radio" id="fpx" name="payment" class="form-check-input me-3" value="fpx" />
                        </div>
                        <div class="form-check">
                            <label class="fs-6 form-check-label mb-3" for="card" class="">
                                Debit/Credit Card
                            </label><input type="radio" id="card" name="payment" class="form-check-input me-3" value="card" />
                        </div>
                    </div>
                    <div class="m-2 mb-4">
                        <h3 class="mb-0 fs-5 mb-4">Order Summary</h3>
                        <div class="orderSummary fs-6">
                            <table>
                                <tr>
                                    <td><b>Subtotal</b></td>
                                    <td style="text-align: right;">RM {{number_format($subtotal, 2, '.', ',')}}</td>
                                </tr>
                                <tr class="black-line">
                                    <td><b>Delivery Fee</b></td>
                                    <td style="text-align: right;">RM {{number_format($delivery_fee, 2, '.', ',')}}</td>
                                    <input type="hidden" name="delivery" value="{{number_format($delivery_fee, 2, '.', ',')}}" />
                                </tr>
                                <tr class="mt-2">
                                    <td><b>Total</b></td>
                                    <td style="text-align: right;">RM {{number_format($total, 2, '.', ',')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary py-2">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
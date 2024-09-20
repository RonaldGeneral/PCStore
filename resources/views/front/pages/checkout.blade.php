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
        <a class="me-2 my-4 fs-6" href="{{ url()->previous()}}">    
            Back
        </a>

        <h2 class="fw-bold pb-3 mt-3">Delivery Information</h2>
        <div>
            <form action="{{route('order.checkoutProfile')}}" class="row d-flex justify-content-center my-4" method="POST">
                @csrf
                @method('PUT')
                <div class="w-100 ">
                    <div class="contactInfo w-75 m-auto">
                        <h3 class="mb-0">Contact Info</h3>
                        <br />
                        <div class="form-floating mb-3">
                            <input id="txtName" name="name" class="form-control" placeholder="floatingInput" value="{{$customer['name']}}" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="txtEmail" placeholder="floatingInput" value="{{$customer['email']}}" type="email" required>
                            <label for="txtEmail">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone" id="txtMobile" placeholder="floatingInput" value="{{$customer['phone']}}" required>
                            <label for="txtMobile">Mobile</label>
                        </div>
                    </div>
                    <div class="addressInfo w-75 m-auto">
                        <h3 class="mb-0">Address Info</h3>
                        <br />
                        <div class="form-floating mb-3">
                            <textarea id="txtAddress" name="address" style="height: 90px" class="form-control" value="{{$customer['address']}}" placeholder="floatingInput" required>{{$customer['address']}}</textarea>
                            <label for="txtAddress">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="txtPostcode" name="postcode" class="form-control" value="{{$customer['postcode']}}" placeholder="floatingInput" maxlength="5" required>
                            <label for="txtPostcode">Postcode</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="txtCity" name="city" class="form-control" value="{{$customer['city']}}" placeholder="floatingInput" required>
                            <label for="txtCity">City</label>
                        </div>
                        <div class="input-group mb-3">
                            <select ID="ddlStates" name="state"  class="form-select" required>
                                <option {{$customer['state']?'':'selected'}} value="">State</option>
                                <option value="Kuala Lumpur" {{$customer['state']=='Kuala Lumpur'?'selected':''}}>Kuala Lumpur</option>
                                <option value="Penang" {{$customer['state']=='Penang'?'selected':''}}>Penang</option>
                                <option value="Johor" {{$customer['state']=='Johor'?'selected':''}}>Johor</option>
                                <option value="Melaka" {{$customer['state']=='Melaka'?'selected':''}}>Melaka</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary col-2 py-2 row">Proceed to checkout</button>
                
            </form>
        </div>
    </div>
</div>

@stop
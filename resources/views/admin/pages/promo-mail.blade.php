@extends('admin.layouts.default')

@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
@stop

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

@if ($errors->has('error'))
  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="FailedBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label>{{ $errors->first('error') }}</label>
    <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
    </div>
  </div>
@endif

@section('content')
<form action="{{ route('promo_mail') }}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{$id}}}">
  <div id="content">
    <div class="container py-5 h-100" style="65% !important;">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-black" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5">
                <h2 class="fw-bold mb-3 fs-3" style="text-align: left !important; font-family: 'Lexend Deca', sans-serif; color: black;">Send Promo Email</h2>
                

                <div class="form-outline form-white mb-4 mt-5">
                  <div class="row">
                    <div class="col-8">
                      <input type="text" id="emailInput" name="email" class="form-control fs-6 shadow-sm" placeholder="Enter customer email address" />
                      
                    </div>
                    <div class="col-4">
                      <button class="btn btn-primary shadow-sm" type="submit" id="sendPromoBtn">Send</button>
                    </div>
                  </div>
                </div>

                

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>




<!-- End Content -->

@stop
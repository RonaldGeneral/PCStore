@extends('front.layouts.default')

@section('content')
<form action="{{ route('change-pw') }}" method="POST">
  @csrf
  <div id="content">
    <div class="container py-5 w-50 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-black" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                
                <h2 class="fw-bold mb-2 fs-3">Reset Password</h2>
                <h4 class="mt-3">Please Enter a New Password</h4>
                <br>
                
                <div class="form-outline form-white mt-4 mb-4 ">
                  <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="New Password" required />
                </div>
                <div class="form-outline form-white mb-4 ">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg fs-6" placeholder="Confirm Password" required />
                </div>
                
                <button class="btn btn-primary mt-5 shadow-sm" type="submit">Confirm Changes</button>
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
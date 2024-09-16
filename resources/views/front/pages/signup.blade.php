@extends('front.layouts.default')

@section('content')

<form action="{{ route('create-account') }}" method="POST">
  @csrf

  <div id="content" class="p-3">
    <div class="container py-5 w-50 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-black" style="border-radius: 1rem; background-color: #f0eff4;">
            <div class="card-body p-5 text-center">
              <div class="mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 fs-3">Register an Account</h2>
                <div class="form-outline form-white mb-4 mt-5 ">
                  <input type="text" name="name" class="form-control form-control-lg fs-6" placeholder="Full Name" required />
                </div>
                <div class="form-outline form-white mb-4 mt-4 ">
                  <input type="email" name="email" class="form-control form-control-lg fs-6" placeholder="Email" required />
                </div>
                <div class="form-outline form-white mb-4 mt-4 ">
                  <input type="text" name="username" class="form-control form-control-lg fs-6" placeholder="Username" required />
                </div>
                <div class="form-outline form-white mb-4 ">
                  <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="New Password" required />
                </div>
                <div class="form-outline form-white mb-4 ">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg fs-6" placeholder="Confirm Password" required />
                </div>
                <br /><br />
                <button class="btn btn-primary btn-lg px-5 shadow-sm" type="submit">Sign Up</button>
                <br /><br /><br /><br />
                <div class="mt-3" style="text-align: left !important;">
                  <p class="mb-0"><a href="{{ route('front.login') }}" class="text-black-50 fw-bold">I already have an account.</a></p>
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
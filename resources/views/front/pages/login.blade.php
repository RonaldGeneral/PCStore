@extends('front.layouts.default')

@section('content')
<div id="content" class="p-3">
  <div class="container py-5 w-50 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-black" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 fs-3">Login</h2>

              <div class="form-outline form-white mb-4 mt-5 shadow-sm">
                <input type="email" id="typeEmailX" class="form-control form-control-lg fs-6" placeholder="Username/Email" />

              </div>

              <div class="form-outline form-white mb-4 shadow-sm">
                <input type="password" id="typePasswordX" class="form-control form-control-lg fs-6" placeholder="Password" />
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#!">Forgot password?</a></p>
              <button class="btn btn-primary btn-lg px-5 shadow-sm" type="submit">Login</button>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-black-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Content -->
@stop
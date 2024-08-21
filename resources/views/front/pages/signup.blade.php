@extends('front.layouts.default')

@section('content')
<div id="content" class="p-3">

  <div class="container py-5 w-50 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-black" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 fs-3">Sign Up</h2>


              <div class="form-outline form-white mb-4 mt-5 shadow-sm">
                <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" />

              </div>

              <div class="form-outline form-white mb-4 mt-4 shadow-sm">
                <input type="username" class="form-control form-control-lg fs-6" placeholder="Username" />

              </div>

              <div class="form-outline form-white mb-4 shadow-sm">
                <input type="password" class="form-control form-control-lg fs-6" placeholder="Set Password" />

              </div>

              <div class="form-outline form-white mb-4 shadow-sm">
                <input type="password" class="form-control form-control-lg fs-6" placeholder="Confirm Password" />

              </div>
              <button class="btn btn-primary btn-lg px-5 shadow-sm" type="submit">Sign Up</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Content -->
@stop
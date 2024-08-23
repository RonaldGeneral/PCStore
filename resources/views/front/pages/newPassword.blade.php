@extends('front.layouts.default')

@section('content')
<div id="content">

  <div class="container py-5 w-50 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-black" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 fs-3">Reset Password</h2>
              <h4 class="mt-3">please input a new password</h4>

              <div class="form-outline form-white mb-4 mt-5 shadow-sm">
                <input type="new password" class="form-control form-control-lg fs-6" placeholder="new password" />

              </div>

              <div class="form-outline form-white mb-4 mt-4 shadow-sm">
                <input type="confirm password" class="form-control form-control-lg fs-6" placeholder="confirm password" />

              </div>

              <button class="btn btn-primary btn-lg px-4 shadow-sm" type="submit">confirm changes</button>


            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Content -->
@stop
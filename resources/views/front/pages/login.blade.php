@extends('front.layouts.default')

@section('content')

@if ($errors->has('loginError'))

  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="FailedBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label>{{ $errors->first('loginError') }}</label>
    <span class="DivClose" onclick="this.parentNode.parentNode.removeChild(this.parentNode); return false;">&times;</span>
    </div>
  </div>
@endif


<form action="{{ route('login') }}" method="POST">
  @csrf

  <div id="content" class="p-3">
    <div class="container py-5 w-50 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-black" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 fs-3">Login</h2>

                <div class="form-outline form-white mb-4 mt-5">
                  <input type="email" name="email" class="form-control form-control-lg fs-6" placeholder="Username/Email" />
                </div>
                @if ($errors->has('email'))
                  <div style="color: red; margin: 10px 5px 10px 5px; text-align: left;">
                    {{ $errors->first('email') }}
                  </div>
                  <br />
                @endif

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="Password" />
                </div>
                @if ($errors->has('password'))
                  <div style="color: red; margin: 10px 5px 10px 5px; text-align: left; ">
                    {{ $errors->first('password') }}
                  </div>
                  <br />
                @endif

                <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#!">Forgot password?</a></p>
                <button class="btn btn-primary btn-lg px-5 shadow-sm" type="submit">Login</button>

              </div>

              <div>
                <p class="mb-0">Don't have an account? <a href="{{ route('front.signup') }}" class="text-black-50 fw-bold">Sign Up</a>
                </p>
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
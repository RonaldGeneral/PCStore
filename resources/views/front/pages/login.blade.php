@extends('front.layouts.default')

@section('content')

<!-- Author: Leong Wai Loc -->
@if (session('loginError'))
  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="FailedBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label>{{ session('loginError') }}</label>
    <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
    </div>
  </div>
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="row" style="padding: 0.5rem 1rem;">
      <div class="FailedBox">
        <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
        <label>{{ $error }}</label>
        <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
      </div>
    </div>
  @endforeach
@endif

@if (session('success'))
  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="SuccessBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label>{{ session('success') }}</label>
    <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
    </div>
  </div>
@endif

<div id="content" class="p-3">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-black" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4">
              <h2 class="fw-bold mb-5 fs-3">Login</h2>

              <ul class="nav nav-tabs justify-content-center mt-5" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="nav-db-login" data-bs-toggle="tab" data-bs-target="#dbLogin" type="button" role="tab" aria-controls="dbLogin" aria-selected="true">TerraByte Account</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="nav-external-login" data-bs-toggle="tab" data-bs-target="#extLogin" type="button" role="tab" aria-controls="extLogin" aria-selected="false">Third Party Login</button>
                </li>
              </ul>

              <div class="tab-content p-3 border border-top-0 rounded-bottom">
                <!-- database login -->
                <div class="tab-pane active" id="dbLogin" role="tabpanel" aria-labelledby="database-login">
                  <form action="{{ route('customer.login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="loginType" value="database" />
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

                    <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="{{ route('front.forgot_pw') }}">Forgot password?</a></p>
                    <button class="btn btn-primary btn-lg px-5 mb-3 shadow-sm" type="submit">Login</button>
                  </form>
                </div>
                <!-- external login -->
                <div class="tab-pane" id="extLogin" role="tabpanel" aria-labelledby="external-login">
                  <form action="{{ route('customer.login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="loginType" value="external" />
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

                    <button class="btn btn-primary btn-lg px-5 mb-3 shadow-sm" type="submit">Login</button>
                  </form>
                </div>
              </div>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="{{ route('front.signup') }}" class="text-black-50 fw-bold">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Content -->
@stop
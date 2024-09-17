@extends('front.layouts.default')

@section('content')
<div id="content" class="">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-3 h-100">
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item text-decoration-none ">
              <a id="profile2" href="{{ route('front.profile') }}" class="text-decoration-none profileLink">Profile</a>
            </li>
            <li class="list-group-item">
              <a id="orderHistory2" href="{{ route('front.order_hist') }}" class="text-decoration-none orderHistoryLink">Order History</a>
            </li>
          </ul>
        </div>
      </div>
      <form action="" method="POST">
        @csrf
        
        <div class="col-md-9">
          <div class="profile-border backgroundGrey p-5">
            <div class="row mb-5">
              <h3>User Profile</h3>
            </div>

            <div class="row mt-5">
              <div class="col-md-3 align-content-center">
                <label>Username</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" value="{{ $customer->username }}" />
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-3 align-content-center">
                <label>Name</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" placeholder="Name" value="{{ $customer->name }}" />
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-3 align-content-center">
                <label>Email</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" value="{{ $customer->email }}" />
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-3 align-content-center">
                <label>Phone</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" placeholder="Phone" value="{{ $customer->phone }}" />
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-3 align-content-center">
                <label>Gender</label>
              </div>

              <div class="col-md-8">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="Female">
                  <label class="form-check-label" for="inlineRadio1">Female</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="Male">
                  <label class="form-check-label" for="inlineRadio2">Male</label>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-3 align-content-center">
                <label>Date of Birth</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="date" class="form-control form-control-lg fs-6" value="{{ $customer->birthdate }}" />
                </div>
              </div>
            </div>
            <br /><br />

            <!-- RESET PASSWORD -->
            <div class="row mt-3">
              <a class="text-decoration-none profileLink" data-bs-toggle="collapse" href="#collapsePW" role="button" aria-expanded="false" aria-controls="collapsePW"><b>Change Password</b></a>
            </div>

            <div class="collapse" id="collapsePW">
              <div class="row mt-3">
                <div class="col-md-3 align-content-center">
                  <label>New Password</label>
                </div>
                <div class="col-md-8">
                  <div class="form-outline form-white">
                    <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="New Password" value="" />
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-3 align-content-center">
                  <label>Confirm New Password</label>
                </div>
                <div class="col-md-8">
                  <div class="form-outline form-white">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg fs-6" placeholder="Confirm New Password" value="" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="profile-border backgroundGrey p-5 mt-3">
            <div class="row mb-3">
              <div class="col-md-3 align-content-center">
                <label>Address</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" value="{{ $customer->address }}" />
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-3 align-content-center">
                <label>Postcode</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" value="{{ $customer->postcode }}" />
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-3 align-content-center">
                <label>City</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" value="{{ $customer->city }}" />
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-3 align-content-center">
                <label>State</label>
              </div>

              <div class="col-md-8">
                <div class="form-outline form-white">
                  <input type="text" class="form-control form-control-lg fs-6" value="{{ $customer->state }}" />
                </div>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col">
                <button type="submit" class="btn btn-primary px-4">Save</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Content -->
@stop
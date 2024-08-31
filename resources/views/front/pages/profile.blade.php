@extends('front.layouts.default')

@section('content')
<div id="content" class="">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-3 h-100">
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item text-decoration-none ">
              <a id="profile2" href="~/view/front/profile.aspx" class="text-decoration-none profileLink">Profile</a>
            </li>
            <li class="list-group-item">
              <a id="orderHistory2" href="~/view/front/orderHistory.aspx" class="text-decoration-none orderHistoryLink">Order history</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-9">
        <div class="profile-border backgroundGrey p-5">

          <div class="row mb-5">
            <h3>User Profile</h3>
          </div>

          <div class="row mt-5">

            <div class="col-md-3">
              <p>Username</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="username" class="form-control form-control-lg fs-6" value="Bruce Wayne" />
              </div>
            </div>

          </div>

          <div class="row mt-3">

            <div class="col-md-3">
              <p>Name</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="name" class="form-control form-control-lg fs-6" placeholder="Name" />
              </div>
            </div>

          </div>

          <div class="row mt-3">

            <div class="col-md-3">
              <p>Email</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" />
              </div>
            </div>

          </div>

          <div class="row mt-3">

            <div class="col-md-3">
              <p>Phone</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="phone" class="form-control form-control-lg fs-6" placeholder="Phone" />
              </div>
            </div>

          </div>

          <div class="row mt-4">

            <div class="col-md-3">
              <p>Gender</p>
            </div>

            <div class="col-md-8">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Male</label>
              </div>

            </div>

          </div>

          <div class="row mt-3">

            <div class="col-md-3">
              <p>Date of birth</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="date" class="form-control form-control-lg fs-6" />
              </div>
            </div>

          </div>

          <div class="row mt-3">
            <a href="url" class="text-decoration-none profileLink">Change password</a>
          </div>



        </div>

        <div class="profile-border backgroundGrey p-5 mt-3">

          <div class="row mb-3">

            <div class="col-md-3">
              <p>Address</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="username" class="form-control form-control-lg fs-6" value="69, jalan manalaksa 19b" />
              </div>
            </div>

          </div>

          <div class="row mb-3">

            <div class="col-md-3">
              <p>Postcode</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="username" class="form-control form-control-lg fs-6" value="53300" />
              </div>
            </div>

          </div>

          <div class="row mb-3">

            <div class="col-md-3">
              <p>City</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="username" class="form-control form-control-lg fs-6" value="Setapak" />
              </div>
            </div>

          </div>

          <div class="row mb-3">

            <div class="col-md-3">
              <p>State</p>
            </div>

            <div class="col-md-8">
              <div class="form-outline form-white shadow-sm">
                <input type="username" class="form-control form-control-lg fs-6" value="Selangor" />
              </div>
            </div>

          </div>

          <div class="row mt-5">
            <div class="col">
              <button type="save" class="btn btn-primary px-4">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- End Content -->
@stop
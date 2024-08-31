@extends('front.layouts.default')

@section('content')
<div id="content" class="">

  <div class="container py-5">

    <div class="row">
      <div class="col-md-3 h-100">
        <div class="row">
          <div class="col-md-2">

            <svg class="avatar_icon" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="34">
              <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
            </svg>


          </div>

          <div class="col-md-5">

            bruce wayne

          </div>
        </div>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Profile</li>
            <li class="list-group-item">Order History</li>
          </ul>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" href="#">To ship</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" href="#">Completed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" href="#">Cancelled</a>
              </li>

            </ul>
          </div>

        </div>

        <div class="row mt-3">
          <div class="input-group rounded">
            <input type="search" class="form-control rounded backgroundGrey" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0 px-5 backgroundGrey" id="search-addon">
              <i class="fas fa-search "></i>
            </span>
          </div>
        </div>


        <div class="card text-center my-3">

          <div class="card-body backgroundGrey">

            <div class="row my-4">

              <div class="col-md-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-test" alt="Phone">
              </div>
              <div class="col-md-2">
                <p class="text-center">Samsung Galaxy</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">White</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">Capacity: 64GB</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">Qty: 1</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">RM 150</p>
              </div>

            </div>

            <div class="row">

              <div class="col-md-6 offset-md-8 mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </div>

            <br>
            <hr class="h4">

            <div class="row my-4">

              <div class="col-md-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-test" alt="Phone">
              </div>
              <div class="col-md-2">
                <p class="text-center">Samsung Galaxy</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">White</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">Capacity: 64GB</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">Qty: 1</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">RM 150</p>
              </div>

            </div>

            <div class="row">

              <div class="col-md-6 offset-md-8 mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </div>



          </div>

          <div class="card-body backgroundBlue">

            <div class="row my-1">

              <div class="col-md-4 offset-md-9">

                <p class="h5">Total: RM300</p>

              </div>

            </div>

            <div class="row">
              <div class="col-md-6 offset-md-7 mt-4">

                <button type="request" class="btn btn-primary">Cancel Order</button>
                <button type="trackOrder" class="btn btn-primary">Check Order</button>
              </div>
            </div>



          </div>



        </div>

        <div class="card text-center my-3">
          <div class="card-body">

            <div class="row my-4">

              <div class="col-md-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-test" alt="Phone">
              </div>
              <div class="col-md-2">
                <p class="text-center">Samsung Galaxy</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">White</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">Capacity: 64GB</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">Qty: 1</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">RM150</p>
              </div>

            </div>
          </div>


          <div class="row">

            <div class="col-md-6 offset-md-8 mt-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
          <br>

          <div class="card-body backgroundBlue">

            <div class="row my-1">

              <div class="col-md-4 offset-md-9">

                <p class="h5">Total: RM150</p>

              </div>

            </div>

            <div class="row">
              <div class="col-md-6 offset-md-7 mt-4">

                <button type="request" class="btn btn-primary">Cancel Order</button>
                <button type="trackOrder" class="btn btn-primary">Check Order</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>
  </div>
</div>
<!-- End Content -->
@stop
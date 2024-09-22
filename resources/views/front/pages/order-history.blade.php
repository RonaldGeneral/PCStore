@extends('front.layouts.default')

@section('content')
<div id="content" class="">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-3 h-100">
        <div class="row">
          <div class="col-md-2">
            <svg class="avatar_icon" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="34">
              <path
                d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
            </svg>
          </div>

          <div class="col-md-7 align-content-center">
            <label>{{ $customer->name }}</label>
          </div>
        </div>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item text-decoration-none ">
              <a id="profile2" href="{{ route('front.profile') }}" class="text-decoration-none profileLink">Profile</a>
            </li>
            <li class="list-group-item">
              <a id="orderHistory2" href="{{ route('front.order_hist') }}"
                class="text-decoration-none orderHistoryLink">Order History</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link {{ request('status') == null ? 'active' : 'text-muted' }}"
                  href="{{ route('front.order_hist') }}">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request('status') == 1 ? 'active' : 'text-muted' }}"
                  href="{{ route('front.order_hist', ['status' => 1]) }}">Order Created</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request('status') == 2 ? 'active' : 'text-muted' }}"
                  href="{{ route('front.order_hist', ['status' => 2]) }}">Driver Assigned</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request('status') == 3 ? 'active' : 'text-muted' }}"
                  href="{{ route('front.order_hist', ['status' => 3]) }}">Ongoing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request('status') == 4 ? 'active' : 'text-muted' }}"
                  href="{{ route('front.order_hist', ['status' => 4]) }}">Completed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request('status') == -1 ? 'active' : 'text-muted' }}"
                  href="{{ route('front.order_hist', ['status' => -1]) }}">Cancelled</a>
              </li>
            </ul>
          </div>
        </div>


        @forelse($customerOrders as $order)
        <div class="card text-center my-3">
          <div class="card-body backgroundGrey">
            @foreach ($order->orderItems as $item)
            <div class="row my-4">
              <div class="col-md-2">
                <img src="{{ Storage::disk('products')->url($item->product->img_src1) }}" class="img-test" alt="Phone">
              </div>
              <div class="col-md-2">
                <p class="text-center">{{ $item->product->title }}</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">{{ $item->product->category }}</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">{{ $item->product->description }}</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">{{ $item->quantity }}</p>
              </div>
              <div class="col-md-2">
                <p class="text-center">{{number_format($item->price, 2, '.', ',')}}</p>
              </div>
            </div>
            @endforeach

            <div class="row">
              <div class="col-md-6 offset-md-8 mt-4">
                <button type="button" class="btn btn-primary">Review</button>
              </div>
            </div>

            <br>
            <hr class="h4">

            <div class="card-body backgroundBlue">
              <div class="row my-1">
                <div class="col-md-4 offset-md-8">
                  <label>Subtotal: </label>
                  <label class="h5">{{number_format($order->subtotal, 2, '.', ',')}}</label>
                </div>
              </div>

              @if(in_array($order->status, [1, 2, 3]))
              <div class="row">
                <div class="col-md-6 offset-md-7 mt-4">
                  <a href="{{route('front.delivery_stat', $order->id)}}" class="btn btn-primary">Check Order</a>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
        @empty
        <div class="card text-center my-3">
          <div class="card-body backgroundGrey">
            <label>You have no orders!</label>
          </div>
        </div>
        @endforelse
      </div>
    </div>

    <br>

    <!-- modal -->
    <div class="modal modal-lg fade" id="review-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3 form-floating">
              <input type="text" class="form-control fs-09" id="txtName" placeholder="John"></>
              <label for="txtName" class="col-form-label">Title</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="text" class="form-control fs-09" id="txtDesc" placeholder="John"></input>
              <label for="txtDesc">Description</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="number" min=1 max=5 step=1 class="form-control fs-09" ID="rating" placeholder="John">
              </asp:TextBox>
              <label for="rating" class="col-form-label">Ratings</label>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger fs-09" data-bs-dismiss="modal">Discard
              changes</button>
            <button type="button" class="btn btn-primary fs-09">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Content -->
@stop
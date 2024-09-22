@extends('front.layouts.default')

@section('content')

<!-- Author: Leong Wai Loc -->
<div id="content" class="p-3">
  <div class="row py-4 px-4">
    <div id="homeSlide" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#homeSlide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#homeSlide" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#homeSlide" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ URL::asset('img/homeslide1.png') }}" class="d-block w-100" alt="homeslide 1">
        </div>
        <div class="carousel-item">
          <img src="{{ URL::asset('img/homeslide2.png') }}" class="d-block w-100" alt="homeslide 2">
        </div>
        <div class="carousel-item">
          <img src="{{ URL::asset('img/homeslide3.png') }}" class="d-block w-100" alt="homeslide 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#homeSlide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#homeSlide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <h2 class="text-center mt-5">Product Categories</h2>

  <!--Product Cat-->
  <div class="row justify-content-center mx-auto mt-5">


    <div class="col-3">
      <a href="{{route('front.catalog', ['category' => ['prebuilt']])}}">
        <div class="card m-auto categoryimage" style="width: 18rem;">
          <img src="{{ URL::asset('img/featprod1.png') }}" height="250" class="card-img-top" alt="cat 1">
          <div class="card-body text-center">
            <h4 class="card-title">Prebuilt Desktop</h4>
          </div>
        </div>
      </a>
    </div>



    <div class="col-3">
      <a href="{{route('front.catalog', ['category' => ['laptop']])}}">
        <div class="card m-auto categoryimage" style="width: 18rem;">
          <img src="{{ URL::asset('img/featprod2.png') }}" height="250" class="card-img-top" alt="cat 2">
          <div class="card-body text-center">
            <h4 class="card-title">Laptops</h4>
          </div>
        </div>
      </a>
    </div>


    <div class="col-3">
      <a href="{{route('front.catalog', ['category' => ['accessories']])}}">
        <div class="card m-auto categoryimage" style="width: 18rem;">
          <img src="{{ URL::asset('img/featprod3.png') }}" height="250" class="card-img-top" alt="cat 3">
          <div class="card-body text-center">
            <h4 class="card-title">PC Accesories</h4>
          </div>
        </div>
      </a>
    </div>

  </div>



  <!--Background Banner-->

  <div class="bg-image d-flex justify-content-center align-items-center mt-5" style="background-image: url({{ URL::asset('img/homeslide4.png') }}); height: 70vh; ">
    <a href="signup.aspx" class="btn btn-dark btn-lg p-3 shadow-sm fs-3">Join Us</a>

  </div>

  <h2 class="text-center mt-5">Why Choose Us?</h2>
  <div class="d-flex justify-content-center mt-5">

    <div class="p-5">
      <img src="{{ URL::asset('img/review1.png') }}" alt="rev 1">
      <h3 class="text-center">Quality Insured</h3>
    </div>

    <div class="p-5">
      <img src="{{ URL::asset('img/review2.png') }}" alt="rev 2">
      <h3 class="text-center">Fast Delivery</h3>
    </div>

    <div class="p-5">
      <img src="{{ URL::asset('img/review3.png') }}" alt="rev 3">
      <h3 class="text-center">24-Hour Customer Support</h3>
    </div>
  </div>
</div>

<!-- End Content -->
@stop
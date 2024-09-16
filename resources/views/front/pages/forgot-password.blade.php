@extends('front.layouts.default')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">


@if ($errors->has('error'))
  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="FailedBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label>{{ $errors->first('error') }}</label>
    <span class="DivClose" onclick="this.parentNode.parentNode.removeChild(this.parentNode); return false;">&times;</span>
    </div>
  </div>
@endif

@section('content')
<form action="{{ route('verify-pin') }}" method="POST">
  @csrf
  <div id="content">
    <div class="container py-5 w-50 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-black" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5">
                <h2 class="fw-bold mb-3 fs-3" style="text-align: left !important; font-family: 'Lexend Deca', sans-serif; color: black;">Email Verification</h2>
                <h4 class="mt-3" style="text-align: left !important;">We will send you an email with verification code to verify it is you.</h4>

                <div class="form-outline form-white mb-4 mt-5">
                  <div class="row">
                    <div class="col-8">
                      <input type="text" id="pinInput" name="pin" pattern="[0-9]{6}" maxlength="6" class="form-control form-control fs-6 shadow-sm" placeholder="Verification Code" autocomplete="off" disabled />
                    </div>
                    <div class="col-4">
                      <button class="btn btn-primary shadow-sm" type="button" id="sendPinBtn">Send PIN</button>
                    </div>
                  </div>
                </div>

                <div id="gMessage" class="mb-3" style="color: #4CAF50;"></div>
                <div id="rMessage" class="mb-3" style="color: red;"></div>

                <button class="btn btn-primary shadow-sm" type="submit" id="submitBtn" style="display: none;">Confirm Password Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  window.onload = function () {
    document.getElementById('pinInput').disabled = true;
  };

  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('sendPinBtn').addEventListener('click', function () {
      document.getElementById('pinInput').removeAttribute("disabled");
      document.getElementById("submitBtn").style.display = "block";

      fetch('/reset-password', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Content-Type': 'application/json'
        },
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          console.log(data);
          if (data.success) {
            document.getElementById('gMessage').innerHTML = data.message;
            document.getElementById('sendPinBtn').disabled = true;
          } else {
            document.getElementById('rMessage').innerHTML = data.message;
          }
        })
        .catch(error => {
          document.getElementById('rMessage').innerHTML = "An error occurred!";
          console.error('Fetch error:', error);
          console.log(error);
        });
    });
  });

</script>


<!-- End Content -->

@stop
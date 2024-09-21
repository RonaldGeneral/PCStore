
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title> Admin Store </title>
    <link href="{{ URL::asset('external/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('external/popper.min.js') }}"></script>
    <script src="{{ URL::asset('external/bootstrap.min.js') }}" type="text/javascript"></script>
    <link href="{{ URL::asset('style/login.css') }}" rel="stylesheet" />
</head>
<body>
    <form id="form1">
        <div class="container py-5 w-75 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card text-black " style="border-radius: 1rem;">
        <div class="card-body p-5 text-center">
  
          <div class="mb-md-5 mt-md-4 pb-5">
  
            <div id="logo" class="mb-3">
              <a href="/" itemprop="url">
                <img src="{{ URL::asset('res/terrabyte.png') }}" itemprop="logo" class="w-100" />
              </a>
            </div>

            <h2 class="fw-bold mb-2 fs-3">Admin Login</h2>
            
            
            <form action="{{ route('admin.login') }}" method="POST">
              @csrf
            <div class="form-outline form-white mb-4 mt-5 shadow-sm">
              <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg fs-6" placeholder="Username/Email" />
            </div>
            @if ($errors->has('email'))
                      <div style="color: red; margin: 10px 5px 10px 5px; text-align: left;">
                        {{ $errors->first('email') }}
                      </div>
                      <br />
                    @endif
            <div class="form-outline form-white mb-4 shadow-sm">
              <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg fs-6" placeholder="Password" />
            </div>
            @if ($errors->has('email'))
                      <div style="color: red; margin: 10px 5px 10px 5px; text-align: left;">
                        {{ $errors->first('email') }}
                      </div>
                      <br />
                    @endif
              <button class="btn btn-primary btn-lg px-5 mb-3 shadow-sm" type="submit">Login</button>
            </form>
          </div> 

        </div>
      </div>
    </div>
  </div>
</div>
    </form>
</body>
</html>

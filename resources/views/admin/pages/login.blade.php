
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


@if (session('success'))
  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="SuccessBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label>{{ session('success') }}</label>
    <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
    </div>
  </div>
@endif

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
            
            
            <form action="{{ route('admin.login.button') }}" method="POST">
              @csrf
              
            <div class="form-outline form-white mb-4 mt-5 shadow-sm">
              <input type="text" id="typeUsernameX" name="username" class="form-control form-control-lg fs-6" placeholder="Username" />
            </div>
            @if ($errors->has('username'))
                      <div style="color: red; margin: 10px 5px 10px 5px; text-align: left;">
                        {{ $errors->first('username') }}
                      </div>
                      <br />
                    @endif
            <div class="form-outline form-white mb-4 shadow-sm">
              <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg fs-6" placeholder="Password" />
            </div>
            @if ($errors->has('password'))
                      <div style="color: red; margin: 10px 5px 10px 5px; text-align: left;">
                        {{ $errors->first('password') }}
                      </div>
                      <br />
                    @endif

@if (session('loginError'))
  <div class="row" style="padding: 0.5rem 1rem;">
    <div class="FailedBox">
    <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
    <label class="text-danger">{{ session('loginError') }}</label>
    <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
    </div>
  </div>
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="row" style="padding: 0.5rem 1rem;">
      <div class="FailedBox">
        <i class="fa fa-check-circle-o" style="padding-right: 10px; font-size: 20px;"></i>
        <label class="text-danger">{{ $error }}</label>
        <span class="DivClose" onclick="this.closest('.row').remove(); return false;">&times;</span>
      </div>
    </div>
  @endforeach
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

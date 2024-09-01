<!DOCTYPE html>

<html>

<head>

    @include('admin.includes.admin-head')
    @yield('custom-admin-head')

</head>

<body>
    <div class="header-section">
        @include('admin.includes.admin-header')
    </div>
    <div id="main">

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close btn fs-4 p-0" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="fs-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
        
    </div>

    <div id="modal">
        
        @yield('modal')
    </div>
</div>
</body>

</html>


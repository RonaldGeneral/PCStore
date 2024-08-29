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
        
            @yield('content')
        
    </div>

    <div id="modal">
        
        @yield('modal')
    </div>
</div>
</body>

</html>


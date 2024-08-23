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
    <div id="content" class="p-3 ">
        <div class="row py-4 px-4">
            @yield('content')
        </div>
    </div>

    <div id="modal" class="p-3">
        <div class="row py-4 px-4">
        @yield('modal')
    </div>
</div>
</body>

</html>


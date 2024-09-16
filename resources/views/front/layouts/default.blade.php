<!DOCTYPE html>

<html>

<head>

    @include('front.includes.head')
    @yield('custom-head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="header-section">
        @include('front.includes.header')
    </div>
    <div id="content" class="p-3 ">
        <div class="row py-4 px-4">
            @yield('content')
        </div>
    </div>
    <footer>
        @include('front.includes.footer')
    </footer>
</body>

</html>
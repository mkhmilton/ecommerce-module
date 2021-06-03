<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.backend.includes.head')
</head>
<body class="skin-red-dark fixed-layout">
    @include('layouts.backend.includes.loader')
<div id="main-wrapper">
    @include('layouts.backend.includes.topbar')
    @include('layouts.backend.includes.left-sidebar')
    <div class="page-wrapper">
        <div class="container-fluid">
            @yield('breadcrumb')
            @yield('content')
            @include('layouts.backend.includes.right-sidebar')
        </div>
    </div>
    @include('layouts.backend.includes.footer')
</div>
@include('layouts.backend.includes.foot')
</body>

</html>

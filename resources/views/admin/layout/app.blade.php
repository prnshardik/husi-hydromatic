<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.meta')

    <title>{{ _site_title() }} | @yield('title')</title>
    
    @include('admin.layout.styles')

    <style>
        .page-footer{
            position: fixed;
            top: 550px;
            left: 222px;
        }
    </style>

</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('admin.layout.header')

        @include('admin.layout.sidebar')

        <div class="content-wrapper">
            @yield('content')
            
            @include('admin.layout.footer')
        </div>
    </div>
    
    @include('admin.layout.theme-config')

    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    
    @include('admin.layout.scripts')
</body>

</html>
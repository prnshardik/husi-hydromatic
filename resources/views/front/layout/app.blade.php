<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ _site_title() }}</title>

    @include('front.layout.meta')

    @include('front.layout.styles')
</head>

<body>
    @include('front.layout.preloader')

    @yield('content')

    @include('front.layout.footer')

    @include('front.layout.scripts')
</body>
</html>
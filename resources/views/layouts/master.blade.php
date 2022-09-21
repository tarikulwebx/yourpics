<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />

    <link rel="stylesheet" href="/assets/css/fontawesome.css" />
    <link rel="stylesheet" href="/assets/css/jquery.flipster.min.css" />
    <link rel="stylesheet" href="/assets/css/select2.min.css" />
    <link rel="stylesheet" href="/assets/css/select2-bootstrap-5-theme.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    @vite([])
    @yield('styles')
</head>

<body>
    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    @include('layouts.show-modal')

    <!--=====================================================-->
    <!--====================== SCRIPTS ======================-->
    <!--=====================================================-->
    <script src="/assets/js/jquery-3.6.1.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jquery.flipster.min.js"></script>
    <script src="/assets/js/masonry.pkgd.min.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/main.js"></script>
    @yield('scripts')
</body>

</html>

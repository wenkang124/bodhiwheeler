<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BodhiWheeler</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- animate css old -->
    <link rel="stylesheet" href="assets/css/animate-2.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="assets/flaticon/flaticon.css">
    <!-- odometer -->
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="app">

        @include('public.layouts.preloader')

        @include('public.layouts.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('public.layouts.footer')
    </div>


    <!-- jquery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- flagstrap -->
    <script src="assets/js/jquery.flagstrap.min.js"></script>
    <!-- appear js -->
    <script src="assets/js/jquery.appear.min.js"></script>
    <!-- odometer -->
    <script src="assets/js/odometer.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- slick slider -->
    <script src="assets/js/slick.min.js"></script>
    <!-- video popup -->
    <script src="assets/js/video.popup.js"></script>
    <!-- popper js -->
    <script src="assets/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="assets/js/main.js"></script>
</body>

</html>

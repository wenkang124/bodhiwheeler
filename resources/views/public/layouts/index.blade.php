<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @env(['staging', 'local'])
    <meta name="robots" content="noindex, nofollow">
    @endenv

    @env('production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9MJ4T7GKHR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9MJ4T7GKHR');
    </script>
    @endenv

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>Cheap Wheelchair Transport | Affordable Bicycle Transfer Taxi Service Singapore | BodhiWheeler</title>
    <meta name="description" content="Last 7 Years, Bodhiwheeler serves the needs of clientele Cheap Wheelchair Transport & Affordable Bicycle Transfer Taxi Service in Singapore. Call us @ +65 93682784!"> --}}
    <meta name="keywords" content="cheap wheelchair transport, wheelchair taxi, wheelchair transport service Singapore" />
    <meta property="og:title" content="Cheap Wheelchair Transport | Affordable Bicycle Transfer Taxi Service Singapore | BodhiWheeler" />
    <meta property="og:image" content="{{ asset('assets/images/meta-logo.png') }}">
    <meta property="og:description" content="Last 7 Years, Bodhiwheeler serves the needs of clientele Cheap Wheelchair Transport & Affordable Bicycle Transfer Taxi Service in Singapore. Call us @ +65 93682784!" />
    <meta name="facebook:title" content="Cheap Wheelchair Transport | Affordable Bicycle Transfer Taxi Service Singapore | BodhiWheeler" />
    <meta name="facebook:description" content="Last 7 Years, Bodhiwheeler serves the needs of clientele Cheap Wheelchair Transport & Affordable Bicycle Transfer Taxi Service in Singapore. Call us @ +65 93682784!" />
    <meta property="og:site_name" content="Bodhiwheeler Wheelchair Transport" />
    <meta name="classification" content="Bodhiwheeler,Bodhiwheeler Singapore,Wheelchair Transport, Bicycle Transport, Charter Service" />
    <meta name="distribution" content="Global" />
    <meta name="generator" content="Bodhiwheeler,Wheelchair Transport, Singapore, Bicycle Transport,Charter Service,Hourly Service" />
    <meta name="rating" content="General" />
    <meta name="revisit-after" content="7 days" />
    <meta name="rating" content="general" />
    <meta name="googlebot" content="index, follow" />
    <meta name="creator" content="bodhiwheeler.com" />
    <meta name="publisher" content="Bodhiwheeler (www.bodhiwheeler.com)" />
    <meta name="author" content="Bodhiwheeler">
    <meta name="email" content="bodhiwheelers@gmail.com" />
    <meta name="expire" content="2050-01-01" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="document-classification" content="Wheelchair Transport" />
    <meta name="document-type" content="Public" />
    @stack('meta')


    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/favicons/favicon-96x96.png') . '?v=1' }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicons/favicon.svg') . '?v=1' }}" />
    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') . '?v=1' }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') . '?v=1' }}" />

    <!-- animate css old -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate-2.css') }}">
    <!-- flaticon -->
    <link rel="stylesheet" href="{{ asset('assets/flaticon/flaticon.css') }}">
    <!-- odometer -->
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/datetimepicker.min.css') }}">

    <!-- Global site tag (gtag.js) - Google Ads: 481469850 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-481469850"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-481469850');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-223922423-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-223922423-1');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QJ430R7Y2E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QJ430R7Y2E');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KHFZ2DP');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHFZ2DP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app">

        @include('public.layouts.preloader')

        @include('public.layouts.header')

        <main>
            @yield('content')
        </main>

        @include('public.layouts.footer')
    </div>

    <script>
        function gtag_report_conversion(url) {
            var callback = function() {
                if (typeof(url) != 'undefined') {
                    window.location = url;
                }
            };
            gtag('event', 'conversion', {
                'send_to': 'AW-481469850/S_BRCLq405kDEJrLyuUB',
                'event_callback': callback
            });
            return false;
        }
    </script>

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- flagstrap -->
    <script src="{{ asset('assets/js/jquery.flagstrap.min.js') }}"></script>
    <!-- appear js -->
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <!-- odometer -->
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- video popup -->
    <script src="{{ asset('assets/js/video.popup.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/datetimepicker.min.js') }}"></script>

    <!-- sweetalert -->
    <script type="text/javascript" src="{{ asset('plugins/sweetalert/sweetalert2@9.js') }}"></script>


    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Successfully',
                text: '{{ Session::get('success') }}',
                width: 600,
                padding: '3em',
                color: '#ffffff',
                confirmButtonColor: '#c09869',
                background: '#000000bf',
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ Session::get('error') }}',
                width: 600,
                padding: '3em',
                color: '#ffffff',
                confirmButtonColor: '#c09869',
                background: '#000000bf',
            });
        </script>
    @endif

    @stack('scripts')
</body>

</html>

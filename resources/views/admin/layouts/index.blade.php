<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Panel | {{env('APP_NAME')}}</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('dashboard-assets/favicons/apple-icon-57x57.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('dashboard-assets/favicons/apple-icon-60x60.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('dashboard-assets/favicons/apple-icon-72x72.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard-assets/favicons/apple-icon-76x76.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('dashboard-assets/favicons/apple-icon-114x114.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('dashboard-assets/favicons/apple-icon-120x120.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('dashboard-assets/favicons/apple-icon-144x144.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('dashboard-assets/favicons/apple-icon-152x152.png').'?v=1' }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('dashboard-assets/favicons/apple-icon-180x180.png').'?v=1' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard-assets/favicons/favicon-16x16.png').'?v=1' }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard-assets/favicons/favicon-32x32.png').'?v=1' }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard-assets/favicons/favicon-96x96.png').'?v=1' }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('dashboard-assets/favicons/android-icon-192x192.png').'?v=1' }}">
    <link href="{{ asset('dashboard-assets/extra-libs/toastr/dist/build/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/extra-libs/custom-switch/bootstrap4-toggle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="{{ asset('dashboard-assets/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/datetimepicker.min.css') }}">
    @stack('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
        window.OneSignalDeferred = window.OneSignalDeferred || [];
        OneSignalDeferred.push(async function(OneSignal) {
            await OneSignal.init({
                appId: "bb509b4d-b2c0-40b1-90d6-210c2b77f5ee",
                allowLocalhostAsSecureOrigin: true,
            });
            OneSignal.login("{{Auth::id()}}");
        });
    </script>
</head>

<body>

    @include('admin.layouts.preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @include('admin.layouts.header')
        @include('admin.layouts.menu')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                @stack('breadcrumb')
            </div>
            @yield('content')
            @include('admin.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    {{-- @include('admin.layouts.customiser') --}}

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('dashboard-assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/app.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/app.init.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/waves.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/extra-libs/custom-switch/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/extra-libs/toastr/dist/build/toastr.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/block-ui/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.9/index.global.min.js'></script>

    <script src="{{ asset('dashboard-assets/js/custom.min.js') }}"></script>

    <script src="{{ asset('assets/js/datetimepicker.min.js') }}"></script>
    <!-- ############################################################### -->
    <!-- This Page Js Files Here -->
    <!-- ############################################################### -->

    @include('admin.layouts.alert-message')
    @stack('scripts')

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Panel | {{env('APP_NAME')}}</title>
    <!-- Favicon icon -->
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
    <!-- Custom CSS -->
    <link href="/dashboard-assets/css/style.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/css/custom.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        @include('admin.layouts.preloader')
        <!-- -------------------------------------------------------------- -->
        <!-- Login box.scss -->
        <!-- -------------------------------------------------------------- -->
        <div class="row auth-wrapper gx-0">
            <div class=" col-lg-4 col-xl-3 bg-info auth-box-2 on-sidebar">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-7 col-lg-12 col-xl-9">
                            <div>
                                <img class="img-fluid w-75" src="/dashboard-assets/images/logo.png?v=1" alt="logo" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9 d-flex align-items-center justify-content-center">
                <div class="row justify-content-center w-100 mt-4 mt-lg-0">
                    <div class="col-lg-8 col-xl-4 col-md-7">
                        <div class="card" id="loginform">
                            <div class="card-body">
                                <h2>Welcome to Admin Portal</h2>
                                <p class="text-muted">
                                    Unable to login?
                                    <a href="javascript:void(0)">Contact us</a>
                                </p>
                                @if($errors->has('auth'))
                                <p class="text-danger text-center">{{$errors->first('auth')}}</p>
                                @endif
                                {{Form::open(['class'=>'form-horizontal mt-4 needs-validation','novalidate'])}}
                                <div class="form-floating mb-3">
                                    {{Form::email('email',null,['class'=>'form-control form-input-bg','id'=>'tb-email', 'placeholder'=>'name@example.com','required'])}}
                                    <label for="tb-email">Email</label>
                                    <div class="invalid-feedback">Email is required</div>
                                </div>

                                <div class="form-floating mb-3">
                                    {{Form::password('password',['class'=>'form-control form-input-bg','id'=>'text-password', 'placeholder'=>'*****','required'])}}
                                    <label for="text-password">Password</label>
                                    <div class="invalid-feedback">Password is required</div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <div class="form-check">
                                        {{Form::checkbox('remember',true,null,['id'=>'remember-me','class'=>'form-check-input'])}}
                                        <label class="form-check-label" for="remember-me">
                                            Remember me
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                    {{-- <div class="ms-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="fw-bold">Forgot Password?</a>
                                    </div> --}}
                                </div>
                                <div class="d-flex justify-content-center button-group mt-4 pt-2">
                                    <button type="submit" class="btn btn-info btn-lg px-4">
                                        Sign in
                                    </button>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                        <div class="card" id="recoverform">
                            <div class="card-body">
                                <div class="logo">
                                    <h3>Recover Password</h3>
                                    <p class="text-muted fs-4">
                                        Enter your Email and instructions will be sent to you!
                                    </p>
                                </div>
                                <div class="mt-4 pt-4">
                                    <!-- Form -->
                                    <form action="#">
                                        <!-- email -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating">
                                                <input class="form-control form-input-bg" type="email" required="" placeholder="Email address" />
                                                <label for="tb-email">Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-stretch button-group">
                                            <button type="submit" class="btn btn-info btn-lg px-4">
                                                Submit
                                            </button>
                                            <a href="javascript:void(0)" id="to-login" class="btn btn-lg btn-light-secondarytext-secondaryfont-weight-medium">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Login box.scss -->
        <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Required js -->
    <!-- -------------------------------------------------------------- -->
    <script src="/dashboard-assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/dashboard-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(".preloader").fadeOut();
      // ---------------------------
      // Login and Recover Password
      // ---------------------------
      $("#to-recover").on("click", function () {
        $("#loginform").hide();
        $("#recoverform").fadeIn();
      });

      $("#to-login").on("click", function () {
        $("#loginform").fadeIn();
        $("#recoverform").hide();
      });

      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>
</body>

</html>

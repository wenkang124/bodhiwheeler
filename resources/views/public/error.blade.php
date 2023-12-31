@extends('public.layouts.index')

@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb error-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>Error</h1>
                        <ul>
                            <li>Home</li>
                            <li>-</li>
                            <li>Error</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- error begin -->
    <div class="error">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="boxes">
                        <div class="single-box">4</div>
                        <div class="single-box">0</div>
                        <div class="single-box">4</div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="part-txt">
                        <h2><span>Ooops!</span> Sorry, Page Not Found</h2>
                        <p>The page you are looking for does not exist.</p>
                        <a href="index.html" class="def-btn">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error end -->

    <!-- call back begin -->
    <div class="call-back">
        <div class="container">
            <div class="bg">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="part-txt">
                            <h5>Get Started Instantly!</h5>
                            <h2>Request a Call Back Now</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form">
                            <form>
                                <input type="email" placeholder="Your email address here" required>
                                <button>Request Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- call back end -->
@endsection

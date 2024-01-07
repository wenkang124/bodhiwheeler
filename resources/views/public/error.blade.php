@extends('public.layouts.index')
@push('meta')
    <title>404 Page Error</title>
@endpush

@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>Error</h1>
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
                        <a href="{{ route('home') }}" class="def-btn">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error end -->
@endsection

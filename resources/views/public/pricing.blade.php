@extends('public.layouts.index')

@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>Pricing</h1>
                        <ul>
                            <li>Home</li>
                            <li>-</li>
                            <li>Pricing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- pricing begin -->
    <div class="pricing pricing-inner-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="heading">
                        <h5>PRICING PLANS</h5>
                        <h2>Our Pricing Plans</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="controls">
                        <span>Monthly</span>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-month-tab" data-toggle="tab" href="#nav-month"
                                    role="tab" aria-controls="nav-month" aria-selected="true"></a>
                                <a class="nav-item nav-link" id="nav-year-tab" data-toggle="tab" href="#nav-year"
                                    role="tab" aria-controls="nav-year" aria-selected="false"></a>
                            </div>
                        </nav>
                        <span>Yearly</span>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-9">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-month" role="tabpanel"
                            aria-labelledby="nav-month-tab">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="single-box">
                                        <div class="part-img">
                                            <img src="assets/images/pricing-img-1.jpg" alt="image">
                                            <div class="price">
                                                <h3><span>$</span>50<span>P/M</span></h3>
                                            </div>
                                        </div>
                                        <div class="part-txt">
                                            <h3>STANDARD PLAN</h3>
                                            <ul>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>All
                                                    careBasic service</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Security
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Patch
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24 GB Email
                                                    marketing</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24/7 system
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="part-btn">
                                            <a href="#" class="def-btn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="single-box">
                                        <div class="part-img">
                                            <img src="assets/images/pricing-img-2.jpg" alt="image">
                                            <div class="price">
                                                <h3><span>$</span>75<span>P/M</span></h3>
                                            </div>
                                        </div>
                                        <div class="part-txt">
                                            <h3>PROFESSIONAL PLAN</h3>
                                            <ul>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>All
                                                    careBasic service</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Security
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Patch
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24 GB Email
                                                    marketing</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24/7 system
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="part-btn">
                                            <a href="#" class="def-btn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-year" role="tabpanel" aria-labelledby="nav-year-tab">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="single-box">
                                        <div class="part-img">
                                            <img src="assets/images/pricing-img-1.jpg" alt="image">
                                            <div class="price">
                                                <h3><span>$</span>50<span>P/Y</span></h3>
                                            </div>
                                        </div>
                                        <div class="part-txt">
                                            <h3>STANDARD PLAN</h3>
                                            <ul>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>All
                                                    careBasic service</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Security
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Patch
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24 GB Email
                                                    marketing</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24/7 system
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="part-btn">
                                            <a href="#" class="def-btn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="single-box">
                                        <div class="part-img">
                                            <img src="assets/images/pricing-img-2.jpg" alt="image">
                                            <div class="price">
                                                <h3><span>$</span>75<span>P/Y</span></h3>
                                            </div>
                                        </div>
                                        <div class="part-txt">
                                            <h3>PROFESSIONAL PLAN</h3>
                                            <ul>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>All
                                                    careBasic service</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Security
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>Patch
                                                    management</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24 GB Email
                                                    marketing</li>
                                                <li><span><i class="flaticon-right-arrow-in-a-circle"></i></span>24/7 system
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="part-btn">
                                            <a href="#" class="def-btn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing end -->

    <!-- pricing 2 begin -->
    <div class="pricing-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="heading heading-2">
                        <h5>PRICING PLANS</h5>
                        <h2>Our Pricing Plans</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="single-box">
                        <div class="top">
                            <div class="part-icon">
                                <img src="assets/images/pricing-icon-1.png" alt="icon">
                            </div>
                            <div class="price">
                                <p>$</p>
                                <h3>30 <span>P/M</span></h3>
                            </div>
                        </div>
                        <div class="bottom">
                            <h3>Basic Plan</h3>
                            <ul>
                                <li>All careBasic service</li>
                                <li>Security management</li>
                                <li>Patch management</li>
                                <li>24 GB Email marketing</li>
                                <li>24/7 system</li>
                            </ul>
                            <a href="#" class="part-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="single-box">
                        <div class="top">
                            <div class="part-icon">
                                <img src="assets/images/pricing-icon-2.png" alt="icon">
                            </div>
                            <div class="price">
                                <p>$</p>
                                <h3>60 <span>P/M</span></h3>
                            </div>
                        </div>
                        <div class="bottom">
                            <h3>Standard Plan</h3>
                            <ul>
                                <li>All careBasic service</li>
                                <li>Security management</li>
                                <li>Patch management</li>
                                <li>24 GB Email marketing</li>
                                <li>24/7 system</li>
                            </ul>
                            <a href="#" class="part-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="single-box">
                        <div class="top">
                            <div class="part-icon">
                                <img src="assets/images/pricing-icon-3.png" alt="icon">
                            </div>
                            <div class="price">
                                <p>$</p>
                                <h3>90 <span>P/M</span></h3>
                            </div>
                        </div>
                        <div class="bottom">
                            <h3>Advance Plan</h3>
                            <ul>
                                <li>All careBasic service</li>
                                <li>Security management</li>
                                <li>Patch management</li>
                                <li>24 GB Email marketing</li>
                                <li>24/7 system</li>
                            </ul>
                            <a href="#" class="part-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing 2 end -->

    <!-- pricing 3 begin -->
    <div class="pricing-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="heading">
                        <h5>PRICING PLANS</h5>
                        <h2>Our Pricing Plans</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-11 col-lg-12">
                    <div class="boxes">
                        <div class="single-box">
                            <div class="row no-gutters justify-content-between align-items-center">
                                <div class="col-xl-2 col-lg-2">
                                    <div class="part-img">
                                        <img src="assets/images/pricing-img-3.jpg" alt="image">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="title">
                                        <h4>Basic Plan</h4>
                                        <div class="price">
                                            <p>$</p>
                                            <h3>30 <span>P/M</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                    <ul>
                                        <li>All careBasic service</li>
                                        <li>Security management</li>
                                        <li>Patch management</li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                    <ul>
                                        <li>24 GB Email marketing</li>
                                        <li>25GB Google drive </li>
                                        <li>24/7 system</li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4">
                                    <div class="part-btn">
                                        <a href="#">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-box">
                            <div class="row no-gutters justify-content-between align-items-center">
                                <div class="col-xl-2 col-lg-2">
                                    <div class="part-img">
                                        <img src="assets/images/pricing-img-4.jpg" alt="image">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="title">
                                        <h4>Standard Plan</h4>
                                        <div class="price">
                                            <p>$</p>
                                            <h3>65 <span>P/M</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                    <ul>
                                        <li>All careBasic service</li>
                                        <li>Security management</li>
                                        <li>Patch management</li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                    <ul>
                                        <li>24 GB Email marketing</li>
                                        <li>25GB Google drive </li>
                                        <li>24/7 system</li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4">
                                    <div class="part-btn">
                                        <a href="#">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-box">
                            <div class="row no-gutters justify-content-between align-items-center">
                                <div class="col-xl-2 col-lg-2">
                                    <div class="part-img">
                                        <img src="assets/images/pricing-img-5.jpg" alt="image">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="title">
                                        <h4>Advance Plan</h4>
                                        <div class="price">
                                            <p>$</p>
                                            <h3>95 <span>P/M</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                    <ul>
                                        <li>All careBasic service</li>
                                        <li>Security management</li>
                                        <li>Patch management</li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                    <ul>
                                        <li>24 GB Email marketing</li>
                                        <li>25GB Google drive </li>
                                        <li>24/7 system</li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4">
                                    <div class="part-btn">
                                        <a href="#">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing 3 end -->

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

@extends('public.layouts.index')

@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb faq-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>Faq’s</h1>
                        <ul>
                            <li>Home</li>
                            <li>-</li>
                            <li>Faq’s</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- frequently asked question begin -->
    <div class="faq faq-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="heading">
                        <h5>REPEATED QUESTIONS</h5>
                        <h2>Frequently Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="part-txt">
                        <div id="accordion">
                            <div class="row justify-content-center faq-inner-2">
                                <div class="col-xl-6 col-lg-7 col-md-9">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    What are the business advisory company?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    Research is What Makes Business Plan?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    How to achieving Small Business Success?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    Why Business Planning is Important?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseFive"
                                                    aria-expanded="false" aria-controls="collapseFive">
                                                    Can I reprint or distribute Our publications?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-5 col-md-9">
                                    <div class="part-img">
                                        <img src="assets/images/faq-img-1.png" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-5 col-md-9">
                                    <div class="part-img">
                                        <img src="assets/images/faq-img-2.png" alt="image">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7 col-md-9">
                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseSix" aria-expanded="false"
                                                    aria-controls="collapseSix">
                                                    How would I go about planning for retirement?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingSeven">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseSeven" aria-expanded="false"
                                                    aria-controls="collapseSeven">
                                                    How frequently should I see a trainer?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingEight">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseEight" aria-expanded="false"
                                                    aria-controls="collapseEight">
                                                    How frequently auctor quam vitae fermtum?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingNine">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseNine" aria-expanded="false"
                                                    aria-controls="collapseNine">
                                                    How to increase your business growth?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingten">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseten" aria-expanded="false"
                                                    aria-controls="collapseten">
                                                    How donec posuere velit faucibus auctor?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseten" class="collapse" aria-labelledby="headingten"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Dolore omnis
                                                    quaerat nostrum, pariatur ipsam sunt accusamus enim necessitatibus est
                                                    fugiat, assumenda dolorem, deleniti corrupti.</p>
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
    </div>
    <!-- frequently asked question end -->

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

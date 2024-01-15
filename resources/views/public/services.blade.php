@extends('public.layouts.index')
@push('meta')
    <title>Our Services | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb service-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>Our services</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- service two begin -->
    <div class="service-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="part-txt">
                        <div class="heading text-left">
                            <h5>Services</h5>
                            <h2>Wheelchair Transport Service</h2>
                        </div>
                        <p>
                            Bodhi Wheeler has been meeting the transportation needs of clients in Singapore since 2014. We
                            specialize in providing affordable and safe wheelchair transport services for physically
                            challenged individuals and the elderly. Our Wheelchair Transport Vehicles, equipped with
                            hydraulic lifts, ensure secure and comfortable rides for essential travel and social activities.
                            Our services have gained popularity due to their affordability, emphasis on safety, and the
                            dedication of our highly-trained drivers. Wheelchairs are securely restrained in our vehicles,
                            and regular audits uphold our service standards. Your safety and satisfaction are our
                            priorities.</p>
                        <div class="boxes">
                            <div class="single-box">
                                <div class="part-icon">
                                    <img src="{{asset('assets/images/service-icon-1.png') }}" alt="icon">
                                </div>
                                <div class="txt">
                                    <h3>Safe Wheelchair Locking: 4-Point Security</h3>
                                    <p>4-point locking mechanism to ensure that the wheelchair is secured safely in place.
                                    </p>
                                </div>
                            </div>
                            <div class="single-box">
                                <div class="part-icon">
                                    <img src="{{asset('assets/images/service-icon-2.png') }}" alt="icon">
                                </div>
                                <div class="txt">
                                    <h3>Comfortable and Safe Wheelchair Transportation</h3>
                                    <p>Our assisted mobility vehicles are purpose build vehicles for wheelchair passengers
                                        which are equipped for enhanced comfort and safety.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="part-img">
                        <img src="{{ asset('assets/images/service-img-1.jpg') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service two end -->

    <!-- service details begin -->
    <div class="service-details">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6">
                <div class="heading">
                    <h5>What We Offer</h5>
                    <h2>We Provide Quality Service</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="sidebar">
                        <div class="side-nav">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-one-tab" data-toggle="pill" href="#v-pills-one"
                                    role="tab" aria-controls="v-pills-one" aria-selected="true">Medical Appointment</a>
                                <a class="nav-link" id="v-pills-two-tab" data-toggle="pill" href="#v-pills-two"
                                    role="tab" aria-controls="v-pills-two" aria-selected="false">Dialysis Center</a>
                                <a class="nav-link" id="v-pills-three-tab" data-toggle="pill" href="#v-pills-three"
                                    role="tab" aria-controls="v-pills-three" aria-selected="false">Rehabilitation
                                    Center</a>
                                <a class="nav-link" id="v-pills-four-tab" data-toggle="pill" href="#v-pills-four"
                                    role="tab" aria-controls="v-pills-four" aria-selected="false">Medical Escort</a>
                                <a class="nav-link" id="v-pills-five-tab" data-toggle="pill" href="#v-pills-five"
                                    role="tab" aria-controls="v-pills-five" aria-selected="false">Daycare Center</a>
                                <a class="nav-link" id="v-pills-six-tab" data-toggle="pill" href="#v-pills-six"
                                    role="tab" aria-controls="v-pills-six" aria-selected="false">Charter /
                                    Hourly</a>
                                <a class="nav-link" id="v-pills-seven-tab" data-toggle="pill" href="#v-pills-seven"
                                    role="tab" aria-controls="v-pills-seven" aria-selected="false">Social Event</a>
                                <a class="nav-link" id="v-pills-eight-tab" data-toggle="pill" href="#v-pills-eight"
                                    role="tab" aria-controls="v-pills-eight" aria-selected="false">
                                    Airport Transfers</a>
                                <a class="nav-link" id="v-pills-nine-tab" data-toggle="pill" href="#v-pills-nine"
                                    role="tab" aria-controls="v-pills-nine" aria-selected="false">Singapore Day
                                    Trips</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 next">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-one" role="tabpanel"
                            aria-labelledby="v-pills-one-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/health-check.png') }}" alt="health check" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Medical Appointment</h2>
                                    <p>Our drivers will ensure you are on time for your medical appointment, in addition you
                                        are able to avoid the hassle of getting in/out of a normal taxi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-two-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/dialysis.png') }}" alt="dialysis" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Dialysis Center</h2>
                                    <p>Regular Dialysis is taking a toll on your mental and monetarily health, however with
                                        our wheelchair transport you are not paying too much for your regular trips to
                                        Dialysis Center.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-three" role="tabpanel"
                            aria-labelledby="v-pills-three-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/rehabilitation.png') }}" alt="rehabilitation" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Rehabilitation Center</h2>
                                    <p>Recovery is a long difficult path and for this reason we are here to provide a safe,
                                        comfortable and reliable wheelchair ride to your Singapore rehabilitation center.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-four" role="tabpanel" aria-labelledby="v-pills-four-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/medical-escort.png') }}" alt="medical-escort" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Medical Escort</h2>
                                    <p>Our Singapore Medical Escorts are able to provide medical care. However, we hope that
                                        you can accompany your loved one as we cannot replace your absence.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-five" role="tabpanel" aria-labelledby="v-pills-five-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/daycare.png') }}" alt="daycare" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Daycare Center</h2>
                                    <p>Our top priority is your loved one's safety, that is to say our drivers have the
                                        right experience making sure the wheelchair user is properly secure even though it
                                        can be just a short ride in our wheelchair transport
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-six" role="tabpanel" aria-labelledby="v-pills-six-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/van.png') }}" alt="van" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Charter / Hourly</h2>
                                    <p>Our charter wheelchair transport is available for the duration you book. Not to
                                        mention you can bring five caregivers. At the same time, you may visit as many
                                        places as possible into Singapore.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-seven" role="tabpanel"
                            aria-labelledby="v-pills-seven-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/social.png') }}" alt="social" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Social Event</h2>
                                    <p>To parties, weddings, concerts, special family gathering. Visits to religious
                                        institutions (church, temple & mosque etc.)
                                        Or just going out to enjoy yourself.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-eight" role="tabpanel"
                            aria-labelledby="v-pills-eight-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/airplane.png') }}" alt="airplane" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2> Airport Transfers</h2>
                                    <p>Departure from Hotel to Airport / Cruise Center.
                                        Arrival Pick up from Airport / Cruise Center.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-nine" role="tabpanel" aria-labelledby="v-pills-nine-tab">
                            <div class="main-content">
                                <div class="part-txt">
                                    <img src="{{ asset('assets/images/road.png') }}" alt="road" class="mx-auto d-block mb-5 mt-5 mb-md-5 mt-md-5">
                                    <h2>Singapore Day Trips</h2>
                                    <p>Singapore is a city in Southeast Asia that combines the best of the old and the new
                                        with so many exciting things to see. Just need to book a ride with us.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service details end -->

    <!-- pricing begin -->
    @include('public.components.price-list')
    <!-- pricing end -->

    <!-- call back begin -->
    @include('public.components.call-back')
    <!-- call back end -->
@endsection

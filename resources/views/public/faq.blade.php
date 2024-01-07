@extends('public.layouts.index')
@push('meta')
    <title>FAQ'S | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb faq-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>Faq’s</h1>
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
                                <div class="col-xl-12 col-lg-12 col-md-9">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Is this an ambulance service?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>No. We are providing non-emergency point to point transport service for
                                                    wheelchair users and elderly. For non emergency ambulance service, you
                                                    can call 1777.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                   Procedure for dialysis transport?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>We will pick the patient at the pick up point of his residential, send
                                                    him to the dialysis centre and hand him over to the triage personnel at
                                                    the entrance. There shall be no physical contact between the patient and
                                                    the driver.</p>

                                                <p>For picking up, the patient has to be ready in the wheelchair at the
                                                    scheduled time. The driver may only hold on the wheelchair for the
                                                    patient to get into wheelchair on his own or with the support of the
                                                    medical staff.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    Transport details generate on?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>The evening before the service date.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    Do you accept phone / whatsapp booking?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>We do accept phone/ whatsapp booking.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseFive"
                                                    aria-expanded="false" aria-controls="collapseFive">
                                                    I only want to pay cash, how?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>We accept cash or paynow.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseSix"
                                                    aria-expanded="false" aria-controls="collapseSix">
                                                    Any charges on last minute cancellation?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>We will decide on a case by case basis.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingSeven">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-toggle="collapse" data-target="#collapseSeven"
                                                    aria-expanded="false" aria-controls="collapseSeven">
                                                    Do you provide door to door pickup?
                                                    <span><i class="flaticon-arrow-down-sign-to-navigate"></i></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Yes. $15 per trip. We will not go into the flat / apartment.</p>
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
      @include('public.components.call-back')
      <!-- call back end -->
@endsection

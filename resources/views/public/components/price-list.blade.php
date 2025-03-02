<!-- pricing begin -->
<style>
    .list-item.price-item {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        padding: 8px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .list-item.price-item .description {
        font-size: 16px !important;
        line-height: 30px !important;
        color: #4b4b46 !important;
        margin-left: 20px;
        transition: color 0.3s ease;
    }

    .list-item.price-item .price {
        font-weight: 800;
        transition: color 0.3s ease;
    }

    .list-item.price-item i {
        transition: color 0.3s ease;
    }

    .list-item.price-item:hover {
        background-color: rgba(231, 176, 60, 0.05);
        transform: translateX(5px);
    }

    .list-item.price-item:hover>span>i,
    .list-item.price-item:hover>span>.description,
    .list-item.price-item:hover>.price {
        color: #E7B03C !important;
    }
</style>

<div class="pricing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4">
                <div class="heading">
                    <h5>TRANSPORT FARES</h5>
                    <h2>Our Pricing List</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-month" role="tabpanel" aria-labelledby="nav-month-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="single-box">
                                <div class="part-txt">
                                    <h3>BODHIWHEELER</h3>
                                    <ul>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">{!! 'One Way Wheelchair Ride <5km:' !!}</span></span>
                                            <span class="price">$40</span>
                                        </li>

                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">One Way Wheelchair Ride >5km:</span></span>
                                            <span class="price">$45 onwards</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Charter/hourly (Min.3 hours applies)
                                                    :</span></span>
                                            <span class="price">$55/hr onwards</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Medical Escort Service (Min.3 hours applies)
                                                    :</span></span>
                                            <span class="price">$40/hr</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Urgent booking (Advance booking is encouraged to
                                                    avoid this
                                                    Surcharge):</span></span>
                                            <span class="price">$20 onwards</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Having >2 caregivers is
                                                    chargeable:</span></span>
                                            <span class="price">$10/pax</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Second Wheelchair User per way :</span></span>
                                            <span class="price">$25</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Airport arrival:</span></span>
                                            <span class="price">$100</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description"> Booking less than 24
                                                    hours starts from:</span></span>
                                            <span class="price">$45</span>
                                        </li>
                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description"><b>Terms and conditions</b></span></span>
                                            <span class="price"></span>
                                        </li>

                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Our package includes 1 wheelchair pax plus 2
                                                    caregivers.</span></span>
                                            <span class="price"></span>
                                        </li>

                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">The above price quoted are exclusive of
                                                    surcharge and erp charges.</span></span>
                                            <span class="price"></span>
                                        </li>

                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Booking on the same day or making any last
                                                    minute surchange applies.</span></span>
                                            <span class="price"></span>
                                        </li>

                                        <li class="list-item price-item">
                                            <span class="d-flex align-items-baseline"><i class="flaticon-right-arrow-in-a-circle"></i><span class="description">Complimentary waiting time of 5 minutes. Please
                                                    be punctual.</span></span>
                                            <span class="price"></span>
                                        </li>
                                    </ul>
                                    <div class="part-btn">
                                        <a href="{{ route('booking') }}" class="def-btn">Book Now</a>
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

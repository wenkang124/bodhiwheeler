<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="row no-gutters justify-content-between align-items-center">
                <div class="col-xl-4 col-lg-5 col-sm-8">
                    <div class="top-left">
                        <ul>
                            <li><i class="flaticon-message"></i><span> bodhiwheelers@gmail.com</span></li>
                            <li><i class="flaticon-phone-call"></i><span>+65 93682784</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-4 d-flex justify-content-sm-end justify-content-center">
                    <div class="top-right">
                        <a href="https://www.facebook.com/bodhi.wheeler.96" class="fb" target="_blank"><i class="flaticon-facebook"></i></a>
                        <a href="mailto:bodhiwheelers@gmail.com" class="tw" target="_blank"><i class="flaticon-message"></i></a>
                        <a href="https://wa.me/6593682784?text=Hi%20there!%20I'm%20interested%20in%20your%20services.%20Can%20you%20provide%20more%20information%20about%20booking%20a%20ride?" target="_blank" onclick="gtag_report_conversion('http://web.whatsapp.com/send?phone=+6593682784');">
                            <img class="whatsapp" src="{{ asset('assets/flaticon/whatsapp.png') }}" alt="WhatsApp">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="bg">
            <div class="container">
                <div class="bg-2">
                    <div class="bg-3">
                        <div class="row">
                            <div class="d-xl-none d-lg-none col-4">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="flaticon-menu-button-of-three-horizontal-lines"></i>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-1 col-4 d-flex align-items-center">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img src={{ asset('assets/images/logo.png') }} alt="LOGO">

                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-9 next">
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">HOME</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">ABOUT US</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">SERVICES</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('booking') ? 'active' : '' }}" href="{{ route('booking') }}">BOOK A RIDE</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">PRICING</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">CONTACTS</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-4">
                                <div class="bottom-right">
                                    <a href="#" class="follow"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

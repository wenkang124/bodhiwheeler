 <div class="footer">
     <div class="container">
         <div class="main-footer">
             <div class="row justify-content-between">
                 <div class="col-xl-3 col-lg-4 col-sm-6">
                     <div class="about-txt">
                         <h3>About Us</h3>
                         <p>Discover BodhiWheeler, your go-to for wheelchair transport services in Singapore
                             since 2014. We're dedicated to meeting your transportation needs with excellence</p>
                         <ul>
                             <li><span><i class="flaticon-pin"></i></span>26, Newton Road #23-09 Singapore - 307957</li>
                             <li><span><i class="flaticon-headphones"></i></span>Business Hours <br/>
                                Monday - Friday 08:00 - 18:00
                                Saturday 08:00 - 13:00</li>
                             </li>
                         </ul>
                     </div>
                 </div>

                 <div class="col-xl-2 col-lg-2 col-sm-6">
                     <div class="link">
                         <h3>BodhiWheeler</h3>
                         <ul>
                             <li><a href="{{ route('home') }}">Home</a></li>
                             <li><a href="{{ route('about-us') }}">About Us</a></li>
                             <li><a href="{{ route('services') }}">Services</a></li>
                             <li><a href="{{ route('booking') }}">Book A Ride</a></li>
                             <li><a href="{{ route('pricing') }}">Pricing</a></li>
                             <li><a href="{{ route('faq') }}">FAQ</a></li>
                             <li><a href="{{ route('contact') }}">Contacts</a></li>
                         </ul>
                     </div>
                 </div>

                 <div class="col-xl-2 col-lg-2 col-sm-6">
                    <div class="about-txt">
                        <h3>Our Contact</h3>
                        <ul>
                           <li><span><i class="flaticon-message"></i></span>bodhiwheelers@gmail.com</li>
                           <li><span><i class="flaticon-phone-call"></i></span>+65 93682784</li>
                           </li>
                       </ul>
                    </div>
                </div>
                 <div class="col-xl-3 col-lg-4 col-sm-6">
                     <div class="newsletter">
                         <h3>Qualified In</h3>
                         <p><img src="{{ asset('assets/images/bizsafe.png') }}" alt="Bizsafe Icon"></p>
                         <div class="social">
                            <a href="https://www.facebook.com/bodhi.wheeler.96" class="fb"
                            target="_blank"><i class="flaticon-facebook"></i></a>
                        <a href="mailto:bodhiwheelers@gmail.com" class="tw" target="_blank"><i
                                class="flaticon-message"></i></a>
                        <a href="https://wa.me/6593682784?text=Hi%20there!%20I'm%20interested%20in%20your%20services.%20Can%20you%20provide%20more%20information%20about%20booking%20a%20ride?"
                            target="_blank">
                            <img class="whatsapp" src="{{ asset('assets/flaticon/whatsapp.png') }}" alt="WhatsApp">
                        </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="copyright">
         <div class="container">
             <div class="row">
                <div class="col-xl-6 col-lg-6 d-flex align-items-center justify-content-center">
                    <p><img src="{{ asset('assets/images/footer-logo.png') }}" alt="Footer Logo"></p>
                </div>
                <div class="col-xl-6 col-lg-6 d-flex align-items-center justify-content-center">
                    <p>Copyright &copy; {{ now()->year }} BodhiWheeler Reserved</p>
                 </div>
             </div>
         </div>
     </div>
 </div>

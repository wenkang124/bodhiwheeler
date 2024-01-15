 <!-- about begin -->
 <div class="about">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-6 col-md-9">
                 <div class="image-box">
                     <div class="part-img">
                         <img src="{{ asset('assets/images/about-img.png') }}" alt="image">
                     </div>
                     <div class="fun-fact-inner">
                         <div class="single-box">
                             <h4><span class="odometer" data-count="4.7">0</span>+</h4>
                             <p>
                                 <span>
                                     <i class="flaticon-star"></i>
                                     <i class="flaticon-star"></i>
                                     <i class="flaticon-star"></i>
                                     <i class="flaticon-star"></i>
                                     <i class="flaticon-star"></i>
                                 </span>
                                 Top Rating
                             </p>
                         </div>
                         <div class="single-box">
                             <h4><span class="odometer" data-count="3">0</span>K+</h4>
                             <p>Successful Wheelchair Transportations</p>
                         </div>
                         <div class="single-box">
                             <h4><span class="odometer" data-count="20">0</span>+</h4>
                             <p>Expert Crew Members</p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-6 col-md-9">
                 <div class="part-txt">
                     <div class="heading">
                         <h5>Welcome to BodhiWheeler</h5>
                         <h2>Your Prime Choice for Wheelchair-Friendly Travel</h2>
                     </div>
                     <p>Bodhiwheeler Transport has been serving the needs of clientele in Singapore nearly 7 years. Our
                         mission is to provide mobility assistance to the elderly, mobility impaired and
                         wheelchair-bound
                         residents within the singapore. With this goal in mind, Bodhiwheeler pledges to provide caring,
                         safe, and sensitive assistance to our clients while providing the highest quality and
                         affordable
                         transportation available.</p>
                     <div class="boxes">
                         <div class="row">
                             <div class="col-xl-6 col-lg-6 col-sm-6">
                                 <div class="single-box">
                                     <div class="icon">
                                         <span><i class="flaticon-adaptation"></i></span>
                                     </div>
                                     <div class="txt">
                                         <h3>Wheelchair-Friendly Transportation</h3>
                                         <span>Our services offer flexible and adaptable solutions for comfortable
                                             wheelchair transport.</span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-6 col-lg-6 col-sm-6">
                                 <div class="single-box">
                                     <div class="icon">
                                         <span><i class="flaticon-admin"></i></span>
                                     </div>
                                     <div class="txt">
                                         <h3>Customized Wheelchair Solution</h3>
                                         <span>We provide fully customized spaces to ensure personalized and convenient
                                             wheelchair transportation.</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     @if ($showReadMore)
                         <a href="{{ route('about-us') }}" class="def-btn">Read More</a>
                     @endif
                     <div class="boxes-2">
                         <div class="single-box">
                             <div class="txt mr-3">
                                 <h3>bodhiwheelers@gmail.com</h3>
                                 <span>For inquiries and more information</span>
                             </div>
                         </div>
                         <div class="devider mr-3"></div>
                         <div class="single-box">
                             <div class="txt">
                                 <h3>+65 93682784</h3>
                                 <span>WhatsApp now to book our services</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- about end -->

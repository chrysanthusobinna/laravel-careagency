@extends('mainsite.layouts.app')

@section('content')



<!-- Banner Section Two-->
<section class="banner-section">
    <div class="banner-two-carousel owl-carousel owl-theme default-navs">
        <!-- Slide Item -->
        <div class="slide-item">
            <div class="bg-image" style="background-image: url(/mainsite-assets/images/main-slider/1.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <span class="sub-title animate-1">Welcome to {{ config('app.name') }}</span>
                    <h1 class="title animate-1">Connecting Families with Trusted Carers</h1>
                    <div class="btn-box animate-2">
                        <a href="{{ route('mainsite.about') }}" class="theme-btn btn-style-one hover-light"><span class="btn-title">Learn More</span></a>
                    </div>
                    <div class="banner-text animate-3">Providing reliable, self-employed carers to support your loved ones with high-quality, compassionate care at home.</div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item">
            <div class="bg-image" style="background-image: url(/mainsite-assets/images/main-slider/2.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <span class="sub-title animate-1">Your Trusted Care Partner</span>
                    <h1 class="title animate-1">Live-in Care Tailored to Your Needs</h1>
                    <div class="btn-box animate-2">
                        <a href="{{ route('mainsite.about') }}" class="theme-btn btn-style-one hover-light"><span class="btn-title">Learn More</span></a>
                    </div>
                    <div class="banner-text animate-3">We match families with dedicated, self-employed carers, ensuring personalized care that promotes independence and well-being.</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END Banner Section Two -->




<!-- About Section -->
<section class="about-section-one">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="600ms">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2 class="text-split">Compassionate care for independent living</h2>
                        <div class="text">At {{ config('app.name') }}, we empower seniors to maintain their independence while receiving personalized support. Our holistic approach combines human connection with smart care solutions, ensuring safety and dignity in every interaction.</div>
                    </div>
                    <div class="content-box">
                        <div class="about-block-one">
                            <i class="icon flaticon-oldkare-old-man"></i>
                            <h5 class="title">Daily Living Support</h5>
                            <div class="text">Personalized assistance with meals, hygiene, and mobility</div>
                        </div>
                        <div class="about-block-one">
                            <i class="icon flaticon-oldkare-invalid"></i>
                            <h5 class="title">Companionship First</h5>
                            <div class="text">Meaningful social interaction and mental engagement</div>
                        </div>
                    </div>
                    <div class="btm-box">
                        <a href="{{ route('mainsite.about') }}" class="theme-btn btn-style-two"><span class="btn-title">Explore Services</span></a>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <figure class="image-1 overlay-anim wow fadeInUp"><img  src="/mainsite-assets/images/resource/about1-1.jpg" alt="Caregiver assisting senior with tablet"></figure>
                    <figure class="image-2 overlay-anim wow fadeInRight"><img  src="/mainsite-assets/images/resource/about1-2.jpg" alt="Senior couple enjoying outdoor activity"></figure>
                    <div class="experience bounce-y">
                        <img  src="/mainsite-assets/images/healthcare.png" alt="{{ config('app.name') }} badge" class="icon">
                        <strong>Join us</strong> Today!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->


<!-- Services Section -->
<section class="services-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">Our Services</span>
            <h2 class="text-split">Comprehensive Care Solutions<br /> Tailored to Your Needs</h2>
        </div>
        <div class="row">
            <!-- Service Block -->
            <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('mainsite.about') }}"><img  src="/mainsite-assets/images/resource/service-1.jpg" alt=""></a></figure>
                        <div class="icon-box"><i class="icon flaticon-oldkare-chat"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="{{ route('mainsite.about') }}">Live-in Care</a></h5>
                        <div class="text">Personalized 24/7 support in the comfort of your home, ensuring continuous assistance and companionship.</div>
                        <a href="{{ route('mainsite.about') }}" class="read-more">Read More <i class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Service Block -->
            <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('mainsite.about') }}"><img  src="/mainsite-assets/images/resource/service-2.jpg" alt=""></a></figure>
                        <div class="icon-box"><i class="icon flaticon-oldkare-healthcare"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="{{ route('mainsite.about') }}">Respite Care</a></h5>
                        <div class="text">Temporary relief for primary caregivers through short-term care solutions, allowing for rest and rejuvenation.</div>
                        <a href="{{ route('mainsite.about') }}" class="read-more">Read More <i class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Service Block -->
            <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('mainsite.about') }}"><img  src="/mainsite-assets/images/resource/service-3.jpg" alt=""></a></figure>
                        <div class="icon-box"><i class="icon flaticon-oldkare-gardening"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="{{ route('mainsite.about') }}">Visiting Care</a></h5>
                        <div class="text">Flexible hourly visits tailored to your schedule, assisting with daily tasks and personal care needs.</div>
                        <a href="{{ route('mainsite.about') }}" class="read-more">Read More <i class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-40 wow fadeInUp">
            <div class="col-lg-8">
                <div class="bottom-text d-sm-flex align-items-center justify-content-between">
                    <p class="mb-3 mb-sm-0">Discover the ideal care service for your needs<span class="color3 ps-2">Join us today</span></p>
                    <a href="{{ route('mainsite.family') }}" class="theme-btn btn-style-two small"><span class="btn-title">Learn More</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Section -->


<!-- Offer Section -->
<section class="offer-section">
    <div class="auto-container">
        <div class="row align-items-center">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <div class="sec-title light">
                        <span class="sub-title">Excellence in Care</span>
                        <h2 class="text-split">Seamlessly Connecting Families with Dedicated Carers</h2>
                    </div>
                    <!-- Mobile App Download Buttons -->
                    <div class="btn-box mt-4">
                        <a href="#" style="width:100%" class="mb-3 theme-btn btn-style-one btn-block"><i class="fab fa-apple"></i> &nbsp; Download for iOS</a>
                         
                        <a href="#" style="width:100%"  class="theme-btn btn-style-one btn-block"><i class="fab fa-android"></i> &nbsp; Download for Android</a>
                    </div>
                </div>
            </div>
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="image-box">
                        <figure class="image"><img  src="/mainsite-assets/images/resource/image-3.jpg" alt="{{ config('app.name') }} Mobile App"></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Offer Section -->



 
<!-- Why Choose Us -->
<section class="why-choose-us-one">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-xl-6 col-lg-7 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column" style="padding: 80px 10%;">
                        <div class="sec-title">
                            <span class="sub-title">WHY CHOOSE US</span>
                            <h2 class="text-split">Connecting Families with Trusted Carers</h2>
                            <div class="text">At {{ config('app.name') }}, we bridge the gap between families and dedicated, self-employed live-in carers, ensuring personalized and compassionate care for your loved ones.</div>
                        </div>
        
                        <a href="{{ route('mainsite.about') }}" class="theme-btn btn-style-two"><span class="btn-title">Explore Now</span></a>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="col-xl-6 col-lg-5 wow fadeInLeft" data-wow-delay="600ms">
                    <div class="row">
                        <div class="image-column col-lg-6 col-md-6 col-sm-12">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img  src="/mainsite-assets/images/resource/why-us-1.jpg" alt=""></figure>
                            </div>
                        </div>
                        <div class="info-column col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-column">
                                <div class="info">
                                    <h6 class="title">Affordable <br />Rates</h6>
                                    <div class="text">We offer competitive pricing with no hidden fees, ensuring value for your investment in quality care.</div>
                                </div>

                                <div class="info">
                                    <h6 class="title">Comprehensive <br />Support</h6>
                                    <div class="text">Our team provides ongoing assistance to both families and carers, fostering a supportive and responsive environment.</div>
                                </div>
                            </div>

                            <div class="info-box">
                                <i class="icon flaticon-oldkare-health-insurance"></i>
                                <h6 class="title">24/7 Availability</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Choose Us -->



 

<!-- Call To Action Three -->
<section class="call-to-action-three">
    <div class="bg-image" style="background-image: url(/mainsite-assets/images/background/8.jpg)"></div>
    <div class="bg-shape"></div>
    <div class="auto-container">
        <div class="row">
            <div class="title-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <div class="sec-title light">
                        <h2 class="text-split">Dedication and Quality <br />Drive Our Success</h2>
                    </div>
                </div>
            </div>

            <div class="btn-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <a href="{{ route('mainsite.family') }}" class="theme-btn btn-style-one"><span class="btn-title">{{ config('app.name') }} for Family</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Call To Action Three -->



 
<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="bg bg-pattern-5"></div>
    <div class="auto-container">
        <div class="row">
            <div class="title-column col-xl-5 col-lg-4 col-md-12">
                <div class="sec-title mb-40">
                    <span class="sub-title">WHAT OUR CLIENTS SAY</span>
                    <h2 class="text-split">Trusted by families, loved by seniors</h2>
                </div>
                <div class="info-box mb-4 mb-lg-0">
                    <i class="icon flaticon-oldkare-love"></i>
                    <div class="text">Hear directly from families and seniors who have experienced the {{ config('app.name') }} difference. Their stories inspire us every day.</div>
                </div>
            </div>
            
            <div class="testimonial-column col-xl-7 col-lg-8 col-md-12">
                <div class="carousel-outer">
                    <div class="testimonial-carousel owl-carousel owl-theme default-navs">
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img  src="/mainsite-assets/images/user-testimony.png" alt="Alex Martin"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Alex Martin</h4>
                                        <span class="designation">Son of Client</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"{{ config('app.name') }} has been a blessing for my dad. The caregivers are not only skilled but also genuinely caring. It’s such a relief knowing he’s in good hands."</div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img  src="/mainsite-assets/images/user-testimony.png" alt="Kevin Martin"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Kevin Martin</h4>
                                        <span class="designation">Husband of Client</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"The team at {{ config('app.name') }} has made such a difference in my wife’s life. They treat her with respect and kindness, and she looks forward to their visits every day."</div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img  src="/mainsite-assets/images/user-testimony.png" alt="Sarah Albert"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Sarah Albert</h4>
                                        <span class="designation">Daughter of Client</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"I can’t thank {{ config('app.name') }} enough for the support they’ve given my mom. They’ve helped her regain her independence while ensuring her safety."</div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img  src="/mainsite-assets/images/user-testimony.png" alt="Mark Hardson"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Mark Hardson</h4>
                                        <span class="designation">Family Member</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"{{ config('app.name') }} has been a game-changer for our family. Their professionalism and compassion have made all the difference in my grandmother’s care."</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->

 


<section class="container my-5">
    <div class="row align-items-center">
        <!-- Image Column -->
        <div class="col-md-6">
            <div class="p-4 text-center">
                <img src="/mainsite-assets/images/background/3.jpg" alt="{{ config('app.name') }} FAQ" class="img-fluid rounded shadow-lg">
            </div>
        </div>

        <!-- FAQ Column -->
        <div class="col-md-6">
            <div class="p-4 bg-white rounded shadow-lg">
                <h3 class="mb-3">Frequently Asked Questions</h3>
                <ul class="accordion-box wow fadeInRight">
                    <!--Block-->
                    <li class="accordion block">
                        <div class="acc-btn">What is {{ config('app.name') }} and how does it work?
                            <div class="icon fa fa-angle-right"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">{{ config('app.name') }} is a platform that connects families and individuals in need of care with self-employed carers across the UK. We make it easy to find, communicate with, and book qualified caregivers based on your unique needs.</div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="accordion block">
                        <div class="acc-btn">How does {{ config('app.name') }} select carers?
                            <div class="icon fa fa-angle-right"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">All carers on {{ config('app.name') }} go through a thorough vetting process, including background checks, qualifications verification, and experience assessments. We ensure that every carer meets the highest standards of professionalism and compassion.</div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="accordion block">
                        <div class="acc-btn">Is {{ config('app.name') }} a care agency?
                            <div class="icon fa fa-angle-right"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">No, {{ config('app.name') }} is not a traditional care agency. We are an independent platform that connects families with self-employed carers, giving you more choice, flexibility, and control over your care arrangements.</div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="accordion block">
                        <div class="acc-btn">How do I pay for care services on {{ config('app.name') }}?
                            <div class="icon fa fa-angle-right"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">Payments on {{ config('app.name') }} are secure and hassle-free. You can pay carers directly through our platform using secure payment methods, ensuring timely and transparent transactions without hidden fees.</div>
                            </div>
                        </div>
                    </li>

                    <li class="accordion block">
                        <div class="acc-btn">What support does {{ config('app.name') }} provide to users?
                            <div class="icon fa fa-angle-right"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">{{ config('app.name') }} offers full support to both carers and families. Our team provides guidance on finding the right carer, managing care arrangements, and resolving any concerns, ensuring a smooth and stress-free experience.</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

    
    
@endsection

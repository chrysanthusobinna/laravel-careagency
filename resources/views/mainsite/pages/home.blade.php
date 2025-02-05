@extends('mainsite.layouts.app')

@section('title', 'Home')

@section('content')



<!-- Banner Section Two-->
<section class="banner-section">
    <div class="banner-two-carousel owl-carousel owl-theme default-navs">
        <!-- Slide Item -->
        <div class="slide-item">
            <div class="bg-image" style="background-image: url(images/main-slider/1.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <span class="sub-title animate-1">Welcome to CarePass</span>
                    <h1 class="title animate-1">Connecting Families with Trusted Carers</h1>
                    <div class="btn-box animate-2">
                        <a href="/page-about.html" class="theme-btn btn-style-one hover-light"><span class="btn-title">Learn More</span></a>
                    </div>
                    <div class="banner-text animate-3">Providing reliable, self-employed carers to support your loved ones with high-quality, compassionate care at home.</div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item">
            <div class="bg-image" style="background-image: url(images/main-slider/2.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <span class="sub-title animate-1">Your Trusted Care Partner</span>
                    <h1 class="title animate-1">Live-in Care Tailored to Your Needs</h1>
                    <div class="btn-box animate-2">
                        <a href="/page-about.html" class="theme-btn btn-style-one hover-light"><span class="btn-title">Discover Services</span></a>
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
                        <div class="text">At Carepass, we empower seniors to maintain their independence while receiving personalized support. Our holistic approach combines human connection with smart care solutions, ensuring safety and dignity in every interaction.</div>
                    </div>
                    <div class="content-box">
                        <div class="info-box">
                            <h5 class="title">24/7 Safety Monitoring</h5>
                            <a href="/#" class="read-more">Learn More <i class="fa fa-long-arrow-alt-right"></i></a>
                        </div>
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
                        <a href="/page-about.html" class="theme-btn btn-style-two"><span class="btn-title">Explore Services</span></a>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <figure class="image-1 overlay-anim wow fadeInUp"><img src="/images/resource/about1-1.jpg" alt="Caregiver assisting senior with tablet"></figure>
                    <figure class="image-2 overlay-anim wow fadeInRight"><img src="/images/resource/about1-2.jpg" alt="Senior couple enjoying outdoor activity"></figure>
                    <div class="experience bounce-y">
                        <img src="/images/healthcare.png" alt="Carepass badge" class="icon">
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
                        <figure class="image"><a href="/page-service-details.html"><img src="/images/resource/service-1.jpg" alt=""></a></figure>
                        <div class="icon-box"><i class="icon flaticon-oldkare-chat"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="/page-service-details.html">Live-in Care</a></h5>
                        <div class="text">Personalized 24/7 support in the comfort of your home, ensuring continuous assistance and companionship.</div>
                        <a href="/page-service-details.html" class="read-more">Read More <i class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Service Block -->
            <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="/page-service-details.html"><img src="/images/resource/service-2.jpg" alt=""></a></figure>
                        <div class="icon-box"><i class="icon flaticon-oldkare-healthcare"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="/page-service-details.html">Respite Care</a></h5>
                        <div class="text">Temporary relief for primary caregivers through short-term care solutions, allowing for rest and rejuvenation.</div>
                        <a href="/page-service-details.html" class="read-more">Read More <i class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Service Block -->
            <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="/page-service-details.html"><img src="/images/resource/service-3.jpg" alt=""></a></figure>
                        <div class="icon-box"><i class="icon flaticon-oldkare-gardening"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="/page-service-details.html">Visiting Care</a></h5>
                        <div class="text">Flexible hourly visits tailored to your schedule, assisting with daily tasks and personal care needs.</div>
                        <a href="/page-service-details.html" class="read-more">Read More <i class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-40 wow fadeInUp">
            <div class="col-lg-8">
                <div class="bottom-text d-sm-flex align-items-center justify-content-between">
                    <p class="mb-3 mb-sm-0">Discover the ideal care service for your needs<span class="color3 ps-2">Join us today</span></p>
                    <a href="/page-contact.html" class="theme-btn btn-style-two small"><span class="btn-title">Learn More</span></a>
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
                        <figure class="image"><img src="/images/resource/image-3.jpg" alt="CarePass Mobile App"></figure>
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
                            <div class="text">At CarePass, we bridge the gap between families and dedicated, self-employed live-in carers, ensuring personalized and compassionate care for your loved ones.</div>
                        </div>
        
                        <a href="/page-about.html" class="theme-btn btn-style-two"><span class="btn-title">Explore Now</span></a>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="col-xl-6 col-lg-5 wow fadeInLeft" data-wow-delay="600ms">
                    <div class="row">
                        <div class="image-column col-lg-6 col-md-6 col-sm-12">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img src="/images/resource/why-us-1.jpg" alt=""></figure>
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
    <div class="bg-image" style="background-image: url(images/background/8.jpg)"></div>
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
                    <a href="/page-contact.html" class="theme-btn btn-style-one"><span class="btn-title">Let's Get Started</span></a>
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
                    <div class="text">Hear directly from families and seniors who have experienced the Carepass difference. Their stories inspire us every day.</div>
                </div>
            </div>
            
            <div class="testimonial-column col-xl-7 col-lg-8 col-md-12">
                <div class="carousel-outer">
                    <div class="testimonial-carousel owl-carousel owl-theme default-navs">
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="/images/user-testimony.png" alt="Alex Martin"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Alex Martin</h4>
                                        <span class="designation">Son of Client</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"Carepass has been a blessing for my dad. The caregivers are not only skilled but also genuinely caring. It’s such a relief knowing he’s in good hands."</div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="/images/user-testimony.png" alt="Kevin Martin"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Kevin Martin</h4>
                                        <span class="designation">Husband of Client</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"The team at Carepass has made such a difference in my wife’s life. They treat her with respect and kindness, and she looks forward to their visits every day."</div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="/images/user-testimony.png" alt="Sarah Albert"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Sarah Albert</h4>
                                        <span class="designation">Daughter of Client</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"I can’t thank Carepass enough for the support they’ve given my mom. They’ve helped her regain her independence while ensuring her safety."</div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="/images/user-testimony.png" alt="Mark Hardson"></figure>
                                    <div class="info-box">
                                        <h4 class="name">Mark Hardson</h4>
                                        <span class="designation">Family Member</span>
                                    </div>
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </div>
                                <div class="text">"Carepass has been a game-changer for our family. Their professionalism and compassion have made all the difference in my grandmother’s care."</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->

	<!-- FAQ Section -->
	<section class="faqs-section style-two">
		<div class="auto-container">
			<div class="row">
				<!-- FAQ Column -->
				<div class="faq-column col-lg-6 col-md-12 col-sm-12 order-2">
					<div class="inner-column">
						<div class="sec-title">
							<span class="sub-title">Questions & answers</span>
							<h2 class="text-split">Frequently asked questions</h2>
						</div>

                        <ul class="accordion-box wow fadeInRight">
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What is live-in care?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Live-in care allows individuals to receive professional, round-the-clock assistance in their own homes. A dedicated caregiver lives with the service user, offering personalized support while maintaining their independence and comfort.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How does CarePass match me with a carer?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">CarePass uses a detailed assessment process to understand your specific needs, preferences, and lifestyle. Based on this information, we match you with vetted, self-employed carers who align with your requirements.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Why choose live-in care over a care home?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Live-in care provides personalized, one-on-one attention in the comfort of your home, allowing you to maintain routines, stay close to loved ones, and receive a higher level of individual support compared to residential care homes.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What services do live-in carers provide?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Live-in carers assist with personal care, medication management, meal preparation, mobility support, housekeeping, companionship, and more—tailored to your individual needs.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How soon can live-in care be arranged?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">CarePass can arrange live-in care within 24 to 48 hours, depending on your needs and the availability of a suitable caregiver.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Can I change my carer if I’m not satisfied?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Yes, if you're not satisfied with your assigned caregiver, CarePass will work with you to find a more suitable match.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What makes CarePass different from other care providers?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">CarePass offers a flexible and affordable care model, connecting families with self-employed carers who provide high-quality, personalized care. Unlike traditional agencies, we focus on empowering families with more choice and control.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What is the cost of live-in care through CarePass?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">CarePass offers a cost-effective alternative to traditional care homes, typically 35% cheaper than managed care services. Pricing varies based on care needs, location, and duration of care.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Is live-in care suitable for individuals with dementia?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Yes, live-in care is an excellent choice for individuals with dementia, offering a stable and familiar environment, which can help reduce confusion and anxiety.</div>
                                    </div>
                                </div>
                            </li>
                
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How do I get started with CarePass?
                                    <div class="icon fa fa-angle-right"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">You can register and complete an eligibility request form on our website or mobile app. Once approved, you can review available caregivers and send a care booking request.</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                
					</div>
				</div>

				 <!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="form-bg" style="background-image: url(images/background/3.jpg)"></div>
                    <div class="inner-column text-center">
                        <div class="sec-title light">
                            <h2 class="title text-split">Your Questions, Answered.<br />Answered</h2>
                        </div>
                    </div>
                    
				</div>
			</div>
		</div>
	</section>
	<!--End FAQ Section -->

    
@endsection

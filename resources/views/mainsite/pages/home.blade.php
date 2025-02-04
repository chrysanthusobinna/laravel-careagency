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
						<span class="sub-title animate-1">Welcome to Oldcare Center</span>
						<h1 class="title animate-1"> We Make an Elderly <br class="d-none d-lg-block" /> Person Happy</h1>
						<div class="btn-box animate-2">
							<a href="/page-about.html" class="theme-btn btn-style-one hover-light"><span class="btn-title">Read More</span></a>
						</div>
						<div class="banner-text animate-3">Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore et simply free text dolore magna</div>
					</div>
				</div>
			</div>

			<!-- Slide Item -->
			<div class="slide-item">
				<div class="bg-image" style="background-image: url(images/main-slider/2.jpg);"></div>
				<div class="auto-container">
					<div class="content-box">
						<span class="sub-title animate-1">We’re the best insurance provider</span>
						<h1 class="title animate-1"> We Make an Elderly <br class="d-none d-lg-block" /> Person Happy</h1>
						<div class="btn-box animate-2">
							<a href="/page-about.html" class="theme-btn btn-style-one hover-light"><span class="btn-title">Read More</span></a>
						</div>
						<div class="banner-text animate-3">Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore et simply free text dolore magna</div>
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
							<span class="sub-title">ABOUT US</span>
							<h2 class="text-split">We make a difference in senior lives</h2>
							<div class="text">There are many variations of passages of available but the majority have suffered alteration in some form, by injected hum randomised words which don't slightly but the majority have suffered</div>
						</div>
						<div class="content-box">
							<div class="info-box">
								<h5 class="title">Free Medical Checkup</h5>
								<a href="/#" class="read-more">More <i class="fa fa-long-arrow-alt-right"></i></a>
							</div>
							<div class="about-block-one">
								<i class="icon flaticon-oldkare-old-man"></i>
								<h5 class="title">Expert Nursing Staff</h5>
								<div class="text">There are many variations of passages of Lorem Ipsum available.</div>
							</div>
							<div class="about-block-one">
								<i class="icon flaticon-oldkare-invalid"></i>
								<h5 class="title">Medical Social Services</h5>
								<div class="text">There are many variations of passages of Lorem Ipsum available..</div>
							</div>
						</div>
						<div class="btm-box">
							<a href="/page-about.html" class="theme-btn btn-style-two"><span class="btn-title">Discover more</span></a>
						</div>
					</div>
				</div>

				<!-- Image Column -->
				<div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft">
						<figure class="image-1 overlay-anim wow fadeInUp"><img src="/images/resource/about1-1.jpg" alt=""></figure>
						<figure class="image-2 overlay-anim wow fadeInRight"><img src="/images/resource/about1-2.jpg" alt=""></figure>
						<div class="experience bounce-y">
							<img src="/images/resource/about1-3.jpg" alt="" class="icon">
							<strong>15+</strong> Nursing Staff
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Emd About Section -->

	<!-- Services Section -->
	<section class="services-section">
		<div class="auto-container">
			<div class="sec-title text-center">
				<span class="sub-title">Services we’re offering</span>
				<h2 class="text-split">High quality products and services<br /> that we stand behind</h2>
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
							<h5 class="title"><a href="/page-service-details.html">Medical Checkup</a></h5>
							<div class="text">consetetur sadipscing elitr the sed arer diam nonumy eirmod tempor</div>
							<a href="/page-service-details.html" class="read-more">read More <i class="fa fa-long-arrow-alt-right"></i></a>
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
							<h5 class="title"><a href="/page-service-details.html">Senior Citizen</a></h5>
							<div class="text">consetetur sadipscing elitr the sed arer diam nonumy eirmod tempor</div>
							<a href="/page-service-details.html" class="read-more">read More <i class="fa fa-long-arrow-alt-right"></i></a>
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
							<h5 class="title"><a href="/page-service-details.html">Health & Medical Care</a></h5>
							<div class="text">consetetur sadipscing elitr the sed arer diam nonumy eirmod tempor</div>
							<a href="/page-service-details.html" class="read-more">read More <i class="fa fa-long-arrow-alt-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mt-40 wow fadeInUp">
				<div class="col-lg-8">
					<div class="bottom-text d-sm-flex align-items-center justify-content-between">
						<p class="mb-3 mb-sm-0">Find The Main Senior Care Service<span class="color3 ps-2">Send a request now</span></p>
						<a href="/page-contact.html" class="theme-btn btn-style-two small"><span class="btn-title">Discover More</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Services Section-->

	<!-- Offer Section -->
	<section class="offer-section">
		<div class="auto-container">
			<div class="row">
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12">
					<div class="inner-column">
						<div class="sec-title light">
							<span class="sub-title">WHO WE ARE</span>
							<h2 class="text-split">We believe we can save more lives</h2>
							<div class="text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu convenient scheduling, account fugiat pariatur</div>
						</div>
						<div class="info-box">
							<i class="icon flaticon-oldkare-birthday"></i>
							<h5 class="title">We’re doing the right thing.<br class="d-none d-sm-block" /> The right way</h5>
						</div>
						<ul class="list-style-two">
							<li><i class="fas fa-circle-right"></i> Personalized Care Service</li>
							<li><i class="fas fa-circle-right"></i> Complete Medical Suppy</li>
							<li><i class="fas fa-circle-right"></i> Daily Physical Medical Checkup</li>
						</ul>
					</div>
				</div>
				<!-- Content Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image-box">
							<figure class="image"><img src="/images/resource/image-3.jpg" alt=""></figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Offer Section -->

	<!-- Testimonial Section -->
	<section class="testimonial-section">
		<div class="bg bg-pattern-5"></div>
		<div class="auto-container">
			<div class="row">
				<div class="title-column col-xl-5 col-lg-4 col-md-12">
					<div class="sec-title mb-40">
						<span class="sub-title">TESTIMONIALS</span>
						<h2 class="text-split">What our customers have to say</h2>
					</div>
					<div class="info-box mb-4 mb-lg-0">
						<i class="icon flaticon-oldkare-love"></i>
						<div class="text">We’re trusted by more then<br /> 2350 satisfied & happy customers</div>
					</div>
				</div>
				<div class="testimonial-column col-xl-7 col-lg-8 col-md-12">
					<div class="carousel-outer">
						<div class="testimonial-carousel owl-carousel owl-theme default-navs">
							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="image-box">
										<figure class="image"><img src="/images/resource/testi-1.jpg" alt=""></figure>
										<div class="info-box">
											<h4 class="name">Alex Martin</h4>
											<span class="designation">Founder</span>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									</div>
									<div class="text">Fames dapibus vulputate porttitor luctus habitasse mattis viverra penatibus ornare, mauris cubilia aenean tempor lacus varius sodales at quam maecenas sapien</div>
								</div>
							</div>

							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="image-box">
										<figure class="image"><img src="/images/resource/testi-2.jpg" alt=""></figure>
										<div class="info-box">
											<h4 class="name">Kevin Martin</h4>
											<span class="designation">CO Founder</span>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									</div>
									<div class="text">Fames dapibus vulputate porttitor luctus habitasse mattis viverra penatibus ornare, mauris cubilia aenean tempor lacus varius sodales at quam maecenas sapien</div>
								</div>
							</div>

							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="image-box">
										<figure class="image"><img src="/images/resource/testi-3.jpg" alt=""></figure>
										<div class="info-box">
											<h4 class="name">Sarah Albert</h4>
											<span class="designation">Worker</span>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									</div>
									<div class="text">Fames dapibus vulputate porttitor luctus habitasse mattis viverra penatibus ornare, mauris cubilia aenean tempor lacus varius sodales at quam maecenas sapien</div>
								</div>
							</div>

							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="image-box">
										<figure class="image"><img src="/images/resource/testi-1.jpg" alt=""></figure>
										<div class="info-box">
											<h4 class="name">Mark hardson</h4>
											<span class="designation">Manager</span>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									</div>
									<div class="text">Fames dapibus vulputate porttitor luctus habitasse mattis viverra penatibus ornare, mauris cubilia aenean tempor lacus varius sodales at quam maecenas sapien</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->

	<!-- Projects section-->
	<section class="projects-section">
		<div class="auto-container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-xl-5">
					<div class="sec-title">
						<span class="sub-title">OUR SOLUTIONS</span>
						<h2 class="text-split">Our beautiful portfolio cases gallery</h2>
					</div>
				</div>
				<div class="col-lg-6 col-xl-6 offset-xl-1">
					<div class="sec-title">
						<div class="text">There are many variations of passages of available but the majority have suffered alteration in some form, by injected hum randomised words which don't slightly but the majority have suffered</div>
					</div>
				</div>
			</div>

			<div class="carousel-outer">
				<div class="projects-carousel owl-carousel owl-theme">
					<!-- Project Block-->
					<div class="project-block">
						<div class="inner-box">
							<div class="image-box">
								<div class="image"> <img src="/images/resource/project-1.jpg" class="img-fullwidth" alt=""></div>
							</div>
							<div class="content-box"> <a href="/page-project-details.html" class="theme-btn read-more"><i class="lnr-icon-arrow-right1"></i></a>
								<h4 class="title"><a href="/page-project-details.html">Senior Citizen Care</a></h4>
								<ul class="cat-list">
									<li>Elderly Nutrition</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Project Block-->
					<div class="project-block">
						<div class="inner-box">
							<div class="image-box">
								<div class="image"> <img src="/images/resource/project-2.jpg" class="img-fullwidth" alt=""></div>
							</div>
							<div class="content-box"> <a href="/page-project-details.html" class="theme-btn read-more"><i class="lnr-icon-arrow-right1"></i></a>
								<h4 class="title"><a href="/page-project-details.html">Residential Care</a></h4>
								<ul class="cat-list">
									<li>Senior Citizen</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Project Block-->
					<div class="project-block">
						<div class="inner-box">
							<div class="image-box">
								<div class="image"> <img src="/images/resource/project-3.jpg" class="img-fullwidth" alt=""></div>
							</div>
							<div class="content-box"> <a href="/page-project-details.html" class="theme-btn read-more"><i class="lnr-icon-arrow-right1"></i></a>
								<h4 class="title"><a href="/page-project-details.html">Medical Checkup</a></h4>
								<ul class="cat-list">
									<li>Provide Home</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Project Block-->
					<div class="project-block">
						<div class="inner-box">
							<div class="image-box">
								<div class="image"> <img src="/images/resource/project-4.jpg" class="img-fullwidth" alt=""></div>
							</div>
							<div class="content-box"> <a href="/page-project-details.html" class="theme-btn read-more"><i class="lnr-icon-arrow-right1"></i></a>
								<h4 class="title"><a href="/page-project-details.html">Personalized Care</a></h4>
								<ul class="cat-list">
									<li>Quality Food</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Projects Section -->

	<!-- Why Choose US One -->
	<section class="why-choose-us-one">
		<div class="auto-container">
			<div class="outer-box">
				<div class="row">
					<div class="content-column col-xl-6 col-lg-7 wow fadeInRight" data-wow-delay="600ms">
						<div class="inner-column">
							<div class="sec-title">
								<span class="sub-title">WHY CHOOSE US</span>
								<h2 class="text-split">A place where you <br class="d-none d-lg-block" />would love to live <br class="d-none d-lg-block" />again through</h2>
								<div class="text">Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore et simply free text dolore magna aliqua lonm andhn</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="feature-box">
										<i class="icon flaticon-oldkare-elderly"></i>
										<h6 class="title">Safety & <br />Security</h6>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="feature-box">
										<i class="icon flaticon-oldkare-birthday"></i>
										<h6 class="title">Medication <br /> Management</h6>
									</div>
								</div>
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
										<h6 class="title">Resort <br />Style Living</h6>
										<div class="text">The wise man therefore always holds in these matters this.</div>
									</div>

									<div class="info">
										<h6 class="title">Safety <br />& Security Guaranty</h6>
										<div class="text">The wise man therefore always holds in these matters this.</div>
									</div>
								</div>

								<div class="info-box">
									<i class="icon flaticon-oldkare-health-insurance"></i>
									<h6 class="title">24/7 Nursing</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Emd Why Choose US Two -->

	<!-- Fun Fact Section -->
	<section class="fun-fact-section">
		<div class="bg bg-image" style="background-image: url(images/background/1.jpg)"></div>
		<div class="auto-container">
			<div class="row align-items-start justify-content-between">
				<div class="col-lg-8">
					<div class="sec-title light">
						<h2 class="title text-split">Hundreds of customers <br />trust oiur company</h2>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="btn-box text-lg-end">
						<a href="/page-about.html" class="theme-btn btn-style-two"><span class="btn-title">Getting Start</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Fun Fact Section -->

 

	<!-- Call To Action Three -->
	<section class="call-to-action-three">
		<div class="bg-image" style="background-image: url(images/background/8.jpg)"></div>
		<div class="bg-shape"></div>
		<div class="auto-container">
			<div class="row">
				<div class="title-column col-lg-6 col-md-12">
					<div class="inner-column">
						<div class="sec-title light">
							<h2 class="text-split">Passion can Make a <br />Top-Performing Company</h2>
						</div>
					</div>
				</div>

				<div class="btn-column col-lg-6 col-md-12">
					<div class="inner-column">
						<a href="/page-contact.html" class="theme-btn btn-style-one"><span class="btn-title">Lets Get Started</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End Call To Action Three -->

	<!-- News Section -->
	<section class="news-section section-space">
		<div class="auto-container">
			<div class="sec-title text-center">
				<span class="sub-title">News & Articles</span>
				<h2 class="text-split">Latest news & articles from <br/> the blog.</h2>
			</div>

			<div class="row">
				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image"><a href="/news-details.html"><img src="/images/resource/news1-1.jpg" alt=""></a></figure>
						</div>
						<div class="content-box">
							<span class="date">July 7, 2024</span>
							<span class="post-info"><i class="fa fa-user-circle"></i> by Admin</span>
							<h4 class="title"><a href="/news-details.html">Creating a Safe Home Environment for Seniors</a></h4>
							<div class="text">Creating a Safe Home Environment for Seniors This service is</div>
							<a href="/news-details.html" class="read-more"><i class="fa fa-long-arrow-alt-right"></i> Read More</a>
						</div>
					</div>
				</div>

				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image"><a href="/news-details.html"><img src="/images/resource/news1-2.jpg" alt=""></a></figure>
						</div>
						<div class="content-box">
							<span class="date">July 7, 2024</span>
							<span class="post-info"><i class="fa fa-user-circle"></i> by Admin</span>
							<h4 class="title"><a href="/news-details.html">Tips for Managing Medications for Seniors</a></h4>
							<div class="text">Creating a Safe Home Environment for Seniors This service is</div>
							<a href="/news-details.html" class="read-more"><i class="fa fa-long-arrow-alt-right"></i> Read More</a>
						</div>
					</div>
				</div>

				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image"><a href="/news-details.html"><img src="/images/resource/news1-3.jpg" alt=""></a></figure>
						</div>
						<div class="content-box">
							<span class="date">July 7, 2024</span>
							<span class="post-info"><i class="fa fa-user-circle"></i> by Admin</span>
							<h4 class="title"><a href="/news-details.html">The Importance of Companionship in Care</a></h4>
							<div class="text">Creating a Safe Home Environment for Seniors This service is</div>
							<a href="/news-details.html" class="read-more"><i class="fa fa-long-arrow-alt-right"></i> Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End News Section -->

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
								<div class="acc-btn">How can I manage my breathlessness?
									<div class="icon fa fa-angle-right"></div>
								</div>
								<div class="acc-content">
									<div class="content">
										<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable</div>
									</div>
								</div>
							</li>
							<!--Block-->
							<li class="accordion block active-block">
								<div class="acc-btn active">Safety & Security Guaranty
									<div class="icon fa fa-angle-right"></div>
								</div>
								<div class="acc-content current">
									<div class="content">
										<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable</div>
									</div>
								</div>
							</li>
							<!--Block-->
							<li class="accordion block">
								<div class="acc-btn">I am worried about a loved one
									<div class="icon fa fa-angle-right"></div>
								</div>
								<div class="acc-content">
									<div class="content">
										<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable</div>
									</div>
								</div>
							</li>
							<!--Block-->
							<li class="accordion block">
								<div class="acc-btn">How can i find my solutions?
									<div class="icon fa fa-angle-right"></div>
								</div>
								<div class="acc-content">
									<div class="content">
										<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				 <!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="form-bg" style="background-image: url(images/background/3.jpg)"></div>
					<div class="inner-column">
						<!-- Contact Form -->
						<div class="contact-form wow fadeInLeft">
							<span class="sub-title">SUBMIT INQUIRY</span>
							<h2>Contact us</h2>
							<!--Contact Form-->
							<form method="post" action="https://html.kodesolution.com/2024/carer-html/get" id="contact-form">
								<div class="row">
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="text" name="full_name" placeholder="Your Name" required>
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="text" name="Email" placeholder="Email Address" required>
									</div>
									<div class="form-group col-lg-12">
										<input type="text" name="Phone" placeholder="Your Phone" required>
									</div>
									<div class="form-group col-lg-12">
										<textarea name="message" placeholder="Write a Message" required></textarea>
									</div>
									<div class="form-group col-lg-12">
										<button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="btn-title">Send a message</span></button>
									</div>
								</div>
							</form>
						</div>
						<!--End Contact Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End FAQ Section -->

    
@endsection

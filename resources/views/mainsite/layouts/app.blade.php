<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<!-- Stylesheets -->
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->

<link href="/css/style.css" rel="stylesheet">
<link href="/css/responsive.css" rel="stylesheet">

<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="/js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/js/respond.js"></script><![endif]-->
</head>

<body>


<div class="page-wrapper">

	<!-- Preloader -->
	<div class="preloader"></div>

	<!-- Main Header-->
	<header class="main-header @yield('header-class', 'header-style-one')">

		<div class="header-lower">
			<div class="container-fluid">
				<!-- Main box -->
				<div class="main-box">
					<div class="logo-box">
						<div class="logo"><a href="/index-2.html"><img src="/images/logo.png" alt="" title="Insumo"></a></div>
					</div>

					<!--Nav Box-->
					<div class="nav-outer">
						<nav class="nav main-menu">
                            <ul class="navigation">
                                <li class="{{ request()->routeIs('mainsite.home') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.home') }}">Home</a>
                                </li>
                                <li class="{{ request()->routeIs('mainsite.contact') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.contact') }}">Contact</a>
                                </li>
                                <li class="{{ request()->routeIs('mainsite.about') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.about') }}">About</a>
                                </li>
                                <li class="{{ request()->routeIs('mainsite.findcarer') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.findcarer') }}">Find a Carer</a>
                                </li>
                                <li class="{{ request()->routeIs('mainsite.helpandadvice') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.helpandadvice') }}">Help & Advice</a>
                                </li>
             
                 
                            </ul>
                            
						</nav>

						<!-- Main Menu End-->
					</div>

					<div class="outer-box">
						<div class="ui-btn-outer">
 
						</div>

						<a href="/tel:+92(8800)9806" class="info-btn">
							<i class="icon fa fa-phone"></i>
							<small>Call Anytime</small>+ 88 ( 9800 ) 6802-00
						</a>

						<!-- Mobile Nav toggler -->
						<div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile Menu  -->
		<div class="mobile-menu">
			<div class="menu-backdrop"></div>

			<!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
			<nav class="menu-box">
				<div class="upper-box">
					<div class="nav-logo"><a href="/index-2.html"><img src="/images/logo.png" alt="" title=""></a></div>
					<div class="close-btn"><i class="icon fa fa-times"></i></div>
				</div>

				<ul class="navigation clearfix">
					<!--Keep This Empty / Menu will come through Javascript-->
				</ul>
				<ul class="contact-list-one">
					<li>
						<!-- Contact Info Box -->
						<div class="contact-info-box">
							<i class="icon lnr-icon-phone-handset"></i>
							<span class="title">Call Now</span>
							<a href="/tel:+92880098670">+92 (8800) - 98670</a>
						</div>
					</li>
					<li>
						<!-- Contact Info Box -->
						<div class="contact-info-box">
							<span class="icon lnr-icon-envelope1"></span>
							<span class="title">Send Email</span>
							<a href="/https://html.kodesolution.com/cdn-cgi/l/email-protection#761e131a063615191b0617180f5815191b"><span class="__cf_email__" data-cfemail="6e060b021e2e0d01031e0f0017400d0103">[email&#160;protected]</span></a>
						</div>
					</li>
					<li>
						<!-- Contact Info Box -->
						<div class="contact-info-box">
							<span class="icon lnr-icon-clock"></span>
							<span class="title">Send Email</span>
							Mon - Sat 8:00 - 6:30, Sunday - CLOSED
						</div>
					</li>
				</ul>


				<ul class="social-links">
					<li><a href="/#"><i class="fa fa-x"></i></a></li>
					<li><a href="/#"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="/#"><i class="fab fa-pinterest"></i></a></li>
					<li><a href="/#"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</nav>
		</div><!-- End Mobile Menu -->

		<!-- Header Search -->
		<div class="search-popup">
			<span class="search-back-drop"></span>
			<button class="close-search"><span class="fa fa-times"></span></button>

			<div class="search-inner">
				<form method="post" action="https://html.kodesolution.com/2024/carer-html/blog-showcase.html">
					<div class="form-group">
						<input type="search" name="search-field" value="" placeholder="Search..." required="">
						<button type="submit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
		</div>
		<!-- End Header Search -->

		<!-- Sticky Header  -->
		<div class="sticky-header">
			<div class="auto-container">
				<div class="inner-container">
					<!--Logo-->
					<div class="logo">
						<a href="/index-2.html" title=""><img src="/images/logo-2.png" alt="" title=""></a>
					</div>

					<!--Right Col-->
					<div class="nav-outer">
						<!-- Main Menu -->
						<nav class="main-menu">
							<div class="navbar-collapse show collapse clearfix">
								<ul class="navigation clearfix">
									<!--Keep This Empty / Menu will come through Javascript-->
								</ul>
							</div>
						</nav><!-- Main Menu End-->

						<!--Mobile Navigation Toggler-->
						<div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
					</div>
				</div>
			</div>
		</div><!-- End Sticky Menu -->
	</header>
	<!--End Main Header -->


    @yield('content')

    	<!-- Main Footer -->
        <footer class="main-footer">
            <div class="bg bg-image" style="background-image: url(images/background/bg-1.png)"></div>
            <!-- Upper Box -->
            <div class="auto-container">
                <div class="upper-box">
                    <div class="row">
                        <!-- Logo -->
                        <div class="contact-info logo-box col-lg-4 wow fadeInUp text-center">
                            <div class="logo">
                                <a href="{{ route('mainsite.home') }}"><img src="images/logo.png" alt="Company Logo"></a>
                            </div>
                        </div>
                        <!-- Email Info -->
                        <div class="contact-info col-lg-4 wow fadeInRight">
                            <div class="inner-box">
                                <h4 class="title">Send Email</h4>
                                <div class="text">
                                    <a href="mailto:info@carepass.com">info@carepass.com</a>
                                </div>
                            </div>
                        </div>
                        <!-- Phone Info -->
                        <div class="contact-info col-lg-4 wow fadeInLeft" data-wow-delay="600ms">
                            <div class="inner-box">
                                <h4 class="title">Call Now</h4>
                                <div class="text">
                                    <a href="tel:+924680668800">+92 (4680) 66-8800</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Widgets Section -->
            <div class="widgets-section">
                <div class="auto-container">
                    <div class="row">
                        <!-- About Column -->
                        <div class="footer-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="footer-widget about-widget">
                                        <h6 class="widget-title">About</h6>
                                        <div class="text">
                                            Carepass connects individuals in need of care with verified, self-employed carers who meet their unique requirements. We ensure all carers undergo thorough background checks before joining our platform.
                                        </div>
                                    </div>
                                </div>
                                <!-- Explore Links -->
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <div class="footer-widget">
                                        <h6 class="widget-title">Explore</h6>
                                        <ul class="user-links">
                                            <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                                            <li><a href="{{ route('mainsite.about') }}">About Us</a></li>
                                            <li><a href="{{ route('mainsite.contact') }}">Contact</a></li>
                                            <li><a href="{{ route('mainsite.career') }}">Careers</a></li>
                                            <li><a href="{{ route('mainsite.findcarer') }}">Find a Carer</a></li>
  /li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Quick Links Column -->
                        <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget">
                                <h6 class="widget-title">Quick Links</h6>
                                <ul class="user-links">
    
                                    <li><a href="{{ route('mainsite.helpandadvice') }}">Help & Advice</a></li>
                                    <li><a href="{{ route('mainsite.terms.carer') }}">Carer Terms</a></li>
                                    <li><a href="{{ route('mainsite.terms.serviceuser') }}">Service User Terms</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        
        
                        <!-- Contact Column -->
                        <div class="footer-column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contacts-widget">
                                <h6 class="widget-title">Contact</h6>
                                <div class="text">60 Road, Broklyn Golden Street, New York, USA</div>
                                <ul class="social-icon-two">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-x"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
        

                    </div>
                </div>
            </div>
        
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-container text-center">
                        <div class="copyright-text">
                            <p>&copy; {{ date('Y') }} <a href="{{ route('mainsite.home') }}">Carepass</a>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
	<!--End Main Footer -->

    </div><!-- End Page Wrapper -->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    
    <script data-cfasync="false" src="/../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    
    <script src="/js/jquery.js"></script> 
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.fancybox.js"></script>
    <script src="/js/wow.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/appear.js"></script>
    <script src="/js/knob.js"></script>
    <script src="/js/gsap.min.js"></script>
    <script src="/js/ScrollTrigger.min.js"></script>
    <script src="/js/SplitText.min.js"></script>
    <script src="/js/splitType.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/owl.js"></script>
    <script src="/js/script.js"></script>
     
     </body>
    
     </html>
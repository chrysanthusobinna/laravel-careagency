<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <!-- Dynamic Page Title -->
        <title>@yield('title', config('app.name') . ' - Connecting People with Compassionate Carers')</title>
    
        <!-- Meta Description (Crucial for SEO) -->
        <meta name="description" content="{{ config('app.name') }} connects families and individuals seeking care with compassionate self-employed carers.">
        
        <!-- SEO Keywords -->
        <meta name="keywords" content="{{ config('app.name') }}, home care, elderly care, caregivers, service users, independent carers, respite care, live-in care, professional caregivers, personalized care, UK carers">
        
        <!-- Author -->
        <meta name="author" content="{{ config('app.name') }} Team">
        
        <!-- Robots Meta (Index & Follow Pages for SEO) -->
        <meta name="robots" content="index, follow">
    
        <!-- Open Graph (OG) Tags for Social Media Sharing -->

        <meta property="og:title" content="@yield('title', config('app.name') . ' - Find the right support.')">
        <meta property="og:description" content="{{ config('app.name') }} helps families find independent caregivers for home care. Get personalized, reliable care from qualified carers.">
        <meta property="og:image" content="{{ asset('/mainsite-assets/images/social-preview.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        
        <!-- Twitter Card (Enhance Twitter Shares) -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', config('app.name') . ' - Find the right support.')">
        <meta name="twitter:description" content="{{ config('app.name') }} connects families and individuals seeking care with trusted independent caregivers.">
        <meta name="twitter:image" content="{{ asset('/mainsite-assets/images/social-preview.jpg') }}">
    
        <!-- Mobile Responsive Meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- Stylesheets -->
        <link href="/mainsite-assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/mainsite-assets/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css">
        <link href="/mainsite-assets/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css">
        <link href="/mainsite-assets/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css">
        <link href="/mainsite-assets/css/style.css" rel="stylesheet">
        <link href="/mainsite-assets/css/responsive.css" rel="stylesheet">
    
        <!-- Favicon -->
        <link rel="shortcut icon" href="/mainsite-assets/images/favicon.png" type="image/x-icon">
        <link rel="icon" href="/mainsite-assets/images/favicon.png" type="image/x-icon">

        @stack('styles')

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
						<div class="logo"><a href="{{ route('mainsite.home') }}"><img src="/mainsite-assets/images/logo.png" alt="" title="Insumo"></a></div>
					</div>

					<!--Nav Box-->
					<div class="nav-outer">
						<nav class="nav main-menu">
                            <ul class="navigation">
                                <li class="{{ request()->routeIs('mainsite.home') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.home') }}">Home</a>
                                </li>

                                <li class="{{ request()->routeIs('mainsite.family') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.family') }}">Family</a>
                                </li>

                                <li class="{{ request()->routeIs('mainsite.carers') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.carers') }}">Carers</a>
                                </li>

                                <li class="{{ request()->routeIs('mainsite.about') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.about') }}">About</a>
                                </li>

                                <li class="{{ request()->routeIs('mainsite.contact') ? 'current' : '' }}">
                                    <a href="{{ route('mainsite.contact') }}">Contact</a>
                                </li>

                                @if (Auth::guest())
                                    <li class="{{ request()->routeIs('mainsite.register') ? 'current' : '' }}">
                                        <a href="{{ route('mainsite.register') }}">Register</a>
                                    </li>
                                @endif


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
                        @if (Auth::guest())
                            <button class="btn btn-danger" onclick="window.location.href='{{ route('mainsite.login') }}'">
                                <i class="fa fa-user-alt"></i> LOGIN
                            </button>
                        @else
                            <button class="btn btn-danger" onclick="window.location.href='{{ $loggedInUser->dashboard_route }}'">
                                <i class="fa fa-user-alt"></i> DASHBOARD
                            </button>
                        @endif


                        

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
 					<div class="close-btn"><i class="icon fa fa-times"></i></div>
				</div>

				<ul class="navigation clearfix">
					<!--Keep This Empty / Menu will come through Javascript-->
				</ul>
 
			</nav>
		</div><!-- End Mobile Menu -->

 
		<!-- Sticky Header  -->
		<div class="sticky-header">
			<div class="auto-container">
				<div class="inner-container">
					<!--Logo-->
					<div class="logo">
						<a href="{{ route('mainsite.home') }}" title=""><img src="/mainsite-assets/images/logo-2.png" alt="" title=""></a>
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
                                <a href="{{ route('mainsite.home') }}"><img src="/mainsite-assets/images/logo.png" alt="Company Logo"></a>
                            </div>
                        </div>
                        <!-- Email Info -->
                        <div class="contact-info col-lg-4 wow fadeInRight">
                            <div class="inner-box">
                                <h4 class="title">Email</h4>
                                <div class="text">
                                    <a href="mailto:{{ $companyContact['email_1'] ?? "" }}">{{ $companyContact['email_1'] ?? "" }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- Phone Info -->
                        <div class="contact-info col-lg-4 wow fadeInLeft" data-wow-delay="600ms">
                            <div class="inner-box">
                                <h4 class="title">Call</h4>
                                <div class="text">
                                    <a href="tel:{{ $companyContact['phone_1'] ?? "NULL" }}">{{ formatPhoneNumber($companyContact['phone_1']) ?? "NULL" }}</a>
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
                                            {{ config('app.name') }} connects individuals in need of care with verified, self-employed carers who meet their unique requirements. We ensure all carers undergo thorough background checks before joining our platform.
                                        </div>
                                    </div>
                                </div>
                                <!-- Explore Links -->
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <div class="footer-widget">
                                        <h6 class="widget-title">Explore</h6>
                                        <ul class="user-links">
                                            <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                                            <li><a href="{{ route('mainsite.family') }}">Family</a></li>
                                            <li><a href="{{ route('mainsite.carers') }}">Carers</a></li>
                                            <li><a href="{{ route('mainsite.about') }}">About Us</a></li>
                                            <li><a href="{{ route('mainsite.contact') }}">Contact</a></li>

                                            @if (Auth::guest())
                                                <li><a href="{{ route('mainsite.register') }}">Register</a></li>
                                            @endif
                                                                                   
                                            

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
                                    @if (Auth::guest())
                                        <li><a href="{{ route('mainsite.login') }}">Login</a></li>
                                    @else
                                        <li><a href="{{ $loggedInUser->dashboard_route }}">Dashboard</a></li>
                                    @endif
                                    <li><a href="{{ route('mainsite.helpandadvice') }}">Help & Advice</a></li>
                                    <li><a href="{{ route('mainsite.terms.carer') }}">Carer Terms</a></li>
                                    <li><a href="{{ route('mainsite.terms.serviceuser') }}">Service User Terms</a></li>
                                    <li><a href="{{ route('mainsite.privacy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        
        
                        <!-- Contact Column -->
                        <div class="footer-column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contacts-widget">
                                <h6 class="widget-title">Address</h6>
                                <div class="text">{{ $companyContact['address_1'] ?? "NULL" }}</div>
                                <ul class="social-icon-two">
                                 
                                        @if($companyContact['facebook'])
                                            <li><a href="{{ $companyContact['facebook'] }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                        @endif
                                        @if($companyContact['instagram'])
                                            <li><a href="{{ $companyContact['instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                        @if($companyContact['linkedin'])
                                            <li><a href="{{ $companyContact['linkedin'] }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                        @endif
                                        @if($companyContact['youtube'])
                                            <li><a href="{{ $companyContact['youtube'] }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        @endif
                                   
                                    
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
                            <p>&copy; {{ date('Y') }} <a href="{{ route('mainsite.home') }}">{{ config('app.name') }}</a>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
	<!--End Main Footer -->

    </div><!-- End Page Wrapper -->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
        
    <script src="/mainsite-assets/js/jquery.js"></script> 
    <script src="/mainsite-assets/js/popper.min.js"></script>
    <script src="/mainsite-assets/js/bootstrap.min.js"></script>
    <script src="/mainsite-assets/js/jquery.fancybox.js"></script>
    <script src="/mainsite-assets/js/wow.js"></script>
    <script src="/mainsite-assets/js/jquery-ui.js"></script>
    <script src="/mainsite-assets/js/appear.js"></script>
    <script src="/mainsite-assets/js/knob.js"></script>
    <script src="/mainsite-assets/js/gsap.min.js"></script>
    <script src="/mainsite-assets/js/ScrollTrigger.min.js"></script>
    <script src="/mainsite-assets/js/SplitText.min.js"></script>
    <script src="/mainsite-assets/js/splitType.js"></script>
    <script src="/mainsite-assets/js/select2.min.js"></script>
    <script src="/mainsite-assets/js/owl.js"></script>
    <script src="/mainsite-assets/js/script.js"></script>
    
    @stack('scripts')

     </body>
    
     </html>
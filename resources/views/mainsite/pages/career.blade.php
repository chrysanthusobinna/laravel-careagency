@extends('mainsite.layouts.app')

@section('title', 'Career')

@section('header-class', 'header-style-one')

@section('content')
	<!-- Start main-content -->
	<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">Career</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ route('mainsite.home') }}">Home</a></li>
					<li>Career</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->

    <!--Contact Details Start-->
    <section class="contact-details">
        <div class="container pb-70">
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">Send us email</span>
                        <h2>Feel free to write</h2>
                    </div>
                    <!-- Contact Form -->
                    <form id="contact_form" name="contact_form" class="" action="https://html.kodesolution.com/2024/carer-html/includes/sendmail.php" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_name" class="form-control" type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="mb-5">
                            <input name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Send message</span></button>
                            <button type="reset" class="theme-btn btn-style-one ml-25"><span class="btn-title">Reset</span></button>
                        </div>
                    </form>
                    <!-- Contact Form Validation-->
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">Need any help?</span>
                            <h2>Get in touch with us</h2>
                            <div class="text">Lorem ipsum is simply free text available dolor sit amet consectetur notted adipisicing elit sed do eiusmod tempor incididunt simply dolore magna.</div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-phone-plus"></span>
                                </div>
                                <div class="text">
                                    <h6 class="mb-1">Have any question?</h6>
                                    <a href="tel:980089850"><span>Free</span> +92 (020)-9850</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-envelope1"></span>
                                </div>
                                <div class="text">
                                    <h6 class="mb-1">Write email</h6>
                                    <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#66080303020e030a162605090b1607081f4805090b"><span class="__cf_email__" data-cfemail="5a343f3f3e323f362a1a3935372a3b342374393537">[email&#160;protected]</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-location"></span>
                                </div>
                                <div class="text">
                                    <h6 class="mb-1">Visit anytime</h6>
                                    <span>66 broklyn golden street. New York</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Details End-->

    <!-- Map Section-->
    <section class="map-section py-0">
        <iframe  class="map w-100"  src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </section>
    <!--End Map Section-->
@endsection

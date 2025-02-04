@extends('mainsite.layouts.app')

@section('title', 'Contact')

@section('header-class', 'header-style-one')

@section('content')
 <!-- Start main-content -->
<section class="page-title" style="background-image: url(images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Contact Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!--Contact Details Start-->
<section class="contact-details">
    <div class="container pb-70">
        <div class="row">
            <!-- Contact Form Column -->
            <div class="col-xl-7 col-lg-6">
                <div class="sec-title">
                    <span class="sub-title">Get in Touch</span>
                    <h2>We'd Love to Hear From You</h2>
                </div>
                <!-- Contact Form -->
                <form id="contact_form" name="contact_form" action="https://html.kodesolution.com/2024/carer-html/includes/sendmail.php" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="form_name" class="form-control" type="text" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="form_email" class="form-control required email" type="email" placeholder="Your Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="form_subject" class="form-control required" type="text" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="form_phone" class="form-control" type="text" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea name="form_message" class="form-control required" rows="7" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="mb-5">
                        <input name="form_botcheck" class="form-control" type="hidden" value="" />
                        <button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Send Message</span></button>
                        <button type="reset" class="theme-btn btn-style-one ml-25"><span class="btn-title">Reset</span></button>
                    </div>
                </form>
                <!-- End Contact Form -->
            </div>
            <!-- Contact Information Column -->
            <div class="col-xl-5 col-lg-6">
                <div class="contact-details__right">
                    <div class="sec-title">
                        <span class="sub-title">Need Assistance?</span>
                        <h2>Contact Information</h2>
                        <div class="text">If you have any questions or need assistance, please reach out to us through any of the following methods:</div>
                    </div>
                    <ul class="list-unstyled contact-details__info">
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-phone-plus"></span>
                            </div>
                            <div class="text">
                                <h6 class="mb-1">Call Us</h6>
                                <a href="tel:1234567890">+1 (123) 456-7890</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-envelope1"></span>
                            </div>
                            <div class="text">
                                <h6 class="mb-1">Email Us</h6>
                                <a href="mailto:info@carepass.com">info@carepass.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-location"></span>
                            </div>
                            <div class="text">
                                <h6 class="mb-1">Visit Us</h6>
                                <span>123 Carepass Lane, Suite 100, Cityville, ST 12345</span>
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
    <iframe class="map w-100" src="https://maps.google.com/maps?q=123%20Carepass%20Lane,%20Cityville,%20ST%2012345&output=embed"></iframe>
</section>
<!--End Map Section-->

@endsection

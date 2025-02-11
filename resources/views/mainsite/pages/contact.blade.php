@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Contact')

@section('header-class', 'header-style-one')

@section('content')
 <!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Contact Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Contact Details Start -->
<section class="contact-details">
    <div class="container pb-70">
        <div class="row">
            <!-- Contact Form Column -->
            <div class="col-xl-7 col-lg-6">
                <iframe class="map w-100 h-100"  src="https://maps.google.com/maps?q={{ urlencode($companyContact['address_1'] ?? 'NULL') }}&output=embed"> </iframe>
            </div>
            <!-- Contact Information Column -->
            <div class="col-xl-5 col-lg-6">
                <div class="contact-details__right">
                    <div class="sec-title">
                        <h2>Contact {{ config('app.name') }}</h2>
                        <div class="text">
                            If you have any questions or need assistance, please reach out to our team at {{ config('app.name') }} through any of the following methods:
                        </div>
                    </div>
                    <ul class="list-unstyled contact-details__info">
                        <!-- Phone Numbers -->
                        <li class="d-flex align-items-center mb-3">
                            <div class="icon me-3">
                                <span class="lnr-icon-phone-plus"></span>
                            </div>
                            <div class="text">
                                <h6 class="mb-1">Phone Numbers</h6>
                                <p class="mb-0">
                                    <a href="tel:{{ $companyContact['phone_1'] }}">{{ $companyContact['phone_1'] }}</a><br>
                                    @if($companyContact['phone_2']) <a href="tel:{{ $companyContact['phone_2'] }}">{{ $companyContact['phone_2'] }}</a><br> @endif
                                    @if($companyContact['phone_3']) <a href="tel:{{ $companyContact['phone_3'] }}">{{ $companyContact['phone_3'] }}</a><br> @endif
                                    @if($companyContact['phone_4']) <a href="tel:{{ $companyContact['phone_4'] }}">{{ $companyContact['phone_4'] }}</a><br> @endif
                                </p>
                            </div>
                        </li>

                        <!-- Emails -->
                        <li class="d-flex align-items-center mb-3">
                            <div class="icon me-3">
                                <span class="lnr-icon-envelope1"></span>
                            </div>
                            <div class="text">
                                <h6 class="mb-1">Email Addresses</h6>
                                <p class="mb-0">
                                    <a href="mailto:{{ $companyContact['email_1'] }}">{{ $companyContact['email_1'] }}</a><br>
                                    @if($companyContact['email_2']) <a href="mailto:{{ $companyContact['email_2'] }}">{{ $companyContact['email_2'] }}</a><br> @endif
                                    @if($companyContact['email_3']) <a href="mailto:{{ $companyContact['email_3'] }}">{{ $companyContact['email_3'] }}</a><br> @endif
                                    @if($companyContact['email_4']) <a href="mailto:{{ $companyContact['email_4'] }}">{{ $companyContact['email_4'] }}</a><br> @endif
                                </p>
                            </div>
                        </li>

                        <!-- Addresses -->
                        <li class="d-flex align-items-center">
                            <div class="icon me-3">
                                <span class="lnr-icon-location"></span>
                            </div>
                            <div class="text">
                                <h6 class="mb-1">Our Locations</h6>
                                <p class="mb-0">
                                    {{ $companyContact['address_1'] ?? '' }}<br>
                                    {{ $companyContact['address_2'] ?? '' }}<br>
                                    {{ $companyContact['address_3'] ?? '' }}<br>
                                    {{ $companyContact['address_4'] ?? '' }}<br>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Details End -->


@endsection

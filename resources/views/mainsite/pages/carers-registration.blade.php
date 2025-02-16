@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Carers Registration')

@section('header-class', 'header-style-one')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Carers Registration</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Carers Registration</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Carers Registration Section -->
<section class="team-section pt-0">
    <div class="auto-container">
        <div class="row">
            <!-- Welcome Note -->
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Join {{ config('app.name') }} as a Self-Employed Carer</h2>
                    </div>
                    <div class="text">
                        <p>Welcome to {{ config('app.name') }}! If you are a dedicated carer looking for flexible care opportunities, you're in the right place. Our platform connects self-employed carers with families across the UK, providing rewarding and meaningful care experiences.</p>
                        <p>Register today to take the next step in your care career.</p>
                    </div>
                    <a href="{{ route('mainsite.carers') }}" class="theme-btn btn-style-one">
                        <span class="btn-title">Learn More</span>
                    </a>
                    <a href="{{ route('mainsite.contact') }}" class="theme-btn btn-style-two">
                        <span class="btn-title">Contact Us</span>
                    </a>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="form-bg" style="background-image: url('/mainsite-assets/images/background/3.jpg');"></div>

                @include('partials._messages')

                <div class="inner-column">
                    <div class="contact-form wow fadeInLeft">
                        <h2>Register as a Carer</h2>
                        <form method="post" action="{{ route('mainsite.register.carer.submit') }}" id="carer-registration-form">
                            @csrf
                            <div class="row">
                                <!-- Full Name -->
                                <div class="form-group col-lg-12">
                                    <label for="name" class="text-secondary">Full Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                        
                                <!-- Email Address -->
                                <div class="form-group col-lg-12">
                                    <label for="email" class="text-secondary">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                        
                                <!-- Phone Number -->
                                <div class="form-group col-lg-12">
                                    <label for="phone_number" class="text-secondary">Phone Number</label>
                                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                                </div>
                        
                                <!-- Honeypot Field (Invisible) -->
                                <div class="form-group col-lg-12" style="display:none;">
                                    @honeypot
                                </div>
                        
                                <!-- reCAPTCHA Centered -->
                                <div class="form-group col-lg-12 d-flex justify-content-center">
                                    {!! NoCaptcha::display() !!}
                                    {!! NoCaptcha::renderJs() !!}
                                </div>
                        
                                <!-- Privacy & Terms Disclaimer -->
                                <div class="form-group col-lg-12 text-center mb-3">
                                    <small class="text-muted">
                                        By clicking "Register Now", you agree to our 
                                        <a href="{{ route('mainsite.privacy') }}"  class="text-secondary" style="text-decoration: underline;" target="_blank">Privacy Policy</a> 
                                        and 
                                        <a href="{{ route('mainsite.terms.carer') }}"  class="text-secondary" style="text-decoration: underline;" target="_blank">Terms & Conditions</a>.
                                    </small>
                                </div>
                        
                                <!-- Submit Button -->
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                        <span class="btn-title">Register Now</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <!-- End Registration Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

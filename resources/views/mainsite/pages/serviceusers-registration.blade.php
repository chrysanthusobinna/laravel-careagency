@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Register')

@section('header-class', 'header-style-one')

@push('styles')
<style>
    .custom-radio-container {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .custom-radio {
        width: 18px;
        height: 18px;
        border: 2px solid #343a40;  
        background-color: white;
        margin-right: 0.5rem;
        cursor: pointer;
        transition: all 0.3s;
        appearance: none;  
        border-radius: 0;  
    }

    .custom-radio:checked {
        background-color: #343a40;  
        border-color: #343a40;
        position: relative;
    }

    .custom-radio:checked::after {
        font-size: 14px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endpush


@push('scripts')
	<script>
		$(document).ready(function() {
			$('.toggle-all-passwords').click(function() {
				let passwordFields = $('.password-field');  
				let icon = $(this).find('i');  
				let isPasswordVisible = passwordFields.attr('type') === 'text';

				// Toggle all password fields
				passwordFields.attr('type', isPasswordVisible ? 'password' : 'text');

				// Change button text and icon based on visibility
				$(this).html(isPasswordVisible 
					? '<i class="fa fa-eye"></i> Show Password' 
					: '<i class="fa fa-eye-slash"></i> Hide Password');
			});
		});
	</script>
@endpush

@section('content')
	<!-- Start main-content -->
	<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">Register</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ route('mainsite.home') }}">Home</a></li>
					<li>Register</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->


<!-- Register Section -->
<section class="team-section pt-0">
    <div class="auto-container">

        <!-- Content Row -->
        <div class="row">
            <!-- Text Content Column -->
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Connecting You with Compassionate Carers</h2>
                    </div>
                    <div class="text">
                        <p>At {{ config('app.name') }}, we specialize in matching families seeking care with self-employed carers who meet their specific preferences and needs. Our platform ensures that you find the right support to maintain independence and quality of life in the comfort of your own home.</p>
                        <p>By understanding your unique requirements, we provide personalized carer profiles, allowing you to choose the best match for you or your loved one.</p>
                    </div>
            
                    <!-- Buttons -->
                    <div class="mt-4">
                        <a href="{{ route('mainsite.family') }}" class="btn btn-danger me-2">Learn More</a>
                        <a href="{{ route('mainsite.contact') }}" class="btn btn-outline-danger">Contact Us</a>
                    </div>
                </div>
            </div>
            
            <!-- Registration Form Column -->
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="form-bg" style="background-image: url('images/background/3.jpg');"></div>

                @include('partials._messages')

                <div class="inner-column">
                    <!-- Registration Form -->
                    <div class="contact-form wow fadeInLeft">
                        <span class="sub-title">Register as an Individual or a Family in Need of Carers</span>
                        <h2>Join {{ config('app.name') }} Today</h2>
                        <form method="post" action="{{ route('mainsite.register.submit') }}" id="registration-form">
                            @csrf
                            <div class="row">
                                <!-- Registration Type -->
                                <div class="col-lg-12 rounded shadow-lg p-3 mb-4 bg-white">
                                    <label class="text-secondary mb-2">Are you registering to receive care for yourself or for a family member?</label>
                                    <div class="form-check form-check-inline custom-radio-container">
                                        <input class="form-check-input custom-radio" type="radio" name="role" id="self" value="care_beneficiary" {{ old('role') == 'care_beneficiary' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="self">I'm registering for myself</label>
                                    </div>
                                    <div class="form-check form-check-inline custom-radio-container">
                                        <input class="form-check-input custom-radio" type="radio" name="role" id="family" value="family_member" {{ old('role') == 'family_member' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="family">I'm registering for a family member</label>
                                    </div>
                                </div>
                                                    
                            
                                <hr/>
                                <p class="text-secondary fs-5 fw-bold mt-2">Please provide your own details below.</p>

                                <div class="form-group col-lg-12">
                                    <label for="first_name" class="text-secondary">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="form-group col-lg-12" style="display:none;">
                                    @honeypot
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="middle_name" class="text-secondary">Middle Name</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="last_name" class="text-secondary">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email" class="text-secondary">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="phone_number" class="text-secondary">Phone Number</label>
                                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="address" class="text-secondary">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="city" class="text-secondary">City</label>
                                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="post_code" class="text-secondary">Post Code</label>
                                    <input type="text" id="post_code" name="post_code" class="form-control" value="{{ old('post_code') }}" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="county" class="text-secondary">County</label>
                                    <input type="text" id="county" name="county" class="form-control" value="{{ old('county') }}" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="country" class="text-secondary">Country</label>
                                    <select id="country" name="country" class="form-control" required>
                                        @include('partials._select_country')
                                    </select>
                                </div>
                            
                                <!-- Password Fields -->
                                <div class="form-group col-lg-6">
                                    <label for="password" class="text-secondary">Password</label>
                                    <input type="password" id="password" name="password" class="form-control password-field" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password_confirmation" class="text-secondary">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control password-field" required>
                                </div>
                            
                                <!-- Show/Hide Password Button -->
                                <div class="form-group col-lg-12">
                                    <button class="btn btn-outline-secondary toggle-all-passwords btn-block" style="width:100%" type="button">
                                        <i class="fa fa-eye"></i> Show Password
                                    </button>
                                </div>                        
                                <!-- reCAPTCHA -->
                                <div class="form-group col-lg-12 d-flex justify-content-center">
                                    {!! NoCaptcha::display() !!}
                                    {!! NoCaptcha::renderJs() !!}
                                </div>
                            
                                <!-- Terms and Privacy Agreement -->
                                <div class="form-group col-lg-12 text-center mb-3">
                                    <p class="text-muted" style="font-size: 14px;">
                                        By clicking the "Register Now" button, you confirm that you have read and agree to our
                                        <a href="{{ route('mainsite.terms.serviceuser') }}" target="_blank" class="text-secondary" style="text-decoration: underline;">Terms and Conditions</a>
                                        and our
                                        <a href="{{ route('mainsite.privacy') }}" target="_blank" class="text-secondary" style="text-decoration: underline;">Privacy Policy</a>.
                                    </p>
                                </div>
                            
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                        <span class="btn-title">Register Now</span>
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                        
                                                
                    </div>
                    <!--End Registration Form -->
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

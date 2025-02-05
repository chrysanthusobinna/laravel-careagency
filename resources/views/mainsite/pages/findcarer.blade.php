@extends('mainsite.layouts.app')

@section('title', 'Find a Carer')

@section('header-class', 'header-style-one')

@section('content')
	<!-- Start main-content -->
	<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">Find a Carer</h1>
				<ul class="page-breadcrumb">
					<li><a href="index-2.html">Home</a></li>
					<li>Find a Carer</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->



<!-- Find a Carer Section -->
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
                        <p>At Carepass, we specialize in matching individuals seeking care with self-employed carers who meet their specific preferences and needs. Our platform ensures that you find the right support to maintain independence and quality of life in the comfort of your own home.</p>
                        <p>By understanding your unique requirements, we provide personalized carer profiles, allowing you to choose the best match for you or your loved one.</p>
                    </div>
                </div>
            </div>

            <!-- Registration Form Column -->
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="form-bg" style="background-image: url('images/background/3.jpg');"></div>
                <div class="inner-column">
                    <!-- Registration Form -->
                    <div class="contact-form wow fadeInLeft">
                        <h2>Register with Carepass</h2>
                        <form method="post" action="/register" id="registration-form">
                            <div class="row">
                                <!-- First Name (Full Width) -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="first_name" placeholder="First Name" required>
                                </div>
                                <!-- Middle Name (Full Width) -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="middle_name" placeholder="Middle Name">
                                </div>
                                <!-- Last Name (Full Width) -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="last_name" placeholder="Last Name" required>
                                </div>
                                <!-- Email Address (Half Width) -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                                <!-- Phone Number (Half Width) -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="tel" name="phone_number" placeholder="Phone Number" required>
                                </div>
                                <!-- Address (Full Width) -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="address" placeholder="Address" required>
                                </div>
                                <!-- City (Half Width) -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" name="city" placeholder="City" required>
                                </div>
                                <!-- Post Code (Half Width) -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" name="post_code" placeholder="Post Code" required>
                                </div>
                                <!-- County (Full Width) -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="county" placeholder="County" required>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two" type="submit" name="submit-form">
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

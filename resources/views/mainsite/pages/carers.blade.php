@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Join as a Carer')

@section('header-class', 'header-style-one')

@section('content')

<style>
    /* Custom Styles for Carers Page */
 

    .section-title {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

 

    .customx-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: 0.3s ease-in-out;
        background-color: #fff;
    }

    .customx-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .cta-section {
        background-color: #f8f9fa;
        padding: 40px;
        text-align: center;
        border-radius: 8px;
    }

 

    .cta-btn {
        font-size: 1.2rem;
        padding: 12px 30px;
        border-radius: 5px;
    }

    .img-wrapper img {
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Join {{ config('app.name') }} as a Carer</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Join as a Carer</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Introduction Section -->
<section class="container my-5">
    <h2 class="section-title">Empower Lives as a Self-Employed Carer</h2>
    <p class="text-center">At {{ config('app.name') }}, we connect dedicated, self-employed carers with families across the UK. If you’re passionate about making a difference, {{ config('app.name') }} is here to support you.</p>

    <div class="row d-flex align-items-stretch mt-4">
        <!-- Text Column -->
        <div class="col-md-6 d-flex">
            <div class="p-4 border rounded shadow-lg bg-white w-100 d-flex flex-column">
                <h3 class="text-danger">Why Choose {{ config('app.name') }}?</h3>
                <ul class="benefits-list list-unstyled flex-grow-1">
                    <li><i class="fa fa-check text-success"></i> <strong>Flexible Opportunities</strong> - Choose work that fits your schedule.</li>
                    <li><i class="fa fa-check text-success"></i> <strong>Direct Connections</strong> - Work directly with families.</li>
                    <li><i class="fa fa-check text-success"></i> <strong>Secure & Hassle-Free Payments</strong> - Timely and guaranteed payments.</li>
                    <li><i class="fa fa-check text-success"></i> <strong>Supportive Tools</strong> - Manage work via our easy-to-use app.</li>
                </ul>
            </div>
        </div>
    
        <!-- Image Column -->
        <div class="col-md-6 d-flex">
            <div class="img-wrapper w-100 d-flex align-items-center justify-content-center border rounded shadow-lg bg-white p-3">
                <img src="/mainsite-assets/images/resource/news-details.jpg" alt="Join {{ config('app.name') }}" class="img-fluid rounded">
            </div>
        </div>
    </div>
    
</section>

<!-- How we  Work -->
<section class="container my-5">
    <h2 class="section-title">How {{ config('app.name') }} Works</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="customx-card">
                <h4>1. Sign Up</h4>
                <p>Complete a quick application and suitability check.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="customx-card">
                <h4>2. Browse Opportunities</h4>
                <p>Explore care roles matching your skills & location.</p>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="customx-card">
                <h4>3. Connect with Families</h4>
                <p>Chat with families directly to discuss their needs.</p>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="customx-card">
                <h4>4. Start Caring</h4>
                <p>Begin providing care with {{ config('app.name') }} support.</p>
            </div>
        </div>
    </div>
</section>

<!-- The  App: Your Care Companion (Now a Block of Text) -->
<section class="container my-5">
    <h2 class="section-title">The {{ config('app.name') }} App: Your Care Companion</h2>
    <p>Once you're approved, you’ll gain access to our award-winning app designed exclusively for self-employed carers. Our app makes it simple to browse job opportunities, apply for roles, and manage your work schedule seamlessly. You’ll receive real-time notifications about new openings and your application status, ensuring you never miss an opportunity. Additionally, the app provides secure communication with families, allowing you to discuss care needs efficiently. The built-in earnings tracker and support center give you the confidence and control to manage your care journey effortlessly.</p>
</section>

<!-- Types of Care Opportunities -->
<section class="container my-5">
    <h2 class="section-title text-center mb-4">Types of Care Opportunities</h2>
    <div class="row d-flex justify-content-center">
        <!-- Live-In Care -->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="customx-card p-4 shadow rounded text-center w-100">
                <h3 class="text-danger">Live-In Care</h3>
                <p>Provide one-on-one support while living in a client’s home. Help clients maintain their independence in a familiar environment.</p>
                <p><a href="{{ route('mainsite.about') }}" class="text-primary">Read More</a></p>
            </div>
        </div>

        <!-- Respite Care -->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="customx-card p-4 shadow rounded text-center w-100">
                <h3 class="text-danger">Respite Care</h3>
                <p>Provide short-term care to relieve family caregivers. Ideal for those needing temporary assistance.</p>
                <p><a href="{{ route('mainsite.about') }}" class="text-primary">Read More</a></p>
            </div>
        </div>

        <!-- Visiting Care -->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="customx-card p-4 shadow rounded text-center w-100">
                <h3 class="text-danger">Visiting Care</h3>
                <p>Offer care through scheduled visits, helping with daily activities while ensuring clients stay independent.</p>
                <p><a href="{{ route('mainsite.about') }}" class="text-primary">Read More</a></p>
            </div>
        </div>
    </div>
</section>


<!-- About  (Now a Block of Text) -->
<section class="container my-5">
    <h2 class="text-danger">About {{ config('app.name') }}</h2>
    <p>{{ config('app.name') }} is a trusted platform that connects self-employed carers with families across the UK. We believe in empowering carers to deliver high-quality, person-centered care while providing the tools and support they need to succeed. Unlike traditional agencies, {{ config('app.name') }} offers complete freedom and transparency. You work directly with families, choose your own hours, and get paid without any hidden fees. Our commitment is to make caregiving easier, more accessible, and rewarding for both carers and families alike.</p>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <h2>Get Started Today</h2>
    <p>Join {{ config('app.name') }} and start making a difference in the lives of those who need care.</p>
   
    @if (Auth::guest())
        <a href="{{ route('mainsite.carers.register') }}" class="theme-btn btn-style-one mb-3 mb-sm-0">Apply Now</a>
    @endif

</section>

@endsection

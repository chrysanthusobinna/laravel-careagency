@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - About')

@section('header-class', 'header-style-one')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">About Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- About Section -->
<section class="about-section-three">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="600ms">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">About {{ config('app.name') }}</span>
                        <h2>Connecting You with Compassionate Carers</h2>
                        <div class="text">
                            {{ config('app.name') }} specializes in matching families and individuals seeking care with self-employed carers who meet their specific preferences and needs. Our platform ensures that you find the right support to maintain independence and quality of life in the comfort of your own home.
                        </div>
                        <div class="text">
                            By understanding your unique requirements, we provide personalized carer profiles, allowing you to choose the best match for you or your loved one. Our mission at {{ config('app.name') }} is to make the process of finding and managing care straightforward and stress-free, ensuring peace of mind for families and quality care for individuals.
                        </div>
                        <!-- Call to Action Buttons -->
                        <div class="mt-4">
                            <a href="{{ route('mainsite.contact') }}" class="theme-btn btn-style-two">
                                <span class="btn-title">Contact Us</span>
                            </a>

                            @if (Auth::guest())
                            <a href="{{ route('mainsite.register') }}" class="theme-btn btn-style-one ms-3">
                                <span class="btn-title">Register</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">
                    <figure class="image-1 overlay-anim wow fadeInUp"><img src="/mainsite-assets/images/resource/about3-1.jpg" alt=""></figure>
                    <figure class="image-2 overlay-anim wow fadeInRight"><img src="/mainsite-assets/images/resource/about3-2.jpg" alt=""></figure>
                </div>
            </div>
        </div>
    </div>


<!-- Service Section Four -->
<section class="services-section mb-5">
    <div class="auto-container">
        <div class="row">
            <!-- Values (Left Column) -->
            <div class="col-lg-6 col-md-12">
                <div class="sec-title">
                    <h3>Our Values</h3>
                    <div class="text">
                        At {{ config('app.name') }}, compassion is at the heart of everything we do, ensuring that every individual receives the care and kindness they deserve. Integrity guides our actions, fostering trust and transparency in our services. Excellence drives us to continuously improve, providing the highest standard of care. Respect is fundamental, honoring the dignity and individuality of each person.
                    </div>
                </div>
            </div>

            <!-- Vision (Right Column) -->
            <div class="col-lg-6 col-md-12">
                <div class="sec-title">
                    <h3>Our Vision</h3>
                    <div class="text">
                        Our vision at {{ config('app.name') }} is to transform the caregiving experience by setting a new standard of excellence. We aim to empower individuals through personalized, high-quality care, creating meaningful connections between service users and caregivers.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Service Section Four -->


@endsection

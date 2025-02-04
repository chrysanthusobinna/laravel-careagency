@extends('mainsite.layouts.app')

@section('title', 'About')

@section('header-class', 'header-style-one')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">About Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="index-2.html">Home</a></li>
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
                        <span class="sub-title">About Carepass</span>
                        <h2>Connecting You with Compassionate Carers</h2>
                        <div class="text">
                            At Carepass, we specialize in matching individuals seeking care with self-employed carers who meet their specific preferences and needs. Our platform ensures that you find the right support to maintain independence and quality of life in the comfort of your own home.
                        </div>
                        <div class="text">
                            By understanding your unique requirements, we provide personalized carer profiles, allowing you to choose the best match for you or your loved one. Our mission is to make the process of finding and managing care straightforward and stress-free, ensuring peace of mind for families and quality care for individuals.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">
                    <figure class="image-1 overlay-anim wow fadeInUp"><img src="images/resource/about3-1.jpg" alt=""></figure>
                    <figure class="image-2 overlay-anim wow fadeInRight"><img src="images/resource/about3-2.jpg" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

<!-- Service Section Four -->
<section class="services-section">
    <div class="auto-container">

        <div class="row">
            <!-- Values (Left Column) -->
            <div class="col-lg-6 col-md-12">
                <div class="sec-title">
                    <h3>Our Values</h3>
                    <div class="text">
                        Compassion is at the heart of everything we do, ensuring that every individual receives the care and kindness they deserve. Integrity guides our actions, fostering trust and transparency in our services. Excellence drives us to continuously improve, providing the highest standard of care. Respect is fundamental, honoring the dignity and individuality of each person. Innovation helps us evolve, embracing new solutions to enhance caregiving.
                    </div>
                </div>
            </div>

            <!-- Vision (Right Column) -->
            <div class="col-lg-6 col-md-12">
                <div class="sec-title">
                    <h3>Our Vision</h3>
                    <div class="text">
                        Our vision is to transform the caregiving experience by setting a new standard of excellence. We aim to empower individuals through personalized, high-quality care, creating meaningful connections between service users and caregivers. Carepass envisions a future where compassionate, innovative, and accessible care is available to everyone in need.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Service Section Four -->

@endsection

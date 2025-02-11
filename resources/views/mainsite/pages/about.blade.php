@extends('mainsite.layouts.app')

@section('title', 'About')

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
                        <span class="sub-title">About Care Agency</span>
                        <h2>Connecting You with Compassionate Carers</h2>
                        <div class="text">
                            Our agency specializes in matching Families and individuals seeking care with self-employed carers who meet their specific preferences and needs. Our platform ensures that you find the right support to maintain independence and quality of life in the comfort of your own home.
                        </div>
                        <div class="text">
                            By understanding your unique requirements, we provide personalized carer profiles, allowing you to choose the best match for you or your loved one. Our mission is to make the process of finding and managing care straightforward and stress-free, ensuring peace of mind for families and quality care for individuals.
                        </div>
                        <!-- Call to Action Buttons -->
                        <div class="mt-4">
                            <a href="{{ route('mainsite.contact') }}" class="theme-btn btn-style-two">
                                <span class="btn-title">Contact Us</span>
                            </a>


                            @if (Auth::guest())
                            <a href="{{ route('mainsite.register') }}" class="theme-btn btn-style-one ms-3">
                                <span class="btn-title">register</span>
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

    <div class="container">
        <!-- Live-in Care Section -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-body">
                <h3 class="text-primary">Live-in Care</h3>
                <p class="text-muted">
                    Live-in care provides full-time, around-the-clock support for individuals who need assistance with daily activities but wish to remain in the comfort of their own homes. This type of care is designed for older adults, individuals with disabilities, or those recovering from illness who require ongoing support to maintain their independence.
                </p>
                <p>
                    A professional caregiver moves into the home and provides assistance with personal care, meal preparation, medication management, and mobility support. They also offer companionship, ensuring the individual does not feel isolated or lonely. Unlike residential care facilities, live-in care allows individuals to stay in familiar surroundings while receiving tailored support that respects their personal preferences and daily routines.
                </p>
                <p>
                    Live-in care ensures a holistic approach, focusing not only on physical well-being but also on mental and emotional support. The presence of a caregiver provides peace of mind for family members, knowing their loved one is in safe hands. This service is particularly beneficial for those with progressive conditions like dementia, where continuity of care is essential for comfort and stability.
                </p>
            </div>
        </div>
    
        <!-- Respite Care Section -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-body">
                <h3 class="text-success">Respite Care</h3>
                <p class="text-muted">
                    Respite care is a short-term care solution designed to give family caregivers a well-deserved break while ensuring that their loved ones continue to receive high-quality support. Many family members dedicate their time to caring for an elderly relative or a person with a disability, which can be emotionally and physically demanding. Respite care provides temporary relief so that caregivers can rest, travel, or attend to personal commitments without worry.
                </p>
                <p>
                    This service is flexible and can range from a few hours to several weeks, depending on the needs of the family. A trained professional steps in to provide care, following the individual’s established routines to ensure minimal disruption. Whether the need is for personal care assistance, medication reminders, companionship, or mobility support, respite care ensures that individuals continue to receive the attention and care they require.
                </p>
                <p>
                    By taking advantage of respite care, family caregivers can prevent burnout and maintain their well-being while their loved ones remain safe and comfortable. It is also an excellent option for families who may be considering full-time care and want to explore available options before making a long-term decision.
                </p>
            </div>
        </div>
    
        <!-- Visiting Care Section -->
        <div class="card shadow-lg border-0 mb-1">
            <div class="card-body">
                <h3 class="text-info">Visiting Care</h3>
                <p class="text-muted">
                    Visiting care provides flexible, part-time support for individuals who need occasional help with daily activities but do not require round-the-clock assistance. It is a practical alternative for those who wish to remain independent but benefit from extra support with tasks such as housekeeping, personal hygiene, meal preparation, or attending appointments.
                </p>
                <p>
                    Unlike live-in care, visiting care operates on a scheduled basis, where a caregiver visits the home for a set number of hours each day or week. This allows individuals to maintain their independence while receiving tailored support when they need it. Many older adults prefer visiting care because it enables them to stay in their own homes while still benefiting from professional assistance.
                </p>
                <p>
                    Visiting care is ideal for individuals recovering from surgery, those managing chronic conditions, or anyone who needs temporary help following a hospital discharge. It provides reassurance to families that their loved one is being checked on regularly while still allowing them to lead their normal lives. The service can be adjusted as needs change, ensuring that individuals receive the appropriate level of care at every stage.
                </p>
            </div>
        </div>
    </div>
    
</section>
<!-- End About Section -->

<!-- Service Section Four -->
<section class="services-section mb-5">
    <div class="auto-container">
        <div class="row">
            <!-- Values (Left Column) -->
            <div class="col-lg-6 col-md-12">
                <div class="sec-title">
                    <h3>Our Values</h3>
                    <div class="text">
                        Compassion is at the heart of everything we do, ensuring that every individual receives the care and kindness they deserve. Integrity guides our actions, fostering trust and transparency in our services. Excellence drives us to continuously improve, providing the highest standard of care. Respect is fundamental, honoring the dignity and individuality of each person.
                    </div>
                </div>
            </div>

            <!-- Vision (Right Column) -->
            <div class="col-lg-6 col-md-12">
                <div class="sec-title">
                    <h3>Our Vision</h3>
                    <div class="text">
                        Our vision is to transform the caregiving experience by setting a new standard of excellence. We aim to empower individuals through personalized, high-quality care, creating meaningful connections between service users and caregivers.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Service Section Four -->

@endsection

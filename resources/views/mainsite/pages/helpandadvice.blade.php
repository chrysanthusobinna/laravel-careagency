@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Help and Advice')

@section('header-class', 'header-style-one')

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">Help and Advice</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                    <li>Help and Advice</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Help and Advice Section -->
    <section class="help-advice-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Column -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="/mainsite-assets/images/get-help.jpg" alt="Help and Advice" class="img-fluid rounded shadow">
                </div>
                <!-- Content Column -->
                <div class="col-lg-6">
                    <h2 class="mb-4">Your Trusted Partner in Care and Support</h2>
                    <p class="mb-4">
                        At {{ config('app.name') }}, we recognize that selecting the right caregiver is one of the most important decisions you can make for yourself or your loved ones. Our mission is to simplify this process by connecting you with compassionate, experienced carers who offer personalized support tailored to your specific needs. Whether you're looking for live-in care, visiting assistance, or specialized services, we're dedicated to guiding you every step of the way.
                    </p>
                    <p class="mb-4">
                        Discover the benefits of our user-friendly platform:
                    </p>
                    <ul class="list-unstyled mb-4">
                        <li><i class="fa fa-check-circle text-danger me-2"></i>Explore comprehensive caregiver profiles featuring introductory videos, verified references, and detailed skill sets.</li>
                        <li><i class="fa fa-check-circle text-danger me-2"></i>Engage directly with potential carers to ensure the perfect match for your unique requirements.</li>
                        <li><i class="fa fa-check-circle text-danger me-2"></i>Seamlessly manage your care arrangements with our intuitive online tools and resources.</li>
                    </ul>
                    <p class="mb-4">
                        In addition, we provide a rich collection of resources designed to empower you with knowledge about care options, funding assistance, and practical advice. Our goal is to support you in making informed decisions that lead to the highest quality of care and enhanced well-being.
                    </p>
                    <p class="mb-4">
                        Join the {{ config('app.name') }} community today and experience peace of mind knowing that compassionate support is just a click away.
                    </p>
                    <div class="d-flex">
                        <a href="{{ route('mainsite.contact') }}" class="btn-block btn btn-danger me-3">Contact Us</a>
                        <a href=" " class="btn btn-outline-danger">Visit Our Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Help and Advice Section -->
@endsection

@extends('mainsite.layouts.app')

@section('title', 'Login')

@section('header-class', 'header-style-one')

@section('content')
<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Login</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Login Section -->
<section class="team-section pt-0">
    <div class="auto-container">

        <!-- Login Form Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="form-bg" style="background-image: url('/mainsite-assets/images/background/3.jpg');"></div>
                <div class="inner-column">
                    @include('partials._messages')

                    <div class="contact-form wow fadeInLeft">
                        <h2>Login to Your Account</h2>
                        <form method="post" action="{{ route('mainsite.login.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="email" class="text-secondary">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="password" class="text-secondary">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                        <span class="btn-title">Login</span>
                                    </button>
                                </div>
                                <div class="form-group col-lg-12 text-center">
                                    <p class="mt-2">
                                        Don't have an account? <a href="{{ route('mainsite.register') }}">Register here</a>
                                    </p>
                                    <p>
                                        Forgot your password? <a href="{{ route('mainsite.set-password') }}">Reset here</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Login Form Row -->
    </div>
</section>

@endsection

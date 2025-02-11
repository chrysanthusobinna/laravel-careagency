@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Set Password')

@section('header-class', 'header-style-one')

@section('content')
<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Set Your Password</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Set Password</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Set Password Section -->
<section class="team-section pt-0">
    <div class="auto-container">


        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="form-bg" style="background-image: url('/mainsite-assets/images/background/3.jpg');"></div>
                @include('partials._messages')

                <div class="inner-column">
                    <div class="contact-form wow fadeInLeft">
                        <p>Enter your email address to receive the password reset link.</p>
                        <form method="post" action="{{ route('mainsite.password.send-link') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="email" class="text-secondary">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                        <span class="btn-title">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection

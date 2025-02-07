@extends('mainsite.layouts.app')

@section('title', 'Set Password')

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

        @include('partials._messages')

        <!-- Set Password Form Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="form-bg" style="background-image: url('/mainsite-assets/images/background/3.jpg');"></div>
                <div class="inner-column">
                    <div class="contact-form wow fadeInLeft">
                         
                        <form method="post" action="#">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="new_password" class="text-secondary">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="confirm_password" class="text-secondary">Confirm Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                        <span class="btn-title">Set Password</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Set Password Form Row -->
    </div>
</section>

@endsection

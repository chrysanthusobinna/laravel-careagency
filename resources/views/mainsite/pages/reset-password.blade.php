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
                        <p>Enter your new password below.</p>
                        <form method="post" action="{{ route('mainsite.password.reset') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ request('token') }}">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="new_password" class="text-secondary">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="new_password_confirmation" class="text-secondary">Confirm Password</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                        <span class="btn-title">Save</span>
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

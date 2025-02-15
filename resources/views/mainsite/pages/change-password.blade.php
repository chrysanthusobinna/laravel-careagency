
@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Change Your Password')

@section('header-class', 'header-style-one')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.toggle-all-passwords').click(function() {
                let passwordFields = $('.password-field'); // Select all password fields
                let icon = $(this).find('i'); // Select the icon
                let isPasswordVisible = passwordFields.attr('type') === 'text';

                // Toggle all password fields
                passwordFields.attr('type', isPasswordVisible ? 'password' : 'text');

                // Change button text and icon based on visibility
                $(this).html(isPasswordVisible 
                    ? '<i class="fa fa-eye"></i> Show Passwords' 
                    : '<i class="fa fa-eye-slash"></i> Hide Passwords');
            });
        });
    </script>
@endpush


@section('content')
<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Change Your Password</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Change Your Password</li>
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
                        <h2>Change Password</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" class="form-control password-field" name="old_password" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control password-field" name="new_password" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control password-field" name="confirm_password" required>
                            </div>
                        
                            <div class="form-group col-lg-12">
                                <button class="btn btn-outline-secondary toggle-all-passwords btn-block" style="width:100%" type="button">
                                    <i class="fa fa-eye"></i> Show Passwords
                                </button>
                            </div>
                        
                            <div class="form-group col-lg-12">
                                <button style="width:100%" class="theme-btn btn-style-two btn-secondary" type="submit">
                                    <span class="btn-title">Update Password</span>
                                </button>
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

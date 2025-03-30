@extends('admin.layouts.app')

@section('title', 'Admin - Care Giver Profile')


@push('styles')
      <!-- Google font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/font-awesome.css">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/icofont.css">
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/themify.css">
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/flag-icon.css">
      <!-- Feather icon-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/feather-icon.css">
      <!-- Plugins css start-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/slick.css">
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/slick-theme.css">
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/scrollbar.css">
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/animate.css">
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/prism.css">
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/bootstrap.css">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/style.css">
      <link id="color" rel="stylesheet" href="/dashboard-assets/css/color-1.css" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/responsive.css">  
@endpush


@push('scripts')
        <!-- latest jquery-->
        <script src="/dashboard-assets/js/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="/dashboard-assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="/dashboard-assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="/dashboard-assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <script src="/dashboard-assets/js/scrollbar/simplebar.js"></script>
        <script src="/dashboard-assets/js/scrollbar/custom.js"></script>
        <!-- Sidebar jquery-->
        <script src="/dashboard-assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="/dashboard-assets/js/sidebar-menu.js"></script>
        <script src="/dashboard-assets/js/sidebar-pin.js"></script>
        <script src="/dashboard-assets/js/slick/slick.min.js"></script>
        <script src="/dashboard-assets/js/slick/slick.js"></script>
        <script src="/dashboard-assets/js/header-slick.js"></script>
        <script src="/dashboard-assets/js/prism/prism.min.js"></script>
        <script src="/dashboard-assets/js/clipboard/clipboard.min.js"></script>
        <script src="/dashboard-assets/js/custom-card/custom-card.js"></script>
        <!-- calendar js-->
        <script src="/dashboard-assets/js/typeahead/handlebars.js"></script>
        <script src="/dashboard-assets/js/typeahead/typeahead.bundle.js"></script>
        <script src="/dashboard-assets/js/typeahead/typeahead.custom.js"></script>
        <script src="/dashboard-assets/js/typeahead-search/handlebars.js"></script>
        <script src="/dashboard-assets/js/typeahead-search/typeahead-custom.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="/dashboard-assets/js/script.js"></script>
        <script src="/dashboard-assets/js/script1.js"></script>
        <script src="/dashboard-assets/js/theme-customizer/customizer.js"></script>
        <!-- Plugin used-->

    
        </script>
@endpush


@section('page-header')
    <h4 class="f-w-700">View Care Giver Profile</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400">Care Giver</li>
        </ol>
    </nav>
@endsection

 
@php
$randomColor = $colorClasses[array_rand($colorClasses)];
@endphp

@section('content')
<div class="page-body">
    <div class="container-fluid">

        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    @include('partials._dashboard_message')
                    
                    <div class="card w-100 border-top border-warning border-3">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Care Giver Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="d-flex">
                                        @if($user->profile_picture == 'default.png')
                                            <div class="letter-avatar">
                                                <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $user->initials }}</h6>
                                            </div>
                                        @else
                                            <img class="img-70 rounded-circle" alt="Profile Picture" src="{{ asset('uploads/profile_pictures/' . $user->profile_picture) }}">
                                        @endif
                                        <div class="flex-grow-1">
                                            <h4 class="mb-1">{{ $user->first_name }} {{ $user->last_name }}</h4>
                                            <span class="badge bg-warning">{{ $user->formatted_role }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <td>{{ ucwords($user->first_name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Middle Name</th>
                                            <td>{{ $user->middle_name ? ucwords($user->middle_name) : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>{{ ucwords($user->last_name) }}</td>
                                        </tr>  
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                        </tr>                                     
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{ $user->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td>{{ $user->post_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ $user->country }}</td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('admin.chat.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="selected_user_ids" value="[{{ $user->id }}]">
                                <button type="submit" class="w-100 btn-block btn btn-outline-warning">
                                    <i class="fa fa-comment"></i> Chat with {{ ucwords($user->first_name) }}
                                </button>
                            </form>
                        </div>
                    </div>



                    <div class="card" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body d-flex justify-content-between align-items-center">
    
                             <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-warning" data-toggle="modal" data-target="#userSearchModal">
                                <i class="fa fa-home"></i> Dashboard
                            </a>
    
                            
                            <button type="button" class="btn btn-outline-warning" onclick="window.history.back()">
                                <i class="fa fa-arrow-left"></i> Go Back
                            </button>                            
                            
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
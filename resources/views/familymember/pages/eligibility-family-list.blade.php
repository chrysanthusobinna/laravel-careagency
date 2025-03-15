@extends('familymember.layouts.app')

@section('title', 'Family Member -Eligibility Form')


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


 
            
@endpush


@section('page-header')
<h4 class="f-w-700">Eligibility Form</h4>
<nav>
    <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('familymember.dashboard') }}"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item f-w-400">Dashboard</li>
        <li class="breadcrumb-item f-w-400 active">Eligibility Form</li>
    </ol>
</nav>
@endsection



@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-3">
   
        @include('partials._dashboard_message')

        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top d-flex justify-content-between align-items-center">
                            <h4>My Family Members</h4>
                            <a href="{{ route('familymember.care-beneficiary.add') }}" class="btn btn-primary">Add Family Member</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 recent-orders px-0">
                        <div class="table-responsive theme-scrollbar">
        
                            @if($familyMembers->isEmpty())
                            <div class="alert txt-primary border-warning alert-dismissible fade show m-3 p-3 d-flex align-items-center" role="alert">
                                <i class="fa fa-exclamation-circle me-2 text-danger"></i>
                                <span class="text-danger">You don't have any Care beneficiary linked to your account.</span>
                            </div>
                            @else
                            <div class="table-responsive theme-scrollbar p-3">
                                <table class="table display mt-3" id="recent-orders" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Relationship</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($familyMembers as $member)
                                            @php
                                                $randomColor = $colorClasses[array_rand($colorClasses)];
                                                $beneficiary = $member->careBeneficiary;
                                            @endphp
                                            <tr>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0">
                                                            @if($beneficiary->profile_picture == 'default.png')
                                                                <div class="letter-avatar">
                                                                    <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $beneficiary->initials }}</h6>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('uploads/profile_pictures/' . $beneficiary->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                            @endif
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="{{ route('familymember.care-beneficiary.show', $beneficiary->id) }}">
                                                                <h6>{{ ucwords($beneficiary->first_name . " " . $beneficiary->last_name) }}</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td   class="text-center">{{ $member->relationship_type }}</td>
                                                <td  class="text-center">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ route('familymember.eligibility.show',$beneficiary->id) }}'">
                                                        Eligibility
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            @endif
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection


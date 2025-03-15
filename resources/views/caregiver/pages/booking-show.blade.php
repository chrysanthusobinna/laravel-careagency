@extends('caregiver.layouts.app')

@section('title', 'Care Giver -  Care Booking')


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
    <h4 class="f-w-700">Care Booking</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Dashboard</li>
            <li class="breadcrumb-item f-w-400">Care Booking</li>
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
                <div class="col-xl-10 mx-auto">
                    @include('partials._dashboard_message')


                    <div class="card" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body d-flex justify-content-between align-items-center">
    
                             <a href="{{ route('carebeneficiary.dashboard') }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#userSearchModal">
                                <i class="fa fa-home"></i> Dashboard
                            </a>
    
                            
                            <button type="button" class="btn btn-outline-primary" onclick="location.reload();">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>                        
                            
                        </div>
                    </div>
 
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h2 class="mb-0">Booking Details</h2>
                        </div>
                        <div class="card-body">

                             


                            <div class="profile-title">
                                <div class="d-flex">
                                    @if($assignment->booking->careBeneficiary->profile_picture == 'default.png')
                                        <div class="letter-avatar">
                                            <h6 class="txt-primary bg-light-primary">{{ $assignment->booking->careBeneficiary->initials }}</h6>
                                        </div>
                                    @else
                                        <img class="img-70 rounded-circle" alt="Profile Picture" 
                                            src="{{ asset('uploads/profile_pictures/' . $assignment->booking->careBeneficiary->profile_picture) }}">
                                    @endif
                                    <div class="flex-grow-1">
                                        <h4 class="mb-1">{{ $assignment->booking->careBeneficiary->first_name }} {{ $assignment->booking->careBeneficiary->last_name }}</h4>
                                        <span class="badge bg-info">{{ $assignment->booking->careBeneficiary->formatted_role }}</span>
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <!-- Booking Information -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Reference Number</th>
                                            <td>{{ $assignment->booking->reference_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td>{{ date('l, jS F Y', strtotime($assignment->booking->start_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td>{{ date('l, jS F Y', strtotime($assignment->booking->end_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @php
                                                    $status = '';
                                                    $badgeClass = '';


                                                    if ($assignment->booking->status == 'approved') {
                                                        $status = 'Approved';
                                                        $badgeClass = 'bg-success';
                                                    } elseif ($assignment->booking->status == 'pending') {
                                                        $status = 'Pending';
                                                        $badgeClass = 'bg-warning text-dark';
                                                    } elseif ($assignment->booking->status == 'cancelled') {
                                                        $status = 'Cancelled';
                                                        $badgeClass = 'bg-danger';
                                                    } elseif (in_array($assignment->booking->status, ['carers_assigned', 'carers_selected'])) {
                                                        if ($assignment->caregiver_user_response == 'accepted') {
                                                            $status = 'Accepted';
                                                            $badgeClass = 'bg-success';
                                                        } elseif ($assignment->caregiver_user_response == 'pending') {
                                                            $status = 'Pending';
                                                            $badgeClass = 'bg-warning text-dark';
                                                        } elseif ($assignment->caregiver_user_response == 'cancelled') {
                                                            $status = 'Cancelled';
                                                            $badgeClass = 'bg-danger';
                                                        }
                                                    } elseif ($assignment->booking->status == 'completed') {
                                                        $status = 'Completed';
                                                        $badgeClass = 'bg-success';
                                                    } else {
                                                        $status = 'Unknown';
                                                        $badgeClass = 'bg-secondary';
                                                    }
                                                @endphp

                                                <span class="badge {{ $badgeClass }}">
                                                    {{ $status }}
                                                </span>
                                            </td>
                                                
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                
 
                        </div>

                        <div class="card-footer">
                            @if($assignment->caregiver_user_response === 'pending')
   
                                <div class="p-3 bg-white border rounded shadow-sm  mb-3" style="border-color: rgba(0, 0, 0, 0.1);">
                                    <p class="text-muted">You have been assigned to this booking. Please respond below.</p>
                                </div>

                            
                                <div class="d-flex justify-content-between">
                                    <!-- Accept Button  -->
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#acceptCaregiverResponseModal">
                                        Accept Booking
                                    </button>
                        
                                    <!-- Cancel Button  -->
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cancelCaregiverResponseModal">
                                        Cancel Booking
                                    </button>
                                </div>

                            
                            @else
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('caregiver.bookings.index') }}" class="btn btn-outline-secondary">Back</a>
                        
                                @if(!in_array($status, ['Completed', 'Cancelled']))
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelCaregiverResponseModal">
                                        Cancel Booking 
                                    </button>
                                @endif
                            @endif
                            </div>
                        </div>
                        
                        
                    </div>
                 
                

                    
                </div>
            </div>
        </div>
    </div>
</div>









<!-- Accept Confirmation Modal -->
<div class="modal fade" id="acceptCaregiverResponseModal" tabindex="-1" aria-labelledby="acceptCaregiverResponseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptCaregiverResponseModalLabel">Confirm Acceptance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to accept this booking? Once accepted, you will be responsible for fulfilling this care request.</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, Go Back</button>
                <form id="acceptCaregiverResponseForm" action="{{ route('caregiver.bookings.acceptResponse', $assignment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Yes, Accept</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Cancel Confirmation Modal -->
<div class="modal fade" id="cancelCaregiverResponseModal" tabindex="-1" aria-labelledby="cancelCaregiverResponseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelCaregiverResponseModalLabel">Confirm Cancellation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this booking? This action cannot be undone.</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, Keep Response</button>
                <form id="cancelCaregiverResponseForm" action="{{ route('caregiver.bookings.cancelResponse', $assignment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Yes, Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection

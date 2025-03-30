@extends('admin.layouts.app')

@section('title', 'Admin -  Care Booking')


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




        <script>
            $(document).ready(function () {
                $(".edit-btn").click(function () {
                    let update_booking_assignment_route = $(this).data("update_booking_assignment_route");
        
                    let serviceUserResponse = $(this).data("service_user_response");
                    let caregiverUserResponse = $(this).data("caregiver_user_response");
        
                    $("#editForm").attr("action", update_booking_assignment_route);
                    $("#service_user_response").val(serviceUserResponse);
                    $("#caregiver_user_response").val(caregiverUserResponse);
                });
        
                $(".delete-btn").click(function () {
                    let delete_booking_assignment_route = $(this).data("delete_booking_assignment_route");
        
                    $("#deleteForm").attr("action", delete_booking_assignment_route);
                });
            });
        </script>
        



@endpush

@section('page-header')
    <h4 class="f-w-700">Care Booking</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400">Care Booking</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    @include('partials._dashboard_message')


                    
                <div class="card" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                    <div class="card-body d-flex justify-content-between align-items-center">

                         <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#userSearchModal">
                            <i class="fa fa-home"></i> Dashboard
                        </a>

                        
                        <button type="button" class="btn btn-outline-primary" onclick="location.reload();">
                            <i class="fa fa-refresh"></i> Refresh
                        </button>                        
                        
                    </div>
                </div>


                    <div class="card shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">{{ $booking->reference_number }} - Care Booking</h2>
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-outline-info">Edit</a>
                        </div>
                        <div class="card-body">



                            
                            <div class="progress bg-light mb-3" style="height: 20px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);">
                                @php
                                    $progress = 0;
                                    $statusSteps = [
                                        'pending' => 10,
                                        'carers_assigned' => 30,
                                        'carers_selected' => 50,
                                        'approved' => 75,
                                        'completed' => 100,
                                        'cancelled' => 100
                                    ];
                                    if (array_key_exists($booking->status, $statusSteps)) {
                                        $progress = $statusSteps[$booking->status];
                                    }
                                @endphp
                                <div class="progress-bar progress-bar-striped progress-bar-animated
                                    {{ $booking->status == 'approved' || $booking->status == 'completed' ? 'bg-success' : 
                                       ($booking->status == 'cancelled' ? 'bg-danger' : 'bg-primary') }}" 
                                    role="progressbar" 
                                    style="width: {{ $progress }}%; border-radius: 10px;" 
                                    aria-valuenow="{{ $progress }}" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100">
                                </div>
                            </div>
                            


                            <div class="container my-4">
                                <div class="p-4 bg-white border rounded shadow" style="border-color: rgba(0, 0, 0, 0.1); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                                    @if($booking->status == 'pending')
                                        <p class="text-muted">
                                            <strong>This booking is pending.</strong> <br>
                                            It is awaiting admin to attach carers to this booking.
                                        </p>
                                        <a href="{{ route('admin.bookings.assign', $booking->id) }}" class="btn btn-sm btn-outline-primary">Assign Carers</a>
                                    @elseif($booking->status == 'carers_assigned')
                                        <p class="text-muted">
                                            <strong>Carers have been assigned to this booking.</strong> <br>
                                            You can follow up with the care beneficiary or family member to make a choice.
                                        </p>
                                    @elseif($booking->status == 'carers_selected')
                                        <p class="text-muted">
                                            <strong>Caregivers have been selected for this booking.</strong> <br>
                                            Staff should follow up with the caregivers to confirm their acceptance. 
                                            Once the caregivers have accepted, click "Approve Booking" at the bottom of the page to finalize the booking.
                                        </p>
                                        @elseif($booking->status == 'approved')
                                        <p class="text-muted">
                                            <strong>This booking has been approved.</strong> <br>
                                            The process has been completed, and the assigned caregivers are now confirmed.
                                        </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success"></i> Caregivers Assigned</li>
                                            <li><i class="fa fa-check text-success"></i> Service User Selected Carers</li>
                                            <li><i class="fa fa-check text-success"></i> Admin Approved Booking</li>
                                        </ul>
                                    
                                        
                                    @elseif($booking->status == 'completed')
                                        <p class="text-success">
                                            <strong>This booking has been completed.</strong>
                                        </p>
                                    @elseif($booking->status == 'cancelled')
                                        <p class="text-danger">
                                            <strong>This booking was cancelled.</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <hr/>
                            <div class="profile-title">
                                <div class="d-flex">
                                    @if($booking->careBeneficiary->profile_picture == 'default.png')
                                        <div class="letter-avatar">
                                            <h6 class="txt-primary bg-light-primary">{{ $booking->careBeneficiary->initials }}</h6>
                                        </div>
                                    @else
                                        <img class="img-70 rounded-circle" alt="Profile Picture" 
                                             src="{{ asset('uploads/profile_pictures/' . $booking->careBeneficiary->profile_picture) }}">
                                    @endif
                                    <div class="flex-grow-1">
                                        <a href="{{ route('admin.care-beneficiary.show', $booking->careBeneficiary->id) }}">
                                            <h4 class="mb-1">{{ $booking->careBeneficiary->first_name }} {{ $booking->careBeneficiary->last_name }}</h4>
                                        </a>
                                        
                                        <span class="badge bg-info">{{ $booking->careBeneficiary->formatted_role }}</span>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Start Date</th>
                                            <td>{{ date('l jS F Y', strtotime($booking->start_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td>{{ date('l jS F Y', strtotime($booking->end_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number of Carers</th>
                                            <td>{{ $booking->number_of_carers }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <span class="badge 
                                                @if($booking->status == 'approved')
                                                    bg-success
                                                @elseif($booking->status == 'pending')
                                                    bg-warning text-dark
                                                @elseif($booking->status == 'cancelled')
                                                    bg-danger
                                                @elseif($booking->status == 'carers_assigned')
                                                    bg-primary
                                                @elseif($booking->status == 'carers_selected')
                                                    bg-info
                                                @elseif($booking->status == 'completed')
                                                    bg-success
                                                @else
                                                    bg-secondary
                                                @endif
                                            ">
                                                {{ $booking->formatted_status }}
                                            </span>
                                            
                                            
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                 








                    @if($booking->status == 'carers_assigned' || $booking->status == 'carers_selected')
                    <div class="card shadow-lg mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Assigned Carers</h4>
                            <a href="{{ route('admin.bookings.assign', $booking->id) }}" class="btn btn-sm btn-outline-primary">Assign Carers</a>
                        </div>
                            @if($assignedCarers->isEmpty())
                                <div class="card-body">
                                    <p class="text-muted">No carers have been assigned to this booking yet.</p>
                                </div>
                            @else
                                <div class="card-body">
                                    @php
                                    $acceptedCarersCount = $acceptedCarers->count();
                                    @endphp

                                    @if($acceptedCarersCount < $booking->number_of_carers)
                                    <div class="p-3 mb-3 bg-white border rounded shadow-sm" style="border-color: rgba(0, 0, 0, 0.1); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                                        <p class="text-secondary">
                                            <strong>Notice:</strong> The number of selected carers is less than the required carers for this booking. 
                                            Please ensure enough carers are selected to meet the required number.
                                        </p>
                                    </div>
                                    @endif

                                    @if($acceptedCarersCount > $booking->number_of_carers)
                                    <div class="p-3 mb-3 bg-white border rounded shadow-sm" style="border-color: rgba(0, 0, 0, 0.1); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                                        <p class="text-danger">
                                            <strong>Warning:</strong> The number of selected carers exceeds the required carers for this booking. 
                                            Please review the selection and ensure it aligns with the required number.
                                        </p>
                                    </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Carer Name</th>
                                                    <th class="text-center">Service User Response</th>
                                                    <th class="text-center">Caregiver Response</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($assignedCarers->sortByDesc('service_user_response')->sortByDesc('caregiver_user_response') as $assignment)
                                                    @php
                                                        $randomColor = $colorClasses[array_rand($colorClasses)];
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="flex-shrink-0">
                                                                    @if($assignment->carer->profile_picture == 'default.png')
                                                                        <div class="letter-avatar">
                                                                            <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $assignment->carer->initials }}</h6>
                                                                        </div>
                                                                    @else
                                                                        <img src="{{ asset('uploads/profile_pictures/' . $assignment->carer->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                                    @endif
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <a href="{{ route('admin.caregivers.show', $assignment->carer->id) }}">
                                                                        <h6 class="mb-0">{{ $assignment->carer->first_name . " " . $assignment->carer->last_name }}</h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                        
                                                        <td class="text-center">
                                                            <span class="badge 
                                                                {{ $assignment->service_user_response == 'accepted' ? 'bg-success' : 
                                                                ($assignment->service_user_response == 'pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                                                <i class="fa {{ $assignment->service_user_response == 'accepted' ? 'fa-check' : 
                                                                ($assignment->service_user_response == 'pending' ? 'fa-clock-o' : 'fa-times') }}"></i>
                                                                {{ ucfirst($assignment->service_user_response) }}
                                                            </span>
                                                        </td>
                                        
                                                        <td class="text-center">
                                                            <span class="badge 
                                                                {{ $assignment->caregiver_user_response == 'accepted' ? 'bg-success' : 
                                                                ($assignment->caregiver_user_response == 'pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                                                <i class="fa {{ $assignment->caregiver_user_response == 'accepted' ? 'fa-check' : 
                                                                ($assignment->caregiver_user_response == 'pending' ? 'fa-clock-o' : 'fa-times') }}"></i>
                                                                {{ ucfirst($assignment->caregiver_user_response) }}
                                                            </span>
                                                        </td>
                                        
                                                        <td class="text-center">
                                                            <button class="btn btn-outline-secondary btn-sm edit-btn" 
                                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                                    data-update_booking_assignment_route="{{ route('admin.bookings.updateAssignment',  $assignment->id) }}" 
                                                                    data-service_user_response="{{ $assignment->service_user_response }}"
                                                                    data-caregiver_user_response="{{ $assignment->caregiver_user_response }}">
                                                                    <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-outline-danger btn-sm delete-btn" 
                                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                                    data-delete_booking_assignment_route="{{ route('admin.bookings.removeCarer', ['bookingId' => $assignment->booking_id, 'id' => $assignment->id]) }}" >
                                                                    <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between">
                                    @if($booking->status !== 'completed')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelBookingModal">
                                            Cancel Booking
                                        </button>
                                    @endif
                                
                                    
                                    @if($acceptedCarersCount == $booking->number_of_carers)
                                        <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
                                        </form>
                                    @endif
                                </div>
                    
                            @endif
                    </div>
                 
                @elseif($booking->status == 'approved' || $booking->status == 'completed')


                <div class="card shadow-lg mt-4">
                    <div class="card-header">
                        <h4 class="mb-0">Carers</h4>
                    </div>
                    <div class="card-body">
                        @if($acceptedCarers->isEmpty())
                            <p class="text-muted">No carers have been accepted yet.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
 
                                    <tbody>
                                        @foreach($acceptedCarers as $assignment)
                                        @php
                                        $randomColor = $colorClasses[array_rand($colorClasses)];
                                        @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0">
                                                            @if($assignment->carer->profile_picture == 'default.png')
                                                                <div class="letter-avatar">
                                                                    <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $assignment->carer->initials }}</h6>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('uploads/profile_pictures/' . $assignment->carer->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                            @endif
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="{{ route('admin.caregivers.show', $assignment->carer->id) }}">
                                                                <h6 class="mb-0">{{ $assignment->carer->first_name . " " . $assignment->carer->last_name }}</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                      
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">Booking List</a>

                        @if($booking->status !== 'completed')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelBookingModal">
                                Cancel Booking
                            </button>
                        @endif
                        
                    </div>
                    
                </div>

                @endif


                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Assigned Carer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="service_user_response">Service User Response:</label>
                    <select id="service_user_response" name="service_user_response" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="cancelled">Cancelled</option>
                    </select>

                    <label for="caregiver_user_response" class="mt-2">Caregiver Response:</label>
                    <select id="caregiver_user_response" name="caregiver_user_response" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>                
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Removal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this assigned carer?
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>



@if($booking->status !== 'completed')
<div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelBookingModalLabel">Confirm Booking Cancellation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this booking?</p>
                <p class="text-danger"><strong>Note:</strong> This action will remove all assigned carers.</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, Keep Booking</button>
                <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes, Cancel Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endif






@endsection

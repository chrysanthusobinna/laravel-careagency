@extends('carebeneficiary.layouts.app')

@section('title', 'Serviceuser - Care Booking')


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
                let maxCarers = {{ $booking->number_of_carers }};
        
                $("#submitSelection").click(function (e) {
                    e.preventDefault();
                    let checkedCount = $(".caregiver-checkbox:checked").length;
        
                    if (checkedCount === 0) {
                        $("#confirmationMessage").html(
                            "<strong>No caregivers selected.</strong><br>Please select at least one caregiver before proceeding."
                        );
                        $("#confirmationModal").modal("show");
                        return;
                    }
        
                    let message = "Have you checked the caregivers' profiles to confirm your choice?";
        
                    if (checkedCount > maxCarers) {
                        message = `<strong>You have selected ${checkedCount} caregivers, but you originally requested ${maxCarers}.</strong><br>
                                   If you need more, please contact us. Would you like to proceed with this selection?`;
                    } else if (checkedCount < maxCarers) {
                        message = `<strong>You have selected ${checkedCount} caregivers, while you originally requested ${maxCarers}.</strong><br>
                                   If this was intentional, please confirm. Otherwise, consider selecting more caregivers before proceeding.`;
                    }
        
                    $("#confirmationMessage").html(message);
                    $("#confirmationModal").modal("show");
                });
        
                $("#confirmSubmit").click(function () {
                    $("#caregiverSelectionForm").submit();
                });


                $('.caregiver-checkbox').on('change', function () {
                     const label = $(this).next('label');

                    if ($(this).is(':checked')) {
                         label.html('<i class="fa fa-check"></i> Selected');  
                     } else {
                         label.html(' Select'); 
                     }
                });


            });
        </script>
        
 
@endpush


@section('page-header')
    <h4 class="f-w-700">Care Booking</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('carebeneficiary.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Dashboard</li>
            <li class="breadcrumb-item f-w-400 active">Care Booking</li>
        </ol>
    </nav>
@endsection


@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-8 mx-auto">
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
                            <h2 class="mb-0">{{ $booking->reference_number }} - Care Booking</h2>
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
                                            <strong>This booking has been sent to our staff.</strong> <br>
                                            We will attach a list of carers that match your needs and preferences. 
                                            The next step is that you will see the list, view carers' profiles, and choose the carers you need.
                                        </p>
                                    @elseif($booking->status == 'carers_assigned')
                                        <p class="text-muted">
                                            <strong>We have attached some carers to this booking.</strong> <br>
                                            Kindly review the carers' profiles, make your selection, and submit so we can process your booking.
                                        </p>
                                    @elseif($booking->status == 'carers_selected')
                                        <p class="text-muted">
                                            <strong>You have selected carers and submitted your request.</strong> <br>
                                            We will process your booking as soon as possible.
                                        </p>
                                    @elseif($booking->status == 'approved')
                                        <p class="text-success">
                                            <strong>This booking has been approved.</strong>
                                        </p>
                                    @elseif($booking->status == 'cancelled')
                                        <p class="text-danger">
                                            <strong>This booking was cancelled.</strong> <br>
                                            You can contact us for more inquiries.
                                        </p>
                                    @elseif($booking->status == 'completed')
                                        <p class="text-success">
                                            <strong>This booking has been completed.</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>

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
                
                    @if($booking->status === 'carers_assigned' && count($assignedCarers) > 0)
                    <div class="card shadow-lg my-4">
                        <div class="card-header">
                            <h4 class="mb-0">Assigned Carers</h4>
                        </div>
                        <div class="card-body">
                            <form id="caregiverSelectionForm" action="{{ route('carebeneficiary.bookings.selectCarers', $booking->id) }}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @foreach($assignedCarers as $assignment)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0">
                                                                @if($assignment->carer->profile_picture == 'default.png')
                                                                    <div class="letter-avatar">
                                                                        <h6 class="txt-primary bg-light-primary">{{ $assignment->carer->initials }}</h6>
                                                                    </div>
                                                                @else
                                                                    <img src="{{ asset('uploads/profile_pictures/' . $assignment->carer->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                                @endif
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <a href="{{ route('carebeneficiary.caregivers.show', $assignment->carer->id) }}">
                                                                    <h6 class="mb-0">{{ $assignment->carer->first_name . " " . $assignment->carer->last_name }}</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                    
                                                    <td class="text-end">
                                                        <!-- Checkbox and Label -->
                                                        <input class="btn-check caregiver-checkbox" 
                                                               {{ $assignment->service_user_response == 'accepted' ? 'checked' : '' }} 
                                                               id="id_{{ $assignment->carer_id }}" 
                                                               type="checkbox" 
                                                               name="carer_ids[]" 
                                                               value="{{ $assignment->carer_id }}">
                                                    
                                                        <label class="btn btn-outline-info mb-2 text-start" for="id_{{ $assignment->carer_id }}">
                                                            {!! $assignment->service_user_response == 'accepted' ? '<i class="fa fa-check"></i> Selected' : 'Select' !!}
                                                        </label>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

 
                                </div>
                            </form>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary">Cancel Booking</button>
                            <button type="button" id="submitSelection" class="btn btn-secondary">Submit Selection</button>
                        </div>
                    </div>



                    <!-- Confirmation Modal -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Selection</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p id="confirmationMessage"></p>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Review Selection</button>
                                    <button type="button" id="confirmSubmit" class="btn btn-success">Confirm & Submit</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    @endif
                    




                    @if($booking->status === 'approved' && count($approvedCarers) > 0)
                    <div class="card shadow-lg my-4">
                        <div class="card-header">
                            <h4 class="mb-0">Carers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        @foreach($approvedCarers as $assignment)
                                            @php
                                            $randomColor = $colorClasses[array_rand($colorClasses)];
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0">
                                                            @if($assignment->carer->profile_picture == 'default.png')
                                                                <div class="letter-avatar">
                                                                    <h6 class="txt-primary bg-light-primary">{{ $assignment->carer->initials }}</h6>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('uploads/profile_pictures/' . $assignment->carer->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                            @endif
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="{{ route('carebeneficiary.caregivers.show', $assignment->carer->id) }}">
                                                                <h6 class="mb-0">{{ $assignment->carer->first_name . " " . $assignment->carer->last_name }}</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end"> 
                                                    <button class="btn btn-outline-primary">
                                                        <i class="fa fa-comments"></i> Chat
                                                    </button>
                                                </td>                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('carebeneficiary.bookings.index') }}" class="btn btn-outline-secondary">Back</a>
                            <button type="button" class="btn btn-secondary">Cancel Booking</button>
                        </div>
                        

                    </div>
                    @endif
                    
 
              
                
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

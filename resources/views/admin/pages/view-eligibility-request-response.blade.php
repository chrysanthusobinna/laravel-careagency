@extends('admin.layouts.app')

@section('title', 'Admin - Eligibility Request - View Response')


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
            var targetMenu = $(".sidebar-list:has(a span:contains('Service Users'))");  
    
            if (targetMenu.length > 0) {
                targetMenu.find(".sidebar-submenu").css("display", "block");  
    
                // Ensure the arrow icon changes to down
                targetMenu.find(".according-menu i").removeClass("fa-angle-right").addClass("fa-angle-down");
            }
        });
    
        </script>
@endpush



@section('page-header')
    <h4 class="f-w-700">Eligibility Request</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400"><a href="{{ route('admin.eligibility-request') }}">Eligibility Request</a></li>
            <li class="breadcrumb-item f-w-400 active">View Response</li>
        </ol>
    </nav>
@endsection



@section('content')
<div class="page-body">
    <div class="container-fluid">


        <h2 class="mb-4">Eligibility Response for {{ $eligibilityRequest->user->first_name }} {{ $eligibilityRequest->user->last_name }}</h2>


        <div class="card shadow-sm border-t-info">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 20%;">Eligibility Status:</td>
                            <td>
                                <span class="badge 
                                    {{ $eligibilityRequest->status == 'eligible' ? 'bg-success' : 
                                       ($eligibilityRequest->status == 'not_eligible' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ ucwords(str_replace('_', ' ', $eligibilityRequest->status)) }}

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Care Beneficiary:</td>
                            <td>
                                <a href="{{ route('admin.care-beneficiary.show', $eligibilityRequest->user->id) }}" >
                                    {{ $eligibilityRequest->user->first_name }} 
                                    {{ $eligibilityRequest->user->middle_name }} 
                                    {{ $eligibilityRequest->user->last_name }}
                                </a>
                            </td>
                        </tr>               
                        <tr>
                            <td class="fw-bold">Submitted by:</td>
                            <td>
                                @if($eligibilityRequest->submittedBy->role == 'care_beneficiary')
                                    <!-- If the user is a Care Beneficiary -->
                                    (SELF) 
                                    <a href="{{ route('admin.care-beneficiary.show', $eligibilityRequest->submittedBy->id) }}">
                                        {{ $eligibilityRequest->submittedBy->first_name }} 
                                        {{ $eligibilityRequest->submittedBy->middle_name ? $eligibilityRequest->submittedBy->middle_name . ' ' : '' }}
                                        {{ $eligibilityRequest->submittedBy->last_name }}
                                    </a>
                                    | <small class="text-muted">Submitted At {{ $eligibilityRequest->created_at->format('d M Y, h:i A') }}</small>
                                @elseif($eligibilityRequest->submittedBy->role == 'family_member')
                                    <!-- If the user is a Family Member -->
                                    Family Member ({{ $familyMemberRelation->relationship_type ?? 'N/A' }})  
                                    <a href="{{ route('admin.familymember.show', $eligibilityRequest->submittedBy->id) }}">
                                        {{ $eligibilityRequest->submittedBy->first_name }} 
                                        {{ $eligibilityRequest->submittedBy->middle_name ? $eligibilityRequest->submittedBy->middle_name . ' ' : '' }}
                                        {{ $eligibilityRequest->submittedBy->last_name }}
                                    </a>
                                    | <small class="text-muted">Submitted At {{ $eligibilityRequest->created_at->format('d M Y, h:i A') }}</small>
                                @else
                                    <!-- If role is neither care beneficiary nor family member -->
                                    <span class="text-muted">Role not recognized</span>
                                @endif
                            </td>
                        </tr>
         
                        @if($eligibilityRequest->checkedBy)
                            <tr>
                                <td class="fw-bold">Reviewed by:</td>
                                <td class="text-success">
                                    <a href="{{ route('admin.users.show', $eligibilityRequest->checkedBy->id) }}" >
                                        {{ $eligibilityRequest->checkedBy->first_name }} 
                                        {{ $eligibilityRequest->checkedBy->middle_name }} 
                                        {{ $eligibilityRequest->checkedBy->last_name }}
                                    </a>
                                    | <small class="text-muted">Reviewed on {{ $eligibilityRequest->updated_at->format('d M Y, h:i A') }}</small> 
                                </td>
                            </tr>
            
                        @else
                            <tr>
                                <td class="fw-bold">Reviewed Status:</td>
                                <td class="text-danger">This request has not been reviewed yet.</td>
                            </tr>

                        @endif
                    </tbody>
                </table>
                

            </div>

            <div class="card-footer">
                            
                <!-- Footer Section -->
                <div class="d-flex justify-content-between">
                    <!-- Update Button -->
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#updateEligibilityModal">
                        <i class="fa fa-check-circle"></i> Review Eligibility
                    </button>
        
                    <!-- Delete Button -->
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteEligibilityModal">
                        <i class="fa fa-trash"></i> Delete Request
                    </button>
                </div>
                </div>
        </div>



 

       
        
        @foreach($responses as $response)
 

        <div class="card common-hover border-start border-2 border-info">
            <div class="card-header border-b-info">
              <h5>{{ $response->question->question }}</h5>
            </div>
            <div class="card-body">
        
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width:20%;">Response:</td>
                            <td>
                                {{ is_array(json_decode($response->answer)) ? implode(', ', json_decode($response->answer)) : $response->answer }}
                            </td>
                        </tr>

                    </tbody>
                </table>

   
                        
            </div>

            @if($response->child_answer && $response->question->child_question)     
            <div class="card-header border-b-info">
                <h5>{{ $response->question->child_question }}</h5>
              </div>         
            <div class="card-body">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width:20%;">Response:</td>
                            <td>
                                {{ $response->child_answer }}
                            </td>
                        </tr>

                    </tbody>
                </table>


            </div>
            @endif 

        </div>
        
 
        
        @endforeach




        <!-- Update Eligibility Modal -->
        <div class="modal fade" id="updateEligibilityModal" tabindex="-1" aria-labelledby="updateEligibilityLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateEligibilityLabel">Review Eligibility Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.eligibility-request.review', $eligibilityRequest->user_id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="status" class="fw-bold">Select Eligibility Status:</label>
                            <select class="form-control" name="status" required>
                                <option value="pending" {{ $eligibilityRequest->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="eligible" {{ $eligibilityRequest->status == 'eligible' ? 'selected' : '' }}>Eligible</option>
                                <option value="not_eligible" {{ $eligibilityRequest->status == 'not_eligible' ? 'selected' : '' }}>Not Eligible</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Delete Eligibility Modal -->
        <div class="modal fade" id="deleteEligibilityModal" tabindex="-1" aria-labelledby="deleteEligibilityLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEligibilityLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">Are you sure you want to delete this eligibility request and all related responses? This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('admin.eligibility-request.delete', $eligibilityRequest->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        


 
    </div>
</div>
@endsection

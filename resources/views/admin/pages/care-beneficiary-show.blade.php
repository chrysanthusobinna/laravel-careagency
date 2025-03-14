@extends('admin.layouts.app')

@section('title', 'Admin - Care CareBeneficiary Profile')


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

      <meta name="csrf-token" content="{{ csrf_token() }}">

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
        
 
        
        <script src="/dashboard-assets/js/add-family-member.js"></script>

       
 


        <script>
        $(document).ready(function () {
            // Unlink Modal
            $("#unlinkModal").on("show.bs.modal", function (event) {
                let button = $(event.relatedTarget);  
                let id = button.data("id");  

                $("#unlink_id").val(id);  
            });

            // Update Modal
            $("#updateModal").on("show.bs.modal", function (event) {
                let button = $(event.relatedTarget);
                let id = button.data("id");
                let relationship = button.data("relationship");

                $("#update_id").val(id);
                $("#update_relationship").val(relationship).change();  
            });
        });



 </script>

    
            
@endpush

@section('page-header')
<h4 class="f-w-700">Care Beneficiary Profile</h4>
<nav>
    <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item f-w-400">Admin Panel</li>
        <li class="breadcrumb-item f-w-400">Care Beneficiary</li>
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
                    
                    <div class="card w-100 border-top border-info border-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Care Beneficiary Profile</h4>
                            <a href="{{ route('admin.bookings.create', $careBeneficiary->id) }}" class="btn btn-outline-info">Book Care</a>
                        </div>

                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="d-flex">
                                        @if($careBeneficiary->profile_picture == 'default.png')
                                            <div class="letter-avatar">
                                                <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $careBeneficiary->initials }}</h6>
                                            </div>
                                        @else
                                            <img class="img-70 rounded-circle" alt="Profile Picture" src="{{ asset('uploads/profile_pictures/' . $careBeneficiary->profile_picture) }}">
                                        @endif
                                        <div class="flex-grow-1">
                                            <h4 class="mb-1">{{ $careBeneficiary->first_name }} {{ $careBeneficiary->last_name }}</h4>
                                            <span class="badge bg-info">{{ $careBeneficiary->formatted_role }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <td>{{ ucwords($careBeneficiary->first_name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Middle Name</th>
                                            <td>{{ ucwords($careBeneficiary->middle_name) ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>{{ ucwords($careBeneficiary->last_name) }}</td>
                                        </tr>        
                                        <tr>
                                            <th>Email Address</th>
                                            <td>{{ strtolower($careBeneficiary->email) }}</td>
                                        </tr>                                          
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{ $careBeneficiary->phone_number }}</td>
                                        </tr>                                         

                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $careBeneficiary->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{ $careBeneficiary->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td>{{ $careBeneficiary->post_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>County</th>
                                            <td>{{ $loggedInUser->county ?? 'N/A' }}</td>
                                        </tr>                                       
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ $careBeneficiary->country }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('admin.chat.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="selected_user_ids" value="[{{ $careBeneficiary->id }}]">
                                <button type="submit" class="w-100 btn-block btn btn-outline-primary">
                                    <i class="fa fa-comment"></i> Chat with {{ ucwords($careBeneficiary->first_name) }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Family Members Managing This User -->
                    <div class="card w-100 border-top border-info border-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Family Members Managing This User</h5>
                            <button class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#addFamilyMemberModal" 
                                data-searchServiceUserroute="{{ route('admin.family-members.search', ['role' => 'family_member', 'user_id' => $careBeneficiary->id]) }}">
                                Add Family Member
                            </button>
                        </div>
                        <div class="card-body">
                            @if($careBeneficiary->familyMembersManagingCareBeneficiary->isEmpty())
                                <div class="d-flex align-items-center gap-2 p-3 border rounded">
                                    <i class="fa fa-exclamation-circle text-warning fa-lg"></i>
                                    <span>No family members linked to this Care Beneficiary.</span>
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Family Member</th>
                                            <th>Relationship</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($careBeneficiary->familyMembersManagingCareBeneficiary as $family)
                                            @php
                                                $randomColorFamily = $colorClasses[array_rand($colorClasses)];
                                            @endphp
                                            <tr>
                                                <td>                           
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0">
                                                            @if($family->familyMember->profile_picture == 'default.png')
                                                                <div class="letter-avatar">
                                                                    <h6 class="txt-{{ $randomColorFamily }} bg-light-{{ $randomColorFamily }}">{{ $family->familyMember->initials }}</h6>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('uploads/profile_pictures/' . $family->familyMember->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                            @endif
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="{{ route('admin.familymember.show', $family->familyMember->id) }}">
                                                                <h6>{{ $family->familyMember->first_name . " " . $family->familyMember->last_name }}</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>{{ $family->relationship_type }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-outline-warning btn-sm" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#updateModal"
                                                            data-id="{{ $family->id }}" 
                                                            data-relationship="{{ $family->relationship_type }}">
                                                        Update
                                                    </button>

                                                    <button class="btn btn-outline-danger btn-sm" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#unlinkModal"
                                                            data-id="{{ $family->id }}">
                                                        Unlink
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-outline-secondary" onclick="window.location.href='{{ route('admin.dashboard') }}'">Dashboard</button>
                            <button class="btn btn-secondary" onclick="window.history.back()">Back</button>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>

        <!-- Unlink Modal -->
        <div class="modal fade" id="unlinkModal" tabindex="-1" aria-labelledby="unlinkModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="unlinkModalLabel">Unlink Family Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.family-members.unlink') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="unlink_id">
                            <p>Are you sure you want to unlink this family member?</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Unlink</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Relationship</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.family-members.update') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="update_id">
                            <table class="table">
                                <tr>
                                    <td><strong>Relationship Type</strong></td>
                                    <td>
                                        <select class="form-control" name="relationship_type" id="update_relationship" required>
                                            <option value="Parent">Parent</option>
                                            <option value="Sibling">Sibling</option>
                                            <option value="Child">Child</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Add Family Member Modal -->
<div class="modal fade" id="addFamilyMemberModal" tabindex="-1" aria-labelledby="addFamilyMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFamilyMemberModalLabel">Add Family Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="p-3 border rounded shadow-lg mb-4" style="border-color: rgba(0, 0, 0, 0.1);">
                    <span class="text-muted">
                        Linking a family member to this Care Beneficiary will allow the family member to manage their care.
                    </span>
                </div>

                <!-- Hidden Success Message -->
                <div id="modalSuccessMessage" class="d-none text-center">
                    <div class="alert alert-success">
                        <h5>Family Member Linked Successfully!</h5>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" data-bs-dismiss="modal">Close</button>
                </div>

                <!-- Hidden Error Message -->
                <div id="modalErrorMessage" class="alert alert-danger d-none"></div>

                <!-- Form Content (Will be hidden on success) -->
                <div id="modalFormContent">
                    <form method="POST" action="{{ route('admin.family-members.add') }}">
                        @csrf
                        <!-- Search Field -->
                        <div class="mb-3">
                            <label for="search_family_member" class="form-label">Search Family Member</label>
                            <input type="text" class="form-control" id="search_family_member" placeholder="Enter name..." autocomplete="off">
                        </div>

                        <!-- Search Results -->
                        <div class="mb-3">
                            <label class="form-label">Select Family Member</label>
                            <div id="family_member_results" class="border p-2" style="max-height: 200px; overflow-y: auto;">
                                <p class="text-muted"></p>
                            </div>
                        </div>

                        <!-- Relationship Type -->
                        <div class="mb-3">
                            <label for="relationship_type" class="form-label">Relationship Type</label>
                            <select class="form-control" name="relationship_type" id="relationship_type" required>
                                <option value="Parent">Parent</option>
                                <option value="Sibling">Sibling</option>
                                <option value="Child">Child</option>
                                <option value="Spouse">Spouse</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Hidden Input to Store Selected User ID -->
                        <input type="hidden" name="role" value="care_beneficiary">
                        <input type="hidden" name="family_member_id" id="selected_family_member_id">
                        <input type="hidden" name="care_beneficiary_id" value="{{ $careBeneficiary->id }}">

                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

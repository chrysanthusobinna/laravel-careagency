
@extends('admin.layouts.app')

@section('title', 'Admin - Chat')


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
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/owlcarousel.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/rating.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/style.css">
    <link id="color" rel="stylesheet" href="/dashboard-assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/responsive.css"> 

    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.5.0/dist/tagify.css" rel="stylesheet">

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
    <script src="/dashboard-assets/js/chart/morris-chart/raphael.js"></script>
    <script src="/dashboard-assets/js/chart/morris-chart/morris.js"> </script>
    <script src="/dashboard-assets/js/chart/morris-chart/prettify.min.js"></script>
    <script src="/dashboard-assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="/dashboard-assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="/dashboard-assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="/dashboard-assets/js/chart/echart/pie-chart/facePrint.js"></script>
    <script src="/dashboard-assets/js/chart/echart/pie-chart/testHelper.js"></script>
    <script src="/dashboard-assets/js/chart/echart/pie-chart/custom-transition-texture.js"></script>
    <script src="/dashboard-assets/js/chart/echart/data/symbols.js"></script>
    <script src="/dashboard-assets/js/slick/slick.min.js"></script>
    <script src="/dashboard-assets/js/slick/slick-theme.js"></script>
    <script src="/dashboard-assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="/dashboard-assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <!-- calendar js-->
    <script src="/dashboard-assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard-assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="/dashboard-assets/js/datatable/datatables/datatable.custom1.js"></script>

    <script src="/dashboard-assets/js/rating/jquery.barrating.js"></script>
    <script src="/dashboard-assets/js/rating/rating-script.js"></script>
    <script src="/dashboard-assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="/dashboard-assets/js/vector-map/map-vector.js"></script>
    <script src="/dashboard-assets/js/countdown.js"></script>
    <script src="/dashboard-assets/js/dashboard/dashboard_3.js"></script>
    <script src="/dashboard-assets/js/ecommerce.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/dashboard-assets/js/script.js"></script>
    <script src="/dashboard-assets/js/script1.js"></script>
    <script src="/dashboard-assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->


     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <!-- Tagify JS -->
     <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.5.0/dist/tagify.min.js"></script>
 
     <script>
        $(document).ready(function() {



        // Passing chat participants  ID AND VALUE
        var chatParticipants = @json($chatUsers->map(function($user) {
            return [
                'value' => $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name . ' (' . $user->formatted_role . ')',
                'userID' => $user->id // User ID
            ];
        }));
        $('#user_ids').val(JSON.stringify(chatParticipants));


        // Passing chat participants ID 
        var chatParticipantsIDS = @json($chatUsers->map(function($user) {
            return  $user->id;
            
        }));
        $('#selectedUserIds').val(JSON.stringify(chatParticipantsIDS));

 

        var users = @json($users->map(function($user) {
            return [
                    'value' => $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name . ' (' . $user->formatted_role . ')',  
                    'userID' => $user->id // User ID
                ];
        }));

       // Initialize Tagify
       var input = document.querySelector("textarea[name=user_id]");
       var tagify = new Tagify(input, {
           enforceWhitelist: true,
           delimiters: null,
           whitelist: users,
           callbacks: {
               add: function(e) {
                   // On adding a tag, extract selected user IDs
                   var selectedUserIds = tagify.value.map(function(tag) {
                       return tag.userID; // Use 'code' (user ID)
                   });

                   // Update hidden input with selected user IDs as a JSON string
                   $('#selectedUserIds').val(JSON.stringify(selectedUserIds));

                   // Show title input field if more than one user is selected
                   if (selectedUserIds.length > 1) {
                       $('#titleField').removeClass('d-none'); // Show title input
                       $('#title').attr('required', true); // Set 'required' attribute

                   } else {
                       $('#titleField').addClass('d-none'); // Hide title input
                       $('#title').removeAttr('required'); // Remove 'required' attribute

                   }
               },
               remove: function(e) {
                   // On removing a tag, update the selected user IDs
                   var selectedUserIds = tagify.value.map(function(tag) {
                       return tag.userID; // Use 'code' (user ID)
                   });

                   // Update hidden input with updated selected user IDs as a JSON string
                   $('#selectedUserIds').val(JSON.stringify(selectedUserIds));

                   // Hide title input field if fewer than 2 users are selected
                   if (selectedUserIds.length <= 1) {
                       $('#titleField').addClass('d-none'); // Hide title input
                       $('#title').removeAttr('required'); // Remove 'required' attribute

                   }
               }
           }
       });
        });
    </script>

    


@endpush
@section('page-header')
    <h4 class="f-w-700">Chat</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400 active">Chat</li>
        </ol>
    </nav>
@endsection

 

@section('content')
<div class="page-body">
    <div class="container-fluid">
        @include('partials._dashboard_message')
 
        


        <div class="row">
            <div class="col-xl-8 mx-auto">
                <form action="{{ route('admin.chat.update',$chat->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Participants</h4>
                        </div>
                        <div class="card-body">
                            <!-- Tagify input for user selection -->
                            <div class="form-group">
                                <label for="user_ids">Select Participants</label>
                                <textarea name="user_id" id="user_ids" class="form-control" placeholder="Search users...">

                                </textarea>
                            </div>
                            
                            <!-- Title input field (initially hidden) -->
                            <div class="mt-2 form-group @if($chatUsers->count() <= 2) d-none @endif" id="titleField">
                                <label for="title">Group Chat Title</label>
                                <input value ="{{ $chat->title ? $chat->title : '' }}" type="text" name="title" id="title" class="form-control" placeholder="Enter chat title...">
                            </div>


                        </div>
        
                        <!-- Hidden input to store selected user IDs -->
                        <input type="hidden" name="selected_user_ids" id="selectedUserIds">
        
                        <div class="card-footer d-flex justify-content-between">
                            <a href="" onclick="window.history.back();"  class="btn btn-outline-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
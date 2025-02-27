
@extends('admin.layouts.app')

@section('title', 'Admin - Eligibility Questions')


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
    <script>
 $(document).ready(function () {
    // Show or hide the options section based on type selection
    $("#questionType").on("change", function () {
        let selectedType = $(this).val();
        if (selectedType === "radio" || selectedType === "checkbox") {
            $("#optionsSection").removeClass("d-none");
            $("#optionsContainer .option-input").prop("required", true);

            if (selectedType === "radio"){
                $("#tips").removeClass("d-none");
                $("#enable_others").removeClass("d-none");
            }
            else
            {
                if (!$("#tips").hasClass("d-none")) {
                    $("#tips").addClass("d-none");
                    $("#enable_others").addClass("d-none");
                } 
            }
            
        } else {
            $("#optionsSection").addClass("d-none");
            if (!$("#tips").hasClass("d-none")) {
                $("#tips").addClass("d-none");
            }


            $("#optionsContainer").html(`
                <div class="input-group mb-2 option-group">
                    <input type="text" class="form-control option-input" name="options[]" placeholder="Enter an option">
                    <button type="button" class="btn btn-danger remove-option d-none">Remove</button>
                </div>
            `);
            $("#optionsContainer .option-input").prop("required", false);
        }
    });

    // Add new option field
    $("#addOption").on("click", function () {
        $("#optionsContainer").append(`
            <div class="input-group mb-2 option-group">
                <input type="text" class="form-control option-input" name="options[]" placeholder="Enter an option">
                <button type="button" class="btn btn-outline-secondary remove-option"><i class="fa fa-times"></i></button>
            </div>
        `);
        $(".remove-option").removeClass("d-none");  
    });

    // Remove an option field
    $(document).on("click", ".remove-option", function () {
        $(this).closest(".input-group").remove();
        if ($("#optionsContainer .option-group").length === 1) {
            $(".remove-option").addClass("d-none"); // Hide remove button if only one option remains
        }
    });
 

});

        </script>

@endpush



@section('page-header')
    <h4 class="f-w-700">Eligibility Questions</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400">Eligibility Questions</li>
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

                    <form action="{{ route('admin.eligibility-questions.store') }}" method="POST">
                        @csrf
                        <div class="card common-hover border-start border-2 border-info">
                            
                            <div class="card-header border-b-info">
                                <h5>Add New Eligibility Question</h5>
                            </div>

                            <div class="card-body">
                                <!-- Question -->
                                <div class="mb-3">
                                    <label class="form-label">Question</label>
                                    <textarea class="form-control" name="question" required></textarea>
                                </div>

                                <!-- More Details -->
                                <div class="mb-3">
                                    <label class="form-label">More Details</label>
                                    <input type="text" class="form-control" name="more_details">
                                </div>

                                <!-- Question Type -->
                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <select class="form-control" name="type" id="questionType" required>
                                        <option value="textarea">Free Text (Textarea)</option>
                                        <option value="radio">Single Choice (Radio)</option>
                                        <option value="checkbox">Multiple Choice (Checkbox)</option>
                                    </select>
                                </div>


                                <!-- Options Section (For Radio & Checkbox Types) -->
                                <div id="optionsSection" class="mb-3 d-none">
                                    <label class="form-label">Options</label>
                                    <div id="optionsContainer">
                                        <div class="input-group mb-2 option-group">
                                            <input type="text" class="form-control option-input" name="options[]" placeholder="Enter an option">
                                            <button type="button" class="btn btn-outline-secondary remove-option d-none"> 
                                                <i class="fa fa-times"></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-info btn-sm mt-2" id="addOption">
                                        <i class="fa fa-plus"></i> Add Option
                                    </button>
                                </div>



                                <!-- Tip Section -->
                                <div id="tips" class="p-3 border rounded shadow-sm bg-white d-none mb-4" style="border-color: rgba(0, 0, 0, 0.2);">
                                    <i class="fa fa-exclamation-circle text-warning me-1"></i>
                                    <strong>Tips:</strong>  Consider checking the "Other" checkbox if you want service users to provide their own response when none of the available options apply.
                                </div>


                                <!-- Enable "Others" Option -->
                                <div id="enable_others" class="d-none form-check checkbox checkbox-primary mb-3">
                                    <input class="form-check-input" id="checkbox-option-others" type="checkbox" name="option_others" value="1">
                                    <label class="form-check-label" for="checkbox-option-others">
                                        Enable "Others" Option
                                    </label>
                                </div>
                            </div>

                            <div class="card-header border-b-info">
                                <h5>Child Question</h5>
                            </div>         

                            <div class="card-body">
                                <!-- Child Question Textarea -->
                                <div class="mb-3">
                                    <label class="form-label">Child Question</label>
                                    <textarea class="form-control" name="child_question" placeholder="Enter the follow-up question here..."></textarea>
                                </div>

                                <!-- Child Question Required -->
                                <div class="form-check checkbox checkbox-primary mb-3">
                                    <input class="form-check-input" id="checkbox-child-question-required" type="checkbox" name="child_question_required" value="1">
                                    <label class="form-check-label" for="checkbox-child-question-required">
                                        Require Child Question
                                    </label>
                                </div>                   
                            </div>

                            <!-- Card Footer with Buttons -->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('admin.eligibility-questions.index') }}" class="btn btn-outline-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Save Question</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

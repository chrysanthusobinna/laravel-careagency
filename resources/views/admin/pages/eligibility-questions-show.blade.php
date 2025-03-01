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

                    <!-- Question Details Card -->
                    <div class="card common-hover border-start border-2 border-info">
                        <div class="card-header border-b-info">
                            <h5>Question ({{ $questionNumber }}): {{ $question->question }}</h5>
                        </div>

                        <div class="card-body">
                            @if($question->more_details)
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold" style="width:40%;">More Details:</td>
                                        <td>{{ $question->more_details ?? 'NULL' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif


                            @if($question->type === 'textarea')  

                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold" style="width:40%;">Expected Response:</td>
                                            <td>Text</td>
                                        </tr>
                                    </tbody>
                                </table>

                            @elseif(($question->type === 'radio') || ($question->type === 'checkbox'))

                                @if($question->options)
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold" style="width:40%;">Expected Response:</td>
                                            <td>options</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="width:40%;"> </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    @foreach(json_decode($question->options, true) as $option)
                                                        <button type="button" class="btn btn-outline-primary w-100" >{{ $option }}</button>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        @if($question->option_others === 1)
                                        <tr>
                                            <td class="fw-bold" style="width:40%;">Other Options <span class="badge bg-success">Enabled</span></td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-outline-primary w-100" >Others</button>
                                                </div>
                                                
                                                <br>  Expected response: Radio Button or Text Area 
                                            </td>
                                        </tr>
                                        @endif
                                    
                                    </tbody>
                                </table>
                                @endif

                            @endif


                        </div>

                        @if($question->child_question)
                        <div class="card-header border-b-info">
                            <h5>Child Question: {{ $question->child_question }}</h5>
                        </div>
                        <div class="card-body">
                           <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="width:40%;">Expected Response:</td>
                                    <td>Text</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold" style="width:40%;">Child Question Requirement</td>
                                    <td>
                                        @if($question->child_question_required)
                                            <span class="badge bg-danger">Required</span>
                                        @else
                                            <span class="badge bg-secondary">Not Required</span>
                                        @endif
                                    </td>
                                </tr>                                

                            </tbody>
                        </table>


                        </div>
                        @endif

                        <!-- Card Footer with Back & Delete Buttons -->
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('admin.eligibility-questions.index') }}" class="btn btn-outline-secondary">Back</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this question?
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('admin.eligibility-questions.destroy', $question->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

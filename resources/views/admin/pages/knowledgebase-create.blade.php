@extends('admin.layouts.app')

@section('title', 'Admin - Knowledge Base')



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

      <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

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

         <!-- include summernote css/js -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
        
        <script>
                $(function () {
                $('#summernote').summernote({
                placeholder: 'Blog Content',
                tabsize: 2,
                height: 120,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['help']]
                ]
            });
            })
        </script>
    
@endpush



@section('page-header')
<h4 class="f-w-700">Knowledge Base</h4>
<nav>
    <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item f-w-400">Admin Panel</li>
        <li class="breadcrumb-item f-w-400 active">Knowledge Base</li>
    </ol>
</nav>
@endsection


@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">

                <form action="{{ route('admin.knowledgebase.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card border-primary border-3">
                        <div class="card-header">
                            <h4>Create New Knowledge Base Post</h4>
                        </div>
                        <div class="card-body">
                
                            <!-- Title -->
                            <div class="form-group mb-3">
                                <label for="title"><b>Title</b></label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                
                            <!-- Content -->
                            <div class="form-group mb-3">
                                <label for="summernote" class="form-label"><b>Content</b></label>
                                <textarea id="summernote" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                            </div>
                
                            <!-- Category and Media Attachment -->
                            <div class="row">
                                <!-- Category Select -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="category"><b>Category</b></label>
                                        <select id="category" name="category" class="form-control" required>
                                            <option value="admin">Admin</option>
                                            <option value="care_giver">Care Giver</option>
                                            <option value="care_beneficiary">Care Beneficiary</option>
                                            <option value="family_member">Family Member</option>
                                        </select>
                                    </div>
                                </div>
                
                                <!-- Media Attachment Input -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="media_attachment"><b>Media Attachment</b></label>
                                        <input type="file" id="media_attachment" name="media_attachment" class="form-control">
                                    </div>
                                </div>
                            </div>
                
                            <!-- Warning Message -->
                            <div class="p-2 bg-white border rounded shadow" style="border-color: rgba(0, 0, 0, 0.1); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-exclamation-circle text-warning mr-3" style="font-size: 24px;"></i> &nbsp;
                                    <p class="text-muted mb-0">
                                        <strong>NOTE:</strong> Only the following file types are allowed: <strong>.png, .jpeg, .jpg, .mp4</strong>.
                                    </p>
                                </div>
                            </div>
                
                            <!-- Publish Status -->
                            <div class="form-group mb-3 mt-3">
                                <label for="is_published"><b>Publish Status</b></label>
                                <div class="btn-group-vertical w-100" role="group">
                                    <!-- Published Option -->
                                    <input class="btn-check option-radio" id="publish_yes" type="radio" name="is_published" value="1" checked>
                                    <label class="btn btn-outline-info mb-2 text-start" for="publish_yes">
                                        Publish
                                    </label>
                
                                    <!-- Draft Option -->
                                    <input class="btn-check option-radio" id="publish_no" type="radio" name="is_published" value="0">
                                    <label class="btn btn-outline-info mb-2 text-start" for="publish_no">
                                        Draft
                                    </label>
                                </div>
                            </div>
                
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary" onclick="history.back()">Back</button>
                            <button type="submit" class="btn btn-secondary">Save Post</button>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

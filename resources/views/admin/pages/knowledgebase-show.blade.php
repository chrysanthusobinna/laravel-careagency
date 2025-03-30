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



                <div class="card" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                    <div class="card-body d-flex justify-content-between align-items-center">
        
                        <a href="{{ route('admin.knowledgebase.edit', $post->id) }}" class="btn btn-outline-warning">
                            <i class="fa fa-edit"></i> Edit
                        </a>
        
                        
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-outline-danger" onclick="$('#deleteModal').modal('show');">
                            <i class="fa fa-trash"></i> Delete
                        </button>

      
                    </div>
                </div>

                <div class="card border-primary border-3">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Publish Status</b></td>
                                    <td>
                                        @if($post->is_published)
                                            Published
                                        @else
                                            Draft
                                        @endif
                                    </td>
                                </tr>
                
                                <!-- Publish Date (if published) -->
                                @if($post->is_published)
                                    <tr>
                                        <td><b>Publish Date</b></td>
                                        <td>{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card border-primary border-3">
                    <div class="card-header">
                        <h4>{{ $post->title }}</h4>
                    </div>                    
                    <div class="card-body">
                        
                        <!-- Display Media Attachment -->
                        @if($post->media_attachment)
                            @if($post->media_file_type === 'image')
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/blog-images/'.$post->media_attachment) }}" alt="Blog Image" class="img-fluid">
                                </div>
                            
                            @elseif($post->media_file_type === 'video')
                                <video controls class="w-100">
                                    <source src="{{ asset('storage/blog-videos/'.$post->media_attachment) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        @else
                            <p class="text-muted">No media attachment available.</p>
                        @endif

                        <div class="mt-3">
                            {!! $post->content !!}
                        </div>

                        <p class="mt-5"><strong>Created By:</strong> {{ $post->author->first_name }} {{ $post->author->last_name }}</p>
                    
                  
                    </div>
                
                    <!-- Card Footer with Back and Dashboard buttons -->
                    <div class="card-footer d-flex justify-content-between">

                        <!-- Dashboard Button -->
                        <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('admin.dashboard') }}'">
                            <i class="fa fa-home"></i> Dashboard
                        </button>

                        <!-- Back Button -->
                        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <!-- Modern Close Button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Knowledge Base post?
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <!-- Cancel Button -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <!-- Delete Button (Triggers Deletion) -->
                <form action="{{ route('admin.knowledgebase.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection

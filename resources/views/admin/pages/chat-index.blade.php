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
    {{-- <script src="/dashboard-assets/js/datatable/datatables/datatable.custom.js"></script> --}}
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
        $('#chat-list').DataTable({
            "searching": true,
            "pageLength": 10,
            "order": [],
        });
    </script>

@endpush



@section('page-header')
    <h4 class="f-w-700">Chat</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400">Chat</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-3">

        @include('partials._dashboard_message')

        <div class="card" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.chat.create') }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#userSearchModal">
                    <i class="fa fa-plus"></i> New Chat
                </a>

                <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('admin.dashboard') }}'">
                    <i class="fa fa-home"></i> Dashboard
                </button>
            </div>
        </div>

        @if($chats->isEmpty())
            <div class="alert txt-primary border-warning alert-dismissible fade show" role="alert">
                <i data-feather="clock"></i>
                <p class="text-danger">No Chat found.</p>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Chat</h4>
                            </div>
                        </div>
                        <div class="card-body pt-0 recent-orders px-0">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table display" id="chat-list" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>&nbsp; </th>
                                            <th>&nbsp; </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($chats as $chat)
                                            @php
                                                $randomColor = $colorClasses[array_rand($colorClasses)];
                                                $isGroupChat = $chat->users->count() > 2;
                                                $unseenMessages = 0;
                                                foreach ($chat->chatParticipants as $chatParticipant) {
                                                    if ($chatParticipant->user->id == Auth::id()) {
                                                        $unseenMessages = $chatParticipant->unseen_messages;
                                                    }
                                                }
                                            @endphp
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.chat.show', $chat->id) }}">
                                                        @if($isGroupChat)
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="flex-shrink-0">
                                                                    <div class="letter-avatar">
                                                                        <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}"><i class="fa fa-users"></i></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6>{{ $chat->title }}</h6>
                                                                    <em class="text-muted">
                                                                        @foreach($chat->chatParticipants as $chatParticipant)
                                                                            {{ $chatParticipant->user->first_name }} {{ $chatParticipant->user->last_name }}{{ !$loop->last ? ',' : '' }}
                                                                        @endforeach
                                                                    </em>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="d-flex align-items-center gap-2">
                                                                @foreach($chat->chatParticipants as $chatParticipant)
                                                                    @if($chatParticipant->user->id !== Auth::id())
                                                                        <div class="flex-shrink-0">
                                                                            @if($chatParticipant->user->profile_picture == 'default.png')
                                                                                <div class="letter-avatar">
                                                                                    <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $chatParticipant->user->initials }}</h6>
                                                                                </div>
                                                                            @else
                                                                                <img src="{{ asset('uploads/profile_pictures/' . $chatParticipant->user->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                                            @endif
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <h6>{{ $chatParticipant->user->first_name . " " . ($chatParticipant->user->middle_name ? $chatParticipant->user->middle_name . " " : '') . $chatParticipant->user->last_name }}</h6>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-end">
                                                    @if($unseenMessages > 0)
                                                        <span class="badge badge-pill badge-primary">{{ $unseenMessages }} Unread</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

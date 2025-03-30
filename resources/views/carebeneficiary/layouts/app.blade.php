<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/dashboard-assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/dashboard-assets/images/favicon.png" type="image/x-icon">
    <title>@yield('title')</title>

    @stack('styles')
    @php
    $randomColor = $colorClasses[array_rand($colorClasses)];
    @endphp

  </head>
  <body> 
    <div class="loader-wrapper"> 
      <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="loader-inner-1"></div>
      </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <div class="page-header row">
        <div class="header-logo-wrapper col-auto">
          <div class="logo-wrapper"><a href="{{ route('carebeneficiary.dashboard') }}"><img class="img-fluid for-light" src="/dashboard-assets/images/logo/logo.png" alt=""/><img class="img-fluid for-dark" src="/dashboard-assets/images/logo/logo_light.png" alt=""/></a></div>
        </div>
        <div class="col-4 col-xl-4 page-title">
            @yield('page-header')
        </div>
        <!-- Page Header Start-->
        <div class="header-wrapper col m-0">
          <div class="row">
 
            <div class="header-logo-wrapper col-auto p-0">
              <div class="logo-wrapper"><a href="{{ route('carebeneficiary.dashboard') }}"><img class="img-fluid" src="/dashboard-assets/images/logo/logo.png" alt=""></a></div>
              <div class="toggle-sidebar">
                <svg class="stroke-icon sidebar-toggle status_toggle middle">
                  <use href="/dashboard-assets/svg/icon-sprite.svg#toggle-icon"></use>
                </svg>
              </div>
            </div>
            <div class="nav-right col-xxl-8 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
              <ul class="nav-menus">
             
 
                <li class="fullscreen-body">                       <span>
                    <svg id="maximize-screen">
                      <use href="/dashboard-assets/svg/icon-sprite.svg#full-screen"></use>
                    </svg></span>
                </li>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                      <svg>
                        <use href="/dashboard-assets/svg/icon-sprite.svg#notification"></use>
                      </svg><span class="badge rounded-pill badge-primary">0 </span>
                    </div>
                    @include('carebeneficiary.layouts.notification')
                  </li>
                               
                

                <li>
                  <div class="mode">
                    <svg>
                      <use href="/dashboard-assets/svg/icon-sprite.svg#moon"></use>
                    </svg>
                  </div>
                </li>
 
  
                <li class="profile-nav onhover-dropdown px-0 py-0" onclick="window.location.href='{{ route('carebeneficiary.auth-profile.show') }}'">
                    <div class="d-flex profile-media align-items-center">
                        @if($loggedInUser->profile_picture == 'default.png')
                            <div class="letter-avatar">
                                <h6 style="width: 40px; height: 40px;" class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">
                                    {{ $loggedInUser->initials }}
                                </h6>
                            </div>
                        @else
                            <img src="{{ asset('uploads/profile_pictures/' . $loggedInUser->profile_picture) }}" alt="Profile Picture" class="img-30">
                        @endif
                
                        <div class="flex-grow-1">
                            <span>{{ $loggedInUser->first_name }}</span>
                            <p class="mb-0 font-outfit">{{ $loggedInUser->formatted_role }}</p>
                        </div>
                    </div>
                </li>
                
              </ul>
            </div>

          </div>
        </div>
        <!-- Page Header Ends                              -->
      </div>
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">

        @include('carebeneficiary.layouts.sidebar')

        @yield('content')



        <!-- Footer Start -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                <p class="mb-0 f-w-600">
                  <script>document.write(new Date().getFullYear());</script> &copy; {{ config('app.name') }}. All rights reserved.
                </p>
              </div>
            </div>
          </div>
        </footer>

      </div>
    </div>


    @stack('scripts')

  </body>
</html>
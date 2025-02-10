        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
            <div>
              <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="/dashboard-assets/images/logo/logo_light.png" alt=""></a>
                <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
              </div>
              <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="/dashboard-assets/images/logo/logo-icon.png" alt=""></a></div>
              <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                  <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                      <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                      <div> 
                        <h6>Pinned</h6>
                      </div>
                    </li>



                    <li class="sidebar-list"><a  class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}" >
                        <svg class="stroke-icon">
                          <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg>
                        <svg class="fill-icon">
                          <use href="/dashboard-assets/svg/icon-sprite.svg#fill-home"></use>
                        </svg><span>Dashboard</span></a>
                    </li>

 
                        
                    <li class="sidebar-list"><a class="{{ request()->routeIs('admin.chat') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('admin.chat') }}" >
                        <svg class="stroke-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-chat"></use>
                          </svg>
                        <svg class="fill-icon">
                          <use href="/dashboard-assets/svg/icon-sprite.svg#fill-chat"></use>
                        </svg><span>Chat</span></a>
                    </li>




     

                        
                    <li class="sidebar-list">
                        <a class="{{ request()->routeIs('admin.service-users.index') || request()->routeIs('admin.service-users.create') ? 'active' : '' }} sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-user"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-user"></use>
                            </svg><span>Service Users</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="{{ request()->routeIs('admin.service-users.create') ? 'active' : '' }}" href="{{ route('admin.service-users.create') }}">Add New</a></li>
                            <li><a class="{{ request()->routeIs('admin.service-users.index') ? 'active' : '' }}" href="{{ route('admin.service-users.index') }}">View List</a></li>
                            <li><a class="{{ request()->routeIs('admin.eligibility-request') ? 'active' : '' }}" href="{{ route('admin.eligibility-request') }}">Eligibility Request</a></li>
                            <li><a class="{{ request()->routeIs('admin.care-booking-request') ? 'active' : '' }}" href="{{ route('admin.care-booking-request') }}">Care Booking Request</a></li>

                        </ul>
                        
                    </li>
                    

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                        <svg class="stroke-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-user"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#fill-user"></use>
                        </svg><span>Care Givers</span></a>
                      <ul class="sidebar-submenu">
 
           
                        <li><a href="hide-on-scroll.html">Add New</a></li>
                        <li><a href="hide-on-scroll.html">View List</a></li>
                      </ul>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                        <svg class="stroke-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-user"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#fill-user"></use>
                        </svg><span>Admin</span></a>
                      <ul class="sidebar-submenu">
 
           
                        <li><a href="hide-on-scroll.html">Add New</a></li>
                        <li><a href="hide-on-scroll.html">View List</a></li>
                      </ul>
                    </li>


                    
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="https://support.pixelstrap.com/portal/en/signin" >
                        <svg class="stroke-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-editors"></use>
                          </svg>
                          <svg class="fill-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#fill-editors"></use>
                          </svg>
                        
                        <span>My Profile</span></a>
                    
                    
                    </li>

 
                    <li class="sidebar-list"><a class="{{ request()->routeIs('admin.knowledge-base') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('admin.knowledge-base') }}" >
                        <svg class="stroke-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-file"></use>
                          </svg>
                          <svg class="fill-icon">
                            <use href="/dashboard-assets/svg/icon-sprite.svg#fill-file"></use>
                          </svg>
                        <span>Knowledge Base </span></a></li>


                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}" >
                            <svg class="stroke-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-icon feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                              <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-file"></use>
                              </svg>
                            <span>Logout </span></a></li>
                            
                            
                  </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
              </nav>
            </div>
          </div>
  
          <!-- Page Sidebar Ends-->
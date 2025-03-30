<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('carebeneficiary.dashboard') }}">
                <img class="img-fluid" src="/dashboard-assets/images/logo/logo_light.png" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('carebeneficiary.dashboard') }}">
                <img class="img-fluid" src="/dashboard-assets/images/logo/logo-icon.png" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="{{ request()->routeIs('carebeneficiary.dashboard') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-home"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="{{ request()->is('carebeneficiary/chat*') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.chat.index') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-chat"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-chat"></use>
                            </svg>
                            <span>Chat</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="{{ request()->is('carebeneficiary/booking*') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.bookings.index') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-bookmark"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-bookmark"></use>
                            </svg>
                            <span>Care Bookings</span>
                        </a>
                    </li>


                    <li class="sidebar-list">
                        <a class="{{ request()->is('carebeneficiary/eligibility*') ? 'active' : '' }} sidebar-link sidebar-title link-nav" 
                            href="{{ route('carebeneficiary.eligibility.show') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-check"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-check"></use>
                            </svg>
                            <span>Eligibility</span>
                        </a>
                    </li>
                   
                    

                    <li class="sidebar-list">
                        <a class="{{ request()->is('carebeneficiary/family*') ? 'active' : '' }}  sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.family-member') }}">
                            <!-- Stroke version of the users icon -->
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-users"></use>
                            </svg>
                            <!-- Fill version of the users icon -->
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-users"></use>
                            </svg>
                            <span>Family</span>
                        </a>
                    </li>


                    
                    <li class="sidebar-list">
                        <a class="{{ request()->is('carebeneficiary/knowledgebase*') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.knowledgebase.index') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-file"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-file"></use>
                            </svg>
                            <span>Knowledge Base</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="{{ request()->is('carebeneficiary/auth-profile*') ? 'active' : '' }}    sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.auth-profile.show') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-editors"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-editors"></use>
                            </svg>
                            <span>My Profile</span>
                        </a>
                    </li>


                    <li class="sidebar-list">
                        <a class="{{ request()->routeIs('carebeneficiary.change-password') ? 'active' : '' }} sidebar-link sidebar-title link-nav" href="{{ route('carebeneficiary.change-password') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-lock"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#fill-lock"></use>
                            </svg>
                            <span>Change Password</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}">
                            <svg class="stroke-icon">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#stroke-logout"></use>
                            </svg>
                            <span>Logout</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->

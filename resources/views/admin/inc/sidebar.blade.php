<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!-- LOGO -->
        <a href="{{route('admin.dashboard.index')}}" class="logo text-center mb-4">
            <span class="logo-lg">
                <img src="{{asset('dashboard/assets/images/logo.png')}}" alt="" height="20">
            </span>
            <span class="logo-sm">
                <img src="{{asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="24">
            </span>
        </a>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{route('admin.dashboard.index')}}">
                        <i class="dripicons-home"></i>
                        {{-- <span class="badge badge-success float-right">08</span> --}}
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.slider.index')}}">
                        <i class="fe-briefcase"></i>
                        <span> Slider </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-account-group"></i>
                        <span> Apointments </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.meeting.index')}}">Meeting Schedule</a>
                        </li>
                        <li>
                            <a href="{{route('admin.meeting-type.index')}}">Meeting type</a>
                        </li>
                        <li>
                            <a href="{{route('admin.meeting-status.index')}}">Meeting Status</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-account-group"></i>
                        <span> User Manangement </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.user.index')}}">User</a>
                        </li>
                        <li>
                            <a href="{{route('admin.role.index')}}">role</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-account-group"></i>
                        <span> Our Team </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.member.index')}}">Member List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.designation.index')}}">Designation</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-book-open"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.blog.index')}}">Blog List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.blog-category.index')}}">Category</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.pricing.index')}}">
                        <i class="fe-briefcase"></i>
                        <span> Pricing </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.service.index')}}">
                        <i class="fe-box"></i>
                        <span> Service </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.section.index')}}">
                        <i class="fe-box"></i>
                        <span> Section </span>
                    </a>
                </li>
                @can('about-view')
                <li>
                    <a href="{{route('admin.about.index')}}">
                        <i class="mdi mdi-snowflake "></i>
                        <span> About </span>
                    </a>
                </li>
                @endcan
                <li>
                    <a href="{{route('admin.partner.index')}}">
                        <i class="mdi mdi-coin"></i>
                        <span> Partner </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-archive"></i>
                        <span> Portfolio </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.portfolio.index')}}">Portfolio List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.portfolio-category.index')}}">Category</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.counter.index')}}">
                        <i class="mdi mdi-numeric-7-box"></i>
                        <span> Counter </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-help "></i>
                        <span> Faq </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.faq.index')}}">Faq List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.faq-category.index')}}">Category</a>
                        </li>
                    </ul>
                </li>
                @can('social-view')
                <li>
                    <a href="{{route('admin.social.create')}}">
                        <i class="fe-facebook"></i>
                        <span> Social </span>
                    </a>
                </li>
                @endcan
                <li>
                    <a href="{{route('admin.why-choose-us.index')}}">
                        <i class="mdi mdi-bank"></i>
                        <span> Why Choose Us </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.testimonial.index')}}">
                        <i class=" mdi mdi-content-save"></i>
                        <span> Testimonial </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.work-process.index')}}">
                        <i class="mdi mdi-cake-variant"></i>
                        <span> Work Process </span>
                    </a>
                </li>
                @can('setting-view')
                    <li>
                        <a href="{{route('admin.setting.index')}}">
                            <i class="dripicons-gear"></i>
                            <span> Setting</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

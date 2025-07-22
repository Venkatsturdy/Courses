<style>
    .nav-main-link-name {
        font-size: 110%;
        line-height: 1.2em;
    }
</style>
<!-- Sidebar -->
<nav id="sidebar" class="sidebarbg2" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="{{ route('admins.index') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider ml-2">
                <img src="{{ asset('assets/media/favicons/courses.png') }}" width="110px" height="60px"
                    class="my-1">
            </span>
        </a>
        <div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>

    <div class="js-sidebar-scroll sidebarbg3">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('admins.*') ? 'active' : '' }}"
                        href="{{ route('admins.index') }}">
                        <i class="nav-main-link-icon fa fa-user"></i>
                        <span class="nav-main-link-name">Admin</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('categories.*') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">
                        <i class="nav-main-link-icon fa fa-images"></i>
                        <span class="nav-main-link-name">Category</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('courses.*') ? 'active' : '' }}"
                        href="{{ route('courses.index') }}">
                        <i class="nav-main-link-icon fa fa-briefcase"></i>
                        <span class="nav-main-link-name">Course</span>
                    </a>
                </li>

                {{-- <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('projects.*') ? 'active' : '' }}"
                        href="{{ route('projects.index') }}">
                        <i class="nav-main-link-icon fa fa-folder-open"></i>
                        <span class="nav-main-link-name">Project</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('brands.*') ? 'active' : '' }}"
                        href="{{ route('brands.index') }}">
                        <i class="nav-main-link-icon fa fa-tags"></i>
                        <span class="nav-main-link-name">Client</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('inspirings.*') ? 'active' : '' }}"
                        href="{{ route('inspirings.index') }}">
                        <i class="nav-main-link-icon fa fa-lightbulb"></i>
                        <span class="nav-main-link-name">Our Service</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('core.index') ? 'active' : '' }}"
                        href="{{ route('core.index') }}">
                        <i class="nav-main-link-icon fa fa-envelope"></i>
                        <span class="nav-main-link-name">Our Core Values</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('workingwithus.*') ? 'active' : '' }}"
                        href="{{ route('workingwithus.index') }}">
                        <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                        <span class="nav-main-link-name">Working With Us</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('works.*') ? 'active' : '' }}"
                        href="{{ route('works.index') }}">
                        <i class="nav-main-link-icon fa fa-tasks"></i>
                        <span class="nav-main-link-name">Our Works</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('faqs.*') ? 'active' : '' }}"
                        href="{{ route('faqs.index') }}">
                        <i class="nav-main-link-icon fa fa-question-circle"></i>
                        <span class="nav-main-link-name">FAQ</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('values.*') ? 'active' : '' }}"
                        href="{{ route('values.index') }}">
                        <i class="nav-main-link-icon fa fa-handshake"></i>
                        <span class="nav-main-link-name">Our Values</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('aboutus.*') ? 'active' : '' }}"
                        href="{{ route('aboutus.index') }}">
                        <i class="nav-main-link-icon fa fa-comments"></i>
                        <span class="nav-main-link-name">About Us</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('testimonials.*') ? 'active' : '' }}"
                        href="{{ route('testimonials.index') }}">
                        <i class="nav-main-link-icon fa fa-info-circle"></i>
                        <span class="nav-main-link-name">Testimonials</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('careers.*') ? 'active' : '' }}"
                        href="{{ route('careers.index') }}">
                        <i class="nav-main-link-icon fa fa-briefcase"></i>
                        <span class="nav-main-link-name">Careers</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('contacts.*') ? 'active' : '' }}"
                        href="{{ route('contacts.index') }}">
                        <i class="nav-main-link-icon fa fa-phone"></i>
                        <span class="nav-main-link-name">Contact</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('enquiries') ? 'active' : '' }}"
                        href="{{ route('enquiries') }}">
                        <i class="nav-main-link-icon fa fa-envelope"></i>
                        <span class="nav-main-link-name">Enquiries</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::routeIs('careerenquiries') ? 'active' : '' }}"
                        href="{{ route('careerenquiries') }}">
                        <i class="nav-main-link-icon fa fa-envelope"></i>
                        <span class="nav-main-link-name">Job Application</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('logout') }}">
                        <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                        <span class="nav-main-link-name">Logout</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    ~
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->

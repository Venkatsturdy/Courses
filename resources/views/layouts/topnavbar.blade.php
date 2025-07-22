
<!-- Header -->
<!--<header id="page-header" class="page-header-light">-->
<header id="page-header" class="sidebarbg4">
    <!-- Header Content -->
    <div class="content-header " >

        <div class="d-flex ">

        <button type="button" class="btn btn-sm btn-dual mr-1 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!--<div class="font-w600 d-flex align-items-center"><h3 class="flex-sm-fill h3 my-1">Title</h3></div>-->

        </div>

        <div class="d-flex align-items-center ">
            <div class="dropdown d-inline-block ml-2 ">
                <button type="button" class="btn btn-sm btn-dual d-flex align-items-center"
                    id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{ asset('assets/media/avatars/avatar0.jpg') }}" alt="Header Avatar"
                        style="width: 21px;">
                    <span class="d-none d-sm-inline-block ml-2">@auth {{Auth::user()->name}} @endauth</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0"
                    aria-labelledby="page-header-user-dropdown ">
                    <div class="p-3 text-center bg-primary-dark rounded-top sidebarbg2" >
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ asset('assets/media/avatars/avatar0.jpg') }}" alt="">
                        <p class="mt-2 mb-0 text-white font-w500">@auth {{Auth::user()->name}} @endauth</p>
                    </div>
                    <div class="p-2">
                        {{-- <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="{{ Route('admin.change_password') }}">
                            <span class="font-size-sm font-w500">Change Password</span>
                        </a> --}}
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="{{ Route('logout') }}">
                            <span class="font-size-sm font-w500">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
</header>

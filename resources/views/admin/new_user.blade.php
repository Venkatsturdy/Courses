@extends('layouts.app')
@section('content')
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

        @include('layouts.topnavbar')
        @include('layouts.sidebar')

        <main id="main-container">
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill h3 my-2">
                            Admin
                        </h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Admin</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a class="link-fx" href="javascript:void(0)">New</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="content">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Add Admin</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="col-lg-8">
                            <form class="mb-5" action="{{ route('admins.store') }}" method="POST"
                                onsubmit="return myValidate();">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Your Name.." required
                                        value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Your Email.." required
                                        value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3" id="show_hide_password">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="pass_log_id" name="password" placeholder="Your Password.." required
                                            value="{{ old('password') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon"><a href="#"><i
                                                        class="fa fa-eye-slash text-secondary"
                                                        aria-hidden="true"></i></a></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <div class="input-group mb-3" id="show_hide_password1">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="re_pass_log_id" name="password_confirmation"
                                                placeholder="Password Confirmation.." required
                                                value="{{ old('password_confirmation') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon"><a href="#"><i
                                                            class="fa fa-eye-slash text-secondary"
                                                            aria-hidden="true"></i></a></span>
                                            </div>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>

    </div>

    <script type="text/javascript">
        function myValidate() {
            var valid1;

            var objemail = document.getElementById('email');
            valid1 = ValidateEmail(objemail);

            if (valid1) {
                var mobile1 = document.getElementById('mobile');
                valid1 = validatemobile1(mobile1);
            }

            return valid1;
        }

        function validatemobile1(inputtxt) {
            var pattern = /^[6,7,8,9][0-9]{0,9}$/;


            if (pattern.test(inputtxt.value)) {
                return true;
            } else {
                //alert("Please enter 10 digits Mobile No.");
                Swal.fire({
                    icon: 'error',
                    title: 'Mobile Input',
                    text: 'Please enter 10 digits Mobile No!'
                })
                document.getElementById('mobile').focus();

                return false;
            }
        }

        function ValidateEmail(mail) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value)) {
                return true;
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Email Input',
                    text: 'You have entered an invalid email address!'
                })

                document.getElementById('email').focus();

                //alert("You have entered an invalid email address!");
                return false;
            }

        }


        //2.
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#pass_log_id");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
            nput.attr('type') === 'password' ? Reinput.attr('type', 'text') : Reinput.attr('type', 'password')
        });

        $(document).on('click', '.toggle-password1', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var Reinput = $("#re_pass_log_id");
            Reinput.attr('type') === 'password' ? Reinput.attr('type', 'text') : Reinput.attr('type', 'password')
        });

        $(function() {

        });
    </script>
@endsection

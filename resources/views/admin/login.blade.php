<style>
    .bgimg {

        /* background: #159957;  fallback for old browsers */
        /* background: -webkit-linear-gradient(to bottom, #3bc9c2, #159957);  Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to bottom, #3b3017, #c0972c);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
</style>
@extends('layouts.app')
@section('content')
    <div id="page-container">
        <main id="main-container">
            <div class="hero-static bgimg d-flex align-items-center">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="block block-rounded block-themed mb-0">
                                <div class="block-header sidebarbg">
                                    <h3 class="block-title">Log In</h3>
                                    <div class="block-options">
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="bg-white-5 text-center" style="">
                                    </div>
                                    <div class="p-sm-3 px-lg-4 py-lg-5">
                                        <h1 class="h2 mb-1">Courses</h1>
                                        @if (session('error'))
                                            <div class="alert alert-danger text-center">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <form class="js-validation-signin" action="{{ route('admin-login') }}"
                                            method="POST" id="frmlogin">
                                            @csrf
                                            @method('POST')
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror"
                                                        id="email" name="email" placeholder="Email"
                                                        value={{ old('email') }}>
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="input-group">
                                                    <input type="password" autocomplete="new-password"
                                                        class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror"
                                                        id="password" name="password" placeholder="Password"
                                                        value="{{ old('password') }}">

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" onclick="togglePassword()"
                                                            style="cursor: pointer;">
                                                            <i class="fa fa-eye" id="toggleIcon"></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror


                                            </div>
                                            <div class="form-group row align-items-center">
                                                <div class="col-md-6 col-xl-6">
                                                    <button type="submit" class="btn btn-block btn-alt-success">
                                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const icon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endsection

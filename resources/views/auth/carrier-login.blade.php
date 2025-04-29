<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Border Haul')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico/') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body class="bg-info-subtle">

    <!-- Begin page -->
    <div class="account-page">
        <div class="p-0 container-fluid min-vh-100 d-flex justify-content-center align-items-center">
            <div class="row w-100 justify-content-center">


                <div class="col-xl-6">
                    <div class="row">
                        <div class="mx-auto col-md-8">
                            <div class="p-3 mb-0 card">
                                <div class="card-body">

                                    <div class="p-0 mb-3 text-center">
                                        <a href="" class="auth-logo">
                                            <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}"
                                                alt="" height="100" width="160" style="margin-top: -25px;">
                                        </a>
                                    </div>
                                    <div class="mb-2 text-center auth-title-section">
                                        {{-- <h3 class="mb-2 text-dark fs-20 fw-medium">Welcome To Border Haul</h3> --}}
                                        <h4 class="mb-0 text-dark text-uppercase" style="font-weight: bold;">Carrier Log
                                            In</h4>

                                    </div>

                                    <div class="pt-0">
                                        <form id="loginForm" method="POST" action="{{ route('carrier.login') }}">
                                            @csrf

                                            <div class="mb-3 form-group">
                                                <label for="emailaddress" class="form-label">Email</label>
                                                <input class="form-control" type="email" id="emailaddress"
                                                    name="email" placeholder="Enter your email">
                                            </div>

                                            <div class="mb-3 form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" id="password"
                                                    name="password" placeholder="Enter your password">
                                            </div>

                                            @include('backend.components.alerts.errors')
                                            <div class="mb-3 form-group d-flex">
                                                <div class="col-sm-6">
                                                    <div class="form-check">

                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-signin" name="remember">
                                                        <label class="form-check-label"
                                                            for="checkbox-signin">{{ __('Remember me') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <a class="text-muted fs-14"
                                                        href="{{ route('password.request') }}">Forgot password?</a>
                                                </div>
                                            </div>


                                            <div class="mb-4 form-group row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type="submit">Sign In</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="text-center text-muted mb-7">
                                            {{-- <p class="mb-1">Don't have an Shipper account ?<a
                                                    class='text-primary ms-2 fw-medium'
                                                    href='{{ route('register') }}'>Create Account</a></p> --}}
                                            <p class="mb-0">Carrier Partner?<a class='text-primary ms-2 fw-medium'
                                                    href='{{ route('carrier.register') }}'>Create Carrier Partner
                                                    Account</a></p>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('backend.components.js-validations.shipper-users.shipper-login') --}}
</body>

</html>

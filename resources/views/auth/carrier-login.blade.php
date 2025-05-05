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
    <div class="bg-white container-fluid d-flex align-items-center justify-content-center">
        <div class="overflow-hidden row rounded-4" style="width: 100%; max-width: 1000px;">

            <!-- Left Column: Login Form -->
            <div class="p-5 col-md-6 d-flex flex-column">
                <div class="mb-4 text-left">
                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
                </div>
                <h4 class="mb-3 text-left text-black text-uppercase fw-bold">Transfer Carrier Log In</h4>


                <form id="loginForm" method="POST" action="{{ route('carrier.login') }}">
                    @csrf

                    <div class="mb-3 form-group">
                        <label for="emailaddress" class="form-label">Email</label>
                        <input class="form-control" type="email" id="emailaddress" name="email"
                            placeholder="Enter your email">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password"
                            placeholder="Enter your password">
                    </div>

                    @include('backend.components.alerts.errors')
                    <div class="mb-3 form-group d-flex">
                        <div class="col-sm-6">
                            <div class="form-check">

                                <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                                <label class="form-check-label" for="checkbox-signin">{{ __('Remember me') }}</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a class="text-muted fs-14" href="{{ route('password.request') }}">Forgot password?</a>
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

                <div class="mt-auto text-center">
                    <p>

                        Transfer Courier Partner?
                        <a href="{{ route('carrier.register') }}" class="text-blue">Create Carrier Partner account</a>
                    </p>
                </div>
            </div>

            <!-- Right Column: Image & Caption -->
            <div class="p-0 col-md-6 d-none d-md-block" style="height: 90vh; margin-top: 40px;">
                <div class="h-100 w-90 position-relative">
                    <img src="{{ asset('assets/carrier/shipper_image.png') }}" alt="World Trade Bridge"
                        class="img-fluid" style="border-radius: 22px; object-fit: cover; height: 100%; width: 80%;">

                    <div class="bottom-0 p-2 m-4 text-white position-absolute start-0"
                        style="
                        background: rgba(0, 0, 0, 0.4);
                        backdrop-filter: blur(2px);
                        border-radius: 10px;
                        max-width: 69%;">
                        <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" style="height: 30px;"
                            class="mb-2">
                        <h5 class="fw-bold">Ship with Confidence.</h5>
                        <p class="mb-0 small">Manage, track, and deliver shipments with powerful tools built for speed,
                            reliability, and control.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- @include('backend.components.js-validations.shipper-users.shipper-login') --}}
</body>

</html>

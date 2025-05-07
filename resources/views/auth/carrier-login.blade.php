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

<body class="bg-white">

 <div class="bg-white container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="mx-2 overflow-hidden row w-100 mx-md-0 rounded-4" style="max-width: 1000px;">

        <!-- Left Column: Login Form -->
        <div class="p-4 col-12 col-md-6 p-md-5 d-flex flex-column justify-content-center">
            <div class="mb-4">
                <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
            </div>

            <h4 class="mb-3 text-black text-uppercase fw-bold">Transfer Carrier Log In</h4>

            <form id="loginForm" method="POST" action="{{ route('carrier.login') }}">
                @csrf

                <div class="mb-3 form-group">
                    <label for="emailaddress" class="form-label">Email</label>
                    <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3 form-group">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                </div>

                @include('backend.components.alerts.errors')

                <div class="flex-wrap mb-3 form-group d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                        <label class="form-check-label" for="checkbox-signin">{{ __('Remember me') }}</label>
                    </div>
                    <a class="mt-2 text-muted fs-14 mt-md-0" href="{{ route('password.request') }}">Forgot password?</a>
                </div>

                <div class="mb-4 form-group row">
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Sign In</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="text-center">
                <p>
                    Transfer Courier Partner?
                    <a href="{{ route('carrier.register') }}" class="text-blue">Create Carrier Partner account</a>
                </p>
            </div>
        </div>


           <div class="mt-4 col-12 col-md-6 d-flex align-items-center justify-content-center mt-md-0" style="padding-right: 50px;">
            <div class="position-relative w-100" style="max-height: 90vh;">
                <img src="{{ asset('assets/carrier/shipper_image.png') }}" alt="World Trade Bridge"
                    class="img-fluid w-100 rounded-4" style="object-fit: cover; max-height: 90vh;">

                <div class="bottom-0 p-3 m-3 text-white position-absolute start-0"
                    style="background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(2px); border-radius: 10px; max-width: 85%;">
                    <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2" style="height: 30px;">
                   <h5 class="fw-bold">Ship with Confidence.</h5>
                    <p class="mb-0 small">Manage, track, and deliver shipments with powerful tools built for speed, reliability, and control.</p>
                </div>
            </div>
        </div>

    </div>
</div>



    {{-- @include('backend.components.js-validations.shipper-users.shipper-login') --}}
</body>

</html>

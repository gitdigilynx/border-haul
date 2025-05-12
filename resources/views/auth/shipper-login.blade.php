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
<style>
    @media (max-width: 767px) {
        /* Adjust the padding on mobile */
        .p-md-5 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        /* Image adjustments for small screens */
        .position-relative img {
            object-fit: cover;
            max-height: 100vh;
        }

        /* Adjust the bottom caption */
        .position-relative .bottom-0 {
            max-width: 100%;
            font-size: 14px;
        }
    }

    @media (max-width: 575px) {
        /* Adjust column widths for extra small screens */
        .col-12 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .text-center {
            text-align: center !important;
        }
    }

      @media (max-width: 375px) {
        /* Adjust column widths for extra small screens */
        .col-12 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .text-center {
            text-align: center !important;
        }
    }
</style>

</head>

<body class="bg-white">


<div class="bg-white container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="overflow-hidden row w-100 rounded-4" style="max-width: 1000px;">

        <!-- Left Column: Login Form -->
        <div class="p-4 col-12 col-md-6 p-md-5 d-flex flex-column justify-content-center">
            <div class="mb-4">
                <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
            </div>

            <h4 class="mb-3 text-black text-uppercase fw-bold">Shipper Log In</h4>

            <form id="loginForm" method="POST" action="{{ route('shipper.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email</label>
                    <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter Email Address" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                @include('backend.components.alerts.errors')

                <div class="flex-wrap mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    {{-- <a href="#" class="mt-2 text-muted mt-md-0">Forgot your password?</a> --}}
                    <a href="{{ route('password.request') }}" class="mt-2 text-muted mt-md-0">Forgot your password?</a>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary w-100" type="submit">Sign in</button>
                </div>
            </form>

            <div class="text-center">
                <p class="mb-1">Don't have a Shipper account?
                    <a href="{{ route('shipper.register') }}" class="text-primary">Create Partner account</a>
                </p>
                <p class="mb-0">Transfer Courier Partner?
                    <a href="{{ url('carrier/register') }}" class="text-primary">Create Carrier Partner account</a>
                </p>
            </div>
        </div>

        <!-- Right Column: Image & Caption -->
        <div class="mt-4 col-12 col-md-6 d-flex align-items-center justify-content-center mt-md-0" style="padding-right: 50px;">
            <div class="position-relative w-100" style="max-height: 90vh;">
                <img src="{{ asset('assets/shipper/shipper_login.png') }}" alt="World Trade Bridge"
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

<!-- Add custom media queries if needed -->


    @include('backend.components.js-validations.shipper-users.shipper-login')
</body>

</html>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

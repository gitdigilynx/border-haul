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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   <link href="https://fonts.cdnfonts.com/css/staatliches" rel="stylesheet">
   <!-- Normalize.css: keeps useful defaults but normalizes the rest -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

<style>
    /* Custom styles for the login page */
    .forgot-pwd {
        text-decoration: none;
        color: #093C7C !important;
        font-family: poppins, sans-serif;
        font-weight: 400;
        font-size: 14px;
        letter-spacing: 0.9px;
    }
    input{
       padding: 16px 30px 16px 30px !important;
        border-radius: 8px !important;
    }
    button{
        padding: 16px 30px 16px 30px !important;
        border-radius: 10px !important;
        font-family: Poppins;
        font-weight: 600;
        font-size: 16px;
    }
    button:hover{
        background-color: #093C7C !important;
    }
    label{
        font-weight: 400 !important;
        font-size: 16px !important;
        color: #202225 !important;
    }
    h4{
        font-weight: 400 !important;
        font-size: 28px !important;
    }
    .custom-font{
        font-family: staatliches;
    }
    .question{
        color: #68696C !important;
    }
    .question a{
        color: #093C7C !important;
    }
    .custom-font2{
        font-family: Plus Jakarta Sans;
        font-weight: 700;
        font-size: 24px;
        line-height: 35px;

    }
    .subline{
        font-family: Poppins, sans-serif;
        font-weight: 400;
        font-size: 18px;
        line-height: 26px;
        letter-spacing: 1.2px;
        word-spacing: 1px;

    }
    .loginbg{
        background: url('{{ asset('assets/shipper/loginNewglob.png') }}') no-repeat top center;
        background-size: cover;
        /* max-height: 100vh; */
        /* width: 100%; */
        border-radius: 0 0 20px 20px;
    }
    .divider {
    display: flex;
    width: 12%;
    align-self: center;
    align-items: center;
    text-align: center;
    margin: 20px 0;
    }
    .divider span {
        font-family: Poppins , sans-serif;
        color: #68696C;
        font-weight: 400;
        font-size: 16px;
    }
    .divider::before,
    .divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #68696C;
    }

    .divider:not(:empty)::before {
    margin-right: 5px;
    }
    .divider:not(:empty)::after {
    margin-left: 5px;
    }
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


<div class="pt-4 pb-4 bg-white container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="overflow-hidden row w-100 rounded-4 justify-content-around" style="/*max-width: 1000px;*/">

        <!-- Left Column: Login Form -->
        <div class="p-4 col-12 col-md-6 pt-md-0 p-md-5 d-flex flex-column ">

            <div class="mb-5 ">
                <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
            </div>
            <h4 class="mb-3 text-black text-uppercase custom-font">Shipper Log In</h4>

            <form id="loginForm" method="POST" action="{{ route('shipper.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="emailaddress" class="form-label custom-font">Email</label>
                    <input class="form-control " type="email" id="emailaddress" name="email" placeholder="Enter Email Address" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label custom-font">Password</label>
                    <input class="form-control " type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                @include('backend.components.alerts.errors')

                <div class="flex-wrap mb-3 d-flex justify-content-between align-items-center">
                    {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div> --}}
                    <a href="#" class="mt-2 text-muted mt-md-0 forgot-pwd">Forgot your password?</a>
                    {{-- <a href="{{ route('password.request') }}" class="mt-2 text-muted mt-md-0">Forgot your password?</a> --}}
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary w-100" type="submit">Sign in</button>
                </div>
            </form>
            <div class="divider">
            <span>or</span>
            </div>
            <div class="text-center">
                <p class="mb-1 question">Don't have a Shipper account?
                    <a href="{{ route('shipper.register') }}" class="text-primary">Create Partner account</a>
                </p>
                <p class="mb-0 question">Transfer Courier Partner?
                    <a href="{{ url('carrier/register') }}" class="text-primary">Create Carrier Partner account</a>
                </p>
            </div>
        </div>

        <!-- Right Column: Image & Caption -->
        <div class="mt-4 col-12 col-md-5 d-flex align-items-end justify-content-center mt-md-0 loginbg" style="/*padding-right: 50px;*/ ">
            {{-- <div class="position-relative w-100" style="/*max-height: 90vh;*/">
                <img src="{{ asset('assets/shipper/loginNewglob.png') }}" alt="World Trade Bridge"
                    class="img-fluid w-100 rounded-4" style="object-fit: contain; max-width:690px;max-height: 800px;"> --}}

                <div class="bottom-0 p-4 m-3 text-white start-0" style="background: linear-gradient(180deg, rgba(106, 106, 106, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);backdrop-filter: blur(16.600000381469727px);border-radius: 10px; max-width: 95%;">
                    <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2" style="height: 30px;">
                    <h5 class="fw-bold custom-font2">Ship with Confidence.</h5>
                    <p class="mb-0 small subline">Manage, track, and deliver shipments with powerful tools built for speed, reliability, and control.</p>
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

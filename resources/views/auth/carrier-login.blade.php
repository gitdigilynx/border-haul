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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/staatliches" rel="stylesheet">
    <!-- Normalize.css: keeps useful defaults but normalizes the rest -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
</head>
<style>
    input,
    select {
        padding: 16px 30px 16px 30px !important;
        border-radius: 8px !important;
    }

    button {
        padding: 16px 30px 16px 30px !important;
        border-radius: 10px !important;
        font-family: Poppins;
        font-weight: 600 !important;
        font-size: 16px !important;
    }

    button:hover {
        background-color: #093C7C !important;
    }

    label {
        font-weight: 400 !important;
        font-size: 16px !important;
        color: #202225 !important;
        font-family: staatliches;
        margin-top: 5px;
    }

    h4 {
        font-weight: 400 !important;
        font-size: 28px !important;
    }

    .custom-font {
        font-family: staatliches;
    }

    .custom-font2 {
        font-family: Plus Jakarta Sans;
        font-weight: 700;
        font-size: 24px;
        line-height: 35px;

    }

    .subline {
        font-family: Poppins, sans-serif;
        font-weight: 400;
        font-size: 18px;
        line-height: 26px;
        letter-spacing: 1.2px;
        word-spacing: 1px;

    }

    .loginbg {
        background: url('{{ asset('assets/carrier/shipper_image.png') }}') no-repeat top center;
        background-size: cover;
        /* max-height: 100vh; */
        /* width: 100%; */
        border-radius: 0 0 20px 20px;
    }

    .question {
        color: #68696C !important;
    }

    .question a {
        color: #093C7C !important;
    }
</style>

<body class="bg-white">

    <div class="bg-white container-fluid d-flex align-items-center justify-content-center min-vh-100">
        <div class="overflow-hidden row w-100 rounded-4 justify-content-around">

            <!-- Left Column: Login Form -->
            <div class="p-4 col-12 col-md-6 pt-md-0 p-md-5 d-flex flex-column">
                <div class="mb-4">
                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
                </div>

                <h4 class="mb-3 text-black text-uppercase fw-bold custom-font">Transfer Carrier Log In</h4>


                @include('backend.components.alerts.errors')


                <form id="loginForm" method="POST" action="{{ route('carrier.login') }}">
                    @csrf

                    <div class="mb-3 form-group">
                        <label for="emailaddress" class="form-label">Email</label>
                        <input class="form-control" type="email" id="emailaddress" name="email"
                            placeholder="Enter your email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password"
                            placeholder="Enter your password">
                    </div>


                    <div class="flex-wrap mb-3 form-group d-flex justify-content-between align-items-center">
                        {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                        <label class="form-check-label" for="checkbox-signin">{{ __('Remember me') }}</label>
                    </div> --}}
                    <a href="{{ route('password.request') }}" class="mt-2 text-muted mt-md-0 forgot-pwd">Forgot your password?</a>
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
                    <p class="mb-0 question">I provide <strong>transport</strong> →
                        <a href="{{ url('carrier/register') }}" class="text-primary">[Create Carrier Account]</a>
                    </p>
                </div>
            </div>

            <!-- Right Column: Image & Caption -->
            <div class="mt-4 col-12 pb-sm-5 col-md-5 d-flex align-items-end justify-content-center mt-md-0 loginbg"
                style="/*padding-right: 50px;*/ ">

                <div class="bottom-0 p-4 m-3 text-white start-0"
                    style="background: linear-gradient(180deg, rgba(106, 106, 106, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);backdrop-filter: blur(16.600000381469727px);border-radius: 10px; max-width: 95%;">
                    <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2"
                        style="height: 30px;">
                    <h5 class="fw-bold custom-font2">Ship with Confidence.</h5>
                    <p class="mb-0 small subline">Manage, track, and deliver shipments with powerful tools built for
                        speed, reliability, and control.</p>
                </div>

            </div>
        </div>
    </div>



    {{-- @include('backend.components.js-validations.shipper-users.shipper-login') --}}
</body>

</html>

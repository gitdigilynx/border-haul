<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register - Border Haul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Register to Border Haul platform." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   <link href="https://fonts.cdnfonts.com/css/staatliches" rel="stylesheet">
    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
        }
        .reg-h4{
            font-weight: 400 !important;
            font-size: 28px;
            line-height: 100%;
            color: #111827 !important;
        }
        input,select{
            padding: 16px 30px 16px 30px !important;
            border-radius: 8px !important;
            }
        button{
            padding: 16px 30px 16px 30px !important;
            border-radius: 10px !important;
            font-family: Poppins;
            font-weight: 600 !important;
            font-size: 16px !important;
        }
        button:hover{
            background-color: #093C7C !important;
        }
        label{
            font-weight: 400 !important;
            font-size: 16px !important;
            color: #202225 !important;
             font-family: staatliches;
        }
        h4{
            font-weight: 400 !important;
            font-size: 28px !important;
        }
        .custom-font{
            font-family: staatliches;
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
    .question{
        color: #68696C !important;
    }
    .question a{
        color: #093C7C !important;
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

<div class="bg-white container-fluid  min-vh-100 pb-4 pt-4">
    <div class="overflow-hidden row justify-content-around" style="/*max-width: 1000px;*/">

        <!-- Left Column: Login Form -->
        <div class="p-4 col-12 col-md-6 pt-md-0 p-md-5 d-flex flex-column ">
            <div class="mb-5">
                <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
            </div>

            <h4 class="mb-3 text-black text-uppercase fw-bold reg-h4 custom-font">Join Us & Ship Smarter</h4>

            <form id="registrationForm" method="POST" action="{{ route('shipper.register') }}" enctype="multipart/form-data">
                @csrf

                <!-- User Type -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="user_type" class="form-label">Shipper Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Company Name">
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Service Category -->
                    <div class="col-md-6">
                        <label for="service_category" class="form-label">Service Category <span class="text-danger">*</span></label>
                        <select name="service_category" id="service_category" class="form-control">
                            <option value="" selected="">Select</option>
                            @foreach (serviceCategory() as $key => $services_category)
                                <option value="{{ $key }}">{{ $services_category }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <!-- Company Name & Address -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="company_address" class="form-label">Company Address <span class="text-danger">*</span></label>
                        <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <!-- Email & Phone -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <!-- Password & Confirm Password -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                </div>
            </form>

            <div class="mt-auto text-center">
                <p class="question">
                    Transfer Courier Partner?
                    <a href="#" class="mb-2 text-primary">Create Carrier Partner account</a>
                </p>
            </div>
        </div>

        <!-- Right Column: Image & Caption -->
        {{-- <div class="col-12 col-md-6 d-flex align-items-center justify-content-center" style=" padding-right: 50px;">
            <div class="position-relative w-100" style="max-height: 100vh;">
                <img src="{{ asset('assets/shipper/shipper_login.png') }}" alt="World Trade Bridge"
                    class="img-fluid w-100 rounded-4" style="object-fit: cover;">

                <div class="bottom-0 p-3 m-3 text-white position-absolute start-0"
                    style="background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(2px); border-radius: 10px; max-width: 85%;">
                    <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2" style="height: 30px;">
                    <h5 class="fw-bold">Ship with Confidence.</h5>
                    <p class="mb-0 small">Manage, track, and deliver shipments with powerful tools built for speed, reliability, and control.</p>
                </div>
            </div>
        </div> --}}
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

{{-- <div class="account-page">
        <div class="p-0 container-fluid">
            <div class="row align-items-center g-0">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="mx-auto col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 mb-0 border-0 p-md-5 p-lg-0">
                                        <div class="p-0 mt-2 mb-2 text-center">
                                            <a href="" class="auth-logo">
                                                <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="" height="90" style="margin-top: -25px;">
                                            </a>
                                        </div>
                                        <div class="text-center auth-title-section">

                                            <h4 class="mb-4 text-dark text-uppercase" style="font-weight: bold;">Shipper Register</h4>
                                        </div>
                                        <div class="pt-0">
                                            <form id="registrationForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                                @csrf

                                                <!-- User Type -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6">
                                                        <label for="user_type" class="form-label">Shipper Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Company Name" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <!-- Service Category -->
                                                    <div class="col-md-6">
                                                        <label for="service_category" class="form-label">Service Category <span class="text-danger">*</span></label>
                                                        <select name="service_category" id="service_category" class="form-control" >
                                                            <option value="" selected="">Select</option>
                                                            @foreach (serviceCategory() as $key => $services_category)
                                                                <option value="{{ $key }}">{{ $services_category }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Company Name & Address -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6">
                                                        <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="company_address" class="form-label">Company Address <span class="text-danger">*</span></label>
                                                        <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Email & Phone -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Password & Confirm Password -->
                                                <div class="mb-3 row">
                                                    <div class="col-md-6">
                                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mb-2 text-center" style="padding: 0 100px; margin-top: 20px;">
                                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                                </div>
                                            </form>

                                            <div class="mt-3 text-center text-muted">
                                                <p class="mb-0">Already have an account?
                                                    <a class="text-primary ms-2 fw-medium" href="{{ route('login') }}">Login here</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<!-- Scripts -->
@include('backend.components.js-validations.shipper-users.shipper-register')

</body>
</html>


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

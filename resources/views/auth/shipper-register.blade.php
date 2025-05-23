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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/staatliches" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />

 

<style>
.intl-tel-input {
    position: relative;
    display: inline-block;
    width: 100%;
}

.intl-tel-input .flag-container {
    position: absolute;
    right: 10px;
    left: auto !important;
    top: 50%;
    transform: translateY(-50%);
}

.intl-tel-input input {
    padding-right: 60px;
    padding-left: 10px;
    direction: ltr;
}

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
        }

        .password-rules li.valid {
            color: #198754;
            /* Green */
        }

        .password-rules li.invalid {
            color: #dc3545;
            /* Red */
        }

        .pwd {
            background-image: none !important;
        }

        .reg-h4 {
            font-weight: 400 !important;
            font-size: 28px;
            line-height: 100%;
            color: #111827 !important;
        }

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
            background: url('{{ asset('assets/shipper/loginNewglob.png') }}') no-repeat top center;
            background-size: cover;
            /* max-height: 100vh; */
            /* width: 100%; */
            border-radius: 20px 20px 20px 20px;
        }

        .question {
            color: #68696C !important;
        }

        .question a {
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

<div class="pt-4 pb-4 bg-white container-fluid min-vh-100">
    <div class="overflow-hidden row justify-content-around" style="/*max-width: 1000px;*/">

        <!-- Left Column: Login Form -->
        <div class="p-4 col-12 col-md-6 pt-md-0 p-md-5 d-flex flex-column ">
            <div class="mb-5">
                <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
            </div>

            <h4 class="mb-3 text-black text-uppercase fw-bold reg-h4 custom-font">Join Us & Ship Smarter</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="registrationForm" method="POST" action="{{ route('shipper.register') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="service_category" class="form-label">Shipper Category <span class="text-danger">*</span></label>
                        <select name="service_category" id="service_category"
                            class="form-control @error('service_category') is-invalid @enderror" required>
                            <option value="">Select your company type</option>
                            @foreach (serviceCategoryRegister() as $key => $services_category)
                                <option value="{{ $key }}"
                                    {{ old('service_category') == $key ? 'selected' : '' }}>
                                    {{ $services_category }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>

                {{-- Company Info --}}
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="company_name" class="form-label">Company Name <span
                                class="text-danger">*</span></label>
                        <input type="text" name="company_name" id="company_name"
                            class="form-control @error('company_name') is-invalid @enderror" placeholder="Company Name"
                            value="{{ old('company_name') }}">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="street_address" class="form-label">Street Address <span
                                class="text-danger">*</span></label>
                        <input type="text" name="street_address" id="street_address"
                            class="form-control @error('street_address') is-invalid @enderror"
                            placeholder="Street Address" value="{{ old('street_address') }}">
                        @error('street_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" name="city" id="city"
                            class="form-control @error('city') is-invalid @enderror" placeholder="Company City"
                            value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="company_state" class="form-label">State/Province <span
                                class="text-danger">*</span></label>
                        <input type="text" name="company_state" id="company_state"
                            class="form-control @error('company_state') is-invalid @enderror"
                            placeholder="Company State" value="{{ old('company_state') }}">
                        @error('company_state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="company_zip_code" class="form-label">Zip/Postal Code <span
                                class="text-danger">*</span></label>
                        <input type="text" name="company_zip_code" id="company_zip_code"
                            class="form-control @error('company_zip_code') is-invalid @enderror"
                            placeholder="Company Zip" value="{{ old('company_zip_code') }}">
                        @error('company_zip_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="email" 
                            id="email"
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Email Address"
                            value="{{ old('email') }}"
                            pattern="^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$"
                            required
                            oninput="validateEmail(this)"
                        >
                        <div id="emailError" class="invalid-feedback d-none">
                            Please enter a valid email address (e.g., user@example.com).
                        </div>
                        
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                </div>

                {{-- Contact Info --}}
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="company_country" class="form-label">Country <span class="text-danger">*</span></label>
                        <select name="company_country" id="company_country" class="form-control">
                            <option>Select Country </option>
                            <option value="US">U.S.</option>
                            <option value="Mexico">Mexico</option>
                        </select>
                      
                    </div>
                
                    <div class="mb-2 col-md-6">
                        <label for="office_phone" class="form-label">Office Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" name="office_phone" id="office_phone" class="form-control" placeholder="+1 (956) 222-4567">
                        
                        <div id="office-phone-error" class="text-danger" style="display:none;"></div>
                    </div>
                
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Cell Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                        <div id="phone-error" class="text-danger" style="display:none;"></div>
                    </div>
                </div>
                

                {{-- Passwords --}}
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror pwd"
                                placeholder="Password">
                            <span class="toggle-password" toggle="#password"
                                style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <ul class="mt-2 mb-0 password-rules text-muted small ps-3" id="passwordRules">
                            <li class="rule-length">Minimum 8 characters</li>
                            <li class="rule-uppercase">At least 1 uppercase letter</li>
                            <li class="rule-lowercase">At least 1 lowercase letter</li>
                            <li class="rule-number">At least 1 number</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password <span
                                class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror pwd"
                                placeholder="Confirm Password">
                            <span class="toggle-password" toggle="#password_confirmation"
                                style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="mt-1 text-danger small" id="mismatchError" style="display:none;">Passwords do
                            not match</div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                </div>
            </form>


            <div class="mt-auto text-center">
                <p class="mb-1 question">I need to <strong>ship</strong> goods →
                    <a href="{{ route('shipper.register') }}" class="text-primary">[Create Shipper Account]</a>
                </p>
            </div>
        </div>


        <!-- Right Column: Image & Caption -->
        <div class="mt-4 col-12 col-md-5 d-flex align-items-end justify-content-center mt-md-0 loginbg"
            style="/*padding-right: 50px;*/ ">

            <div class="bottom-0 p-4 m-3 text-white start-0"
                style="background: linear-gradient(180deg, rgba(106, 106, 106, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);backdrop-filter: blur(16.600000381469727px);border-radius: 10px; max-width: 95%;">
                <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2"
                    style="height: 30px;">
                <h5 class="fw-bold custom-font2">Ship with Confidence.</h5>
                <p class="mb-0 small subline">Manage, track, and deliver shipments with powerful tools built for speed,
                    reliability, and control.</p>
            </div>

        </div>
    </div>
</div>
@include('backend.components.js-validations.shipper-users.shipper-register')

<script>
    function validateEmail(input) {
        const regex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
        const errorDiv = document.getElementById('emailError');
    
        if (!regex.test(input.value)) {
            input.classList.add('is-invalid');
            errorDiv.classList.remove('d-none');
        } else {
            input.classList.remove('is-invalid');
            errorDiv.classList.add('d-none');
        }
    }
    </script>
    
    
    
</body>

</html>

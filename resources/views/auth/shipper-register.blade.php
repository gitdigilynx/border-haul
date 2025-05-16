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

    <style>
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
                        <label for="service_category" class="form-label">Service Category <span
                                class="text-danger">*</span></label>
                        <select name="service_category" id="service_category"
                            class="form-control @error('service_category') is-invalid @enderror">
                            <option value="" disabled {{ old('service_category') ? '' : 'selected' }}>Select
                                service type</option>
                            @foreach (serviceCategory() as $key => $services_category)
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
                        <label for="company_country" class="form-label">Country <span
                                class="text-danger">*</span></label>
                        <select name="company_country" id="company_country"
                            class="form-control @error('company_country') is-invalid @enderror">
                            <option value="" disabled {{ old('company_country') ? '' : 'selected' }}>Select
                                Company Country</option>
                            <option value="US" {{ old('company_country') == 'US' ? 'selected' : '' }}>U.S.
                            </option>
                            <option value="Mexico" {{ old('company_country') == 'Mexico' ? 'selected' : '' }}>Mexico
                            </option>
                        </select>
                        @error('company_country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Contact Info --}}
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address <span
                                class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="office_phone" class="form-label">Office Phone Number<span
                                class="text-danger">*</span></label>
                        <input type="tel" name="office_phone" id="office_phone"
                            class="form-control @error('office_phone') is-invalid @enderror"
                            placeholder="+1 (956) 222-4567" value="{{ old('office_phone') }}">
                        @error('office_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">Cell Phone Number<span
                                class="text-danger">*</span></label>
                        <input type="tel" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Enter Phone Number" value="{{ old('phone') }}">
                        <div id="phone-error" style="color: red; display: none; font-size: 12px;">Invalid phone
                            number format</div>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

</body>
<script>
    document.querySelectorAll('.toggle-password').forEach(function(element) {
        element.addEventListener('click', function() {
            const input = document.querySelector(this.getAttribute('toggle'));
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });


    $(document).ready(function() {
        // Event bindings
        $('#phone').on('input blur', function() {
            validatePhone();
        });

        $('#company_country').on('change', function() {
            $('#phone').val('');
            $('#phone-error').hide();
            updatePhonePlaceholder();
        });

        $('form').on('submit', function(e) {
            if (!validatePhone()) {
                e.preventDefault();
            }
        });

        // Validate phone number
        function validatePhone() {
            const phone = $('#phone').val().trim();
            const country = $('#company_country').val();
            let isValid = false;

            if (phone.length > 17) {
                $('#phone-error').text('Maximum 17 characters allowed.').show();
                return false;
            }

            if (country === 'US') {
                // Strict US phone format
                const usPattern = /^(\+1\s?)?(\(?\d{3}\)?[\s.-]?)\d{3}[\s.-]?\d{4}$/;
                isValid = usPattern.test(phone);
            } else if (country === 'Mexico') {
                // Strict Mexico formats (international or local)
                const mxPattern = /^(\+52\s?1?\s?\d{2}\s?\d{4}\s?\d{4})$|^(\d{2}-\d{4}-\d{4})$/;
                isValid = mxPattern.test(phone);
            }

            if (!isValid) {
                $('#phone-error').text('Invalid phone number format.').show();
            } else {
                $('#phone-error').hide();
            }

            return isValid;
        }

        // Update phone placeholder dynamically
        function updatePhonePlaceholder() {
            const country = $('#company_country').val();
            let placeholder = '';

            if (country === 'US') {
                placeholder = '+1 (555) 123-4567';
            } else if (country === 'Mexico') {
                placeholder = '+52 1 55 1234 5678';
            }

            $('#phone').attr('placeholder', placeholder);
        }
        const $password = $('#password');
        const $confirm = $('#password_confirmation');
        const $form = $('form');

        // Set required attributes just in case
        $password.attr('required', true);
        $confirm.attr('required', true);

        // Validate password rules
        function validatePasswordRules(password) {
            return {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password)
            };
        }

        function updatePasswordRulesUI(rules) {
            $('#passwordRules .rule-length').toggleClass('valid', rules.length).toggleClass('invalid', !rules
                .length);
            $('#passwordRules .rule-uppercase').toggleClass('valid', rules.uppercase).toggleClass('invalid', !
                rules.uppercase);
            $('#passwordRules .rule-lowercase').toggleClass('valid', rules.lowercase).toggleClass('invalid', !
                rules.lowercase);
            $('#passwordRules .rule-number').toggleClass('valid', rules.number).toggleClass('invalid', !rules
                .number);
        }

        function checkPasswordMatch() {
            const password = $password.val();
            const confirm = $confirm.val();

            if (confirm.length > 0) {
                if (password === confirm) {
                    $confirm.removeClass('invalid').addClass('valid');
                    $('#mismatchError').hide();
                    return true;
                } else {
                    $confirm.removeClass('valid').addClass('invalid');
                    $('#mismatchError').show();
                    return false;
                }
            } else {
                $confirm.removeClass('valid invalid');
                $('#mismatchError').hide();
                return false;
            }
        }

        $password.on('input', function() {
            const rules = validatePasswordRules($(this).val());
            updatePasswordRulesUI(rules);
        });

        $password.add($confirm).on('input', function() {
            checkPasswordMatch();
        });

        // Block form submission if validation fails (protects even if required is removed)
        $form.on('submit', function(e) {
            const password = $password.val();
            const confirm = $confirm.val();

            const rules = validatePasswordRules(password);
            const allValid = rules.length && rules.uppercase && rules.lowercase && rules.number;
            const match = password === confirm;

            if (!password || !confirm || !allValid || !match || !validatePhone()) {
                e.preventDefault(); // prevent submission
                $password[0].reportValidity(); // show browser prompt for empty
                $confirm[0].reportValidity(); // show browser prompt for empty
            }
        });
    });

    function checkPasswordMatch() {
        const password = $('#password').val();
        const confirm = $('#password_confirmation').val();

        if (confirm.length > 0) {
            if (password === confirm) {
                $('#password_confirmation').removeClass('invalid').addClass('valid');
                $('#mismatchError').hide();
            } else {
                $('#password_confirmation').removeClass('valid').addClass('invalid');
                $('#mismatchError').show();
            }
        } else {
            $('#password_confirmation').removeClass('valid invalid');
            $('#mismatchError').hide();
        }
    }

    $('#password, #password_confirmation').on('input', function() {
        console.log('run file');

        checkPasswordMatch(); // Live check for matching
    });
</script>

</html>

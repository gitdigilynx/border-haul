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
    <!-- Normalize.css: keeps useful defaults but normalizes the rest -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
        }

        .reg-h4 {
            font-weight: 400 !important;
            font-size: 28px;
            line-height: 100%;
            color: #111827 !important;
        }

        .cutom-vaidation {
            background-image: none !important
        }

        .password-rules li.valid {
            color: #198754;
            /* Green */
        }

        .password-rules li.invalid {
            color: #dc3545;
            /* Red */
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
            border-radius: 20px 20px 20px 20px;
        }

        .question {
            color: #68696C !important;
        }

        .question a {
            color: #093C7C !important;
        }
    </style>
</head>

<div class="bg-white">
    <div class="container-fluid justify-content-center ">
        <div class="pt-4 pb-4 overflow-hidden row rounded-4 justify-content-around">

            <!-- Left Column: Login Form -->
            <div class=" col-md-6 d-flex flex-column">
                <div class="mb-5 text-left">
                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Logo" height="70">
                </div>
                <h4 class="mb-3 text-left text-black text-uppercase fw-bold custom-font">Transfer Carrier Sign up</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="registrationCarrier" method="POST" action="{{ route('carrier.register') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Authority & DOT -->
                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Full Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Company Name" value="{{ old('name') }}">
                            <div class="invalid-feedback"></div>
                        </div>


                        <div class="col-md-4">
                            <label for="name" class="form-label">Company Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="company_name" id="company_name" class="form-control"
                                placeholder="Company Name" value="{{ old('company_name') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="company_address" class="form-label">Company Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="company_address" id="company_address" class="form-control"
                                placeholder="Company Address" value="{{ old('company_address') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}">
                            <div class="invalid-feedback"></div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-4">
                                                        <label for="country" class="form-label">Country <span
                                    class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control" required>
                                <option value="">Select Country</option>
                                <option value="us" {{ old('mexico') == 'us' ? 'selected' : '' }}>US</option>
                                <option value="mexico" {{ old('mexico') == 'mexico' ? 'selected' : '' }}>Mexico
                                </option>
                            </select>
                            <div class="invalid-feedback">Please select a country.</div>

                        </div>
                        <div class="col-md-4">
                                 <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Phone" value="{{ old('phone') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="authority" class="form-label">Authority <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="authority" id="authority" class="form-control"
                                placeholder="Authority" value="{{ old('authority') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="mc" class="form-label">MC <span class="text-danger">*</span></label>
                            <input type="text" name="mc" id="mc" class="form-control"
                                placeholder="MC" value="{{ old('mc') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="scac_code" class="form-label">SCAC Code <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="scac_code" id="scac_code" class="form-control"
                                placeholder="SCAC Code" value="{{ old('scac_code') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="service_category" class="form-label">Service Category <span
                                    class="text-danger">*</span></label>
                            <select name="service_category" id="service_category" class="form-control">
                                <option value="">Select Company</option>
                                @foreach (serviceCategory() as $key => $services_category)
                                    <option value="{{ $key }}"
                                        {{ old('service_category') == $key ? 'selected' : '' }}>
                                        {{ $services_category }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="caat_code" class="form-label">CAAT Code <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="caat_code" id="caat_code" class="form-control"
                                placeholder="CAAT Code" value="{{ old('caat_code') }}">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-md-4">
                            <label for="transfer_approval_documents" class="form-label">Transfer Approval Document
                                <span class="text-danger">*</span></label>
                            <input type="file" name="transfer_approval_documents" id="transfer_approval_documents"
                                class="form-control cutom-vaidation" accept="application/pdf,image/jpeg">
                            <small id="transfer_approval_help" class="form-text text-muted">PDF,DOCX,PNG or JPG only. Max
                                10MB.</small>
                            <div id="transfer_approval_error" class="text-danger" style="display: none;">Invalid
                                file. Please upload a PDF,DOCX,PNG or JPG less than 10MB.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="insurance_certificate" class="form-label">Insurance Certificate <span
                                    class="text-danger">*</span></label>
                            <input type="file" name="insurance_certificate" id="insurance_certificate"
                                class="form-control cutom-vaidation" accept="application/pdf,image/jpeg">
                            <small id="insurance_certificate_help" class="form-text text-muted">PDF,DOCX,PNG or JPG only. Max
                                10MB.</small>
                            <div id="insurance_certificate_error" class="text-danger" style="display: none;">Invalid
                                file. Please upload a PDF,DOCX,PNG or JPG less than 10MB.</div>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="dot" class="form-label">DOT <span class="text-danger">*</span></label>
                            <input type="text" name="dot" id="dot" class="form-control"
                                placeholder="DOT" value="{{ old('dot') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Password <span
                                    class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password" id="password"
                                    class="form-control cutom-vaidation" placeholder="Password" required>
                                <span class="toggle-password" toggle="#password"
                                    style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            <ul class="mt-2 mb-0 password-rules text-muted small ps-3" id="passwordRules">
                                <li class="rule-length">Minimum 8 characters</li>
                                <li class="rule-uppercase">At least 1 uppercase letter</li>
                                <li class="rule-lowercase">At least 1 lowercase letter</li>
                                <li class="rule-number">At least 1 number</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <label for="password_confirmation" class="form-label">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control cutom-vaidation" placeholder="Confirm Password" required>
                                <span class="toggle-password" toggle="#password_confirmation"
                                    style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="mt-1 text-danger small" id="mismatchError" style="display:none;">Passwords do
                                not match</div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 text-center" style="padding: 0 100px; margin-top: 20px;">
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>
                </form>

                <div class="mb-3 text-center text-muted">
                    <p class="mb-0 question">Already have an account?
                        <a class="text-primary ms-2 fw-medium" href="{{ route('carrier.login') }}">Login here</a>
                    </p>
                </div>
            </div>


            <div class="mt-4 col-12 pb-sm-5 col-md-5 d-flex align-items-end justify-content-center mt-md-0 loginbg"
                style="/padding-right: 50px;/ ">


                <div class="bottom-0 p-4 m-3 text-white start-0"
                    style="background: linear-gradient(180deg, rgba(106, 106, 106, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);backdrop-filter: blur(16.600000381469727px);border-radius: 10px; max-width: 95%;">
                    <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2"
                        style="height: 30px;">
                    <h5 class="fw-bold custom-font2">Ship with Confidence.</h5>
                    <p class="mb-0 small subline">Manage, track, and deliver shipments with powerful tools built for
                        speed, reliability, and control.</p>
                </div>

            </div>
            <div class="extra"></div>
        </div>
    </div>
</div>

@include('backend.components.js-validations.carrier.carrier-register')

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

        function validatePasswordRules(password) {
            return {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password)
            };
        }

        $('#password').on('input', function() {
            const password = $(this).val();
            const rules = validatePasswordRules(password);

            // Apply styles based on rules
            $('#passwordRules .rule-length').toggleClass('valid', rules.length).toggleClass('invalid', !
                rules.length);
            $('#passwordRules .rule-uppercase').toggleClass('valid', rules.uppercase).toggleClass(
                'invalid', !rules.uppercase);
            $('#passwordRules .rule-lowercase').toggleClass('valid', rules.lowercase).toggleClass(
                'invalid', !rules.lowercase);
            $('#passwordRules .rule-number').toggleClass('valid', rules.number).toggleClass('invalid', !
                rules.number);
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
        checkPasswordMatch(); // Live check for matching
    });



// countries base validation on phone numbers

$(document).ready(function () {
    function validateFile(inputId, errorId, required = false) {
        const fileInput = $('#' + inputId)[0];
        const errorMessage = $('#' + errorId);
        const file = fileInput.files[0];

        if (!file) {
            if (required) {
                errorMessage.text("This file is required.").show();
                return false;
            } else {
                errorMessage.hide();
                return true;
            }
        }

        const allowedTypes = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/jpg', 'image/png'];
        if (!allowedTypes.includes(file.type)) {
            errorMessage.text("Invalid file type. Only PDF and JPG are allowed.").show();
            return false;
        }

        const maxSize = 10 * 1024 * 1024; // 10MB
        if (file.size > maxSize) {
            errorMessage.text("File is too large. Maximum size is 10MB.").show();
            return false;
        }

        errorMessage.hide();
        return true;
    }

    // Trigger validation on file input change
    $('#transfer_approval_documents').on('change', function () {
        validateFile('transfer_approval_documents', 'transfer_approval_error', true);
    });

    $('#insurance_certificate').on('change', function () {
        validateFile('insurance_certificate', 'insurance_certificate_error', true);
    });

    // Block form submission if invalid
    $('#registrationCarrier').on('submit', function (e) {
        const isTransferValid = validateFile('transfer_approval_documents', 'transfer_approval_error', true);
        const isInsuranceValid = validateFile('insurance_certificate', 'insurance_certificate_error', true);

        if (!isTransferValid || !isInsuranceValid) {
            e.preventDefault(); // Prevent form from submitting
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country');
    const phoneInput = document.getElementById('phone');
    const phoneError = phoneInput.nextElementSibling;

    const patterns = {
        us: [
            /^\d{3}-\d{3}-\d{4}$/,                    // 123-456-7890
            /^\(\d{3}\)\s?\d{3}-\d{4}$/,              // (123) 456-7890
            /^\d{3}\.\d{3}\.\d{4}$/,                  // 123.456.7890
            /^\+1\s\d{3}\s\d{3}\s\d{4}$/,             // +1 123 456 7890
            /^\+1\d{10}$/,                            // +11234567890
            /^\+1\s\(\d{3}\)\s\d{3}-\d{4}$/           // +1 (123) 456-7890
        ],
        mexico: [
            /^\d{2}-\d{4}-\d{4}$/,                    // 55-1234-5678
            /^\+52\s1\s\d{2}\s\d{4}\s\d{4}$/,         // +52 1 55 1234 5678
            /^\+52\s\d{2}\s\d{4}\s\d{4}$/,            // +52 55 1234 5678
            /^\+521\d{8}$/,                           // +5215512345678
            /^\+5255\d{8}$/                           // +525512345678
        ]
    };

    const examples = {
        us: [
            '123-456-7890',
            '(123) 456-7890',
            '+1 (123) 456-7890'
        ],
        mexico: [
            '55-1234-5678',
            '+52 1 55 1234 5678',

        ]
    };

    function validatePhone() {
        const country = countrySelect.value;
        const value = phoneInput.value.trim();
        const validPatterns = patterns[country] || [];

        const isValid = validPatterns.some(pattern => pattern.test(value));

        if (!isValid && country) {
            phoneInput.classList.add('is-invalid');
            phoneError.innerHTML = `Invalid phone format for ${country.toUpperCase()}.<br>Examples:<br>${examples[country].join('<br>')}`;
            phoneError.style.display = 'block';
        } else {
            phoneInput.classList.remove('is-invalid');
            phoneError.innerHTML = '';
            phoneError.style.display = 'none';
        }
    }

    function updatePlaceholder() {
        const country = countrySelect.value;
        if (examples[country]) {
            phoneInput.placeholder = `e.g., ${examples[country][0]}`;
        } else {
            phoneInput.placeholder = 'Phone';
        }
    }

    countrySelect.addEventListener('change', () => {
        updatePlaceholder();
        validatePhone();
    });

    phoneInput.addEventListener('input', validatePhone);

    // Initial load
    updatePlaceholder();
    validatePhone();
});

</script>

</html>

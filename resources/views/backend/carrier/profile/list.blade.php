@extends('layouts.backend.master')
@section('title', 'Profile')
@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">Profile</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="pt-0 card-body">
                                <ul class="pt-2 nav nav-underline border-bottom" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="p-2 nav-link active" id="profile_about_tab" data-bs-toggle="tab"
                                            href="#profile_about" role="tab">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                            <span class="table-card-heading">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-2 nav-link" id="profile_setting_tab" data-bs-toggle="tab"
                                            href="#profile_setting" role="tab">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-sitemap-outline"></i></span>
                                            <span class="table-card-heading">Setting</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="bg-white tab-content text-muted">

                                    <div class="pt-4 tab-pane fade show active" id="profile_about" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="border card">
                                                    <div class="card-header">
                                                        <h4 class="table-card">Personal Information</h4>
                                                    </div>
                                                    <form method="post" id="carrierForm"
                                                        action="{{ route('carrier.profile.update', Auth::user()->id) }}">
                                                        @csrf
                                                        <div class="card-body custom-modal modal-title">
                                                            <div class="row">

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Full Name <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="name" value="{{ Auth::user()->name }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Company Name <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="company_name"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->company_name : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="tel" name="phone" id="phone"
                                                                        placeholder="Enter Phone Number"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->phone : '' }}">
                                                                        <small id="phone-error" class="text-danger" style="display:none;">Invalid phone number format.</small>
                                                                </div>


                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Company Address <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="company_address"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->company_address : '' }}">
                                                                </div>


                                                                <div class="mb-3 col-lg-6">
                                                                    <label for="service_category" class="form-label">Service
                                                                        Category <span class="text-danger">*</span></label>
                                                                    <select name="service_category" id="service_category"
                                                                        class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach (serviceCategory() as $key => $services_category)
                                                                            <option value="{{ $key }}"
                                                                                {{ Auth::user()->carrier->service_category == $key ? 'selected' : '' }}>
                                                                                {{ $services_category }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback"></div>
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label for="country" class="form-label">Country <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="country" id="country"
                                                                        class="form-control" required>
                                                                        <option value="">Select Country</option>
                                                                        <option value="us"
                                                                            {{ Auth::user()->carrier->country == 'us' ? 'selected' : '' }}>
                                                                            US</option>
                                                                        <option value="mexico"
                                                                            {{ Auth::user()->carrier->country == 'mexico' ? 'selected' : '' }}>
                                                                            Mexico
                                                                        </option>
                                                                    </select>
                                                                    <div class="invalid-feedback">Please select a country.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Authority <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="authority"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->authority : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">DOT <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="dot"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->dot : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">MC <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="number"
                                                                        name="mc"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->mc : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">SCAC Code <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="number"
                                                                        name="scac_code"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->scac_code : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">CAAT Code <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="caat_code"
                                                                        value="{{ Auth::user()->role == 'Carrier' ? Auth::user()->carrier->caat_code : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Email Address</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"><i
                                                                                class="mdi mdi-email"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            name="email" value="{{ Auth::user()->email }}"
                                                                            disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Transfer Approval Documents</label>

                                                                    <div class="mb-2">
                                                                        <a href="{{ asset('storage/' . (Auth::user()->role == 'Carrier' ? Auth::user()->carrier->transfer_approval_documents : '')) }}" target="_blank" class="btn btn-sm btn-info">
                                                                            View File
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Insurance Certificate</label>

                                                                    <div class="mb-2">
                                                                        <a href="{{ asset('storage/' . (Auth::user()->role == 'Carrier' ? Auth::user()->carrier->insurance_certificate : '')) }}" target="_blank" class="btn btn-sm btn-info">
                                                                            View File
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="text-left col-lg-12">
                                                                    <button type="submit" class="submit-btn-profile">Update Profile</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Setting Tab -->
                                    <div class="pt-4 tab-pane fade" id="profile_setting" role="tabpanel">
                                        <div class="d-flex justify-content-center"> <!-- Center content -->
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="mb-0 border card">
                                                    <div class="card-header">
                                                        <h4 class="table-card">Change Password</h4>
                                                    </div>
                                                    <form id="updatePasswordForm" method="post" action="{{ route('password.update') }}">
                                                        @csrf
                                                        @method('put')
                                                        <div class="card-body custom-modal">
                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">Old Password</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="password" id="current_password"
                                                                        name="current_password"
                                                                        placeholder="Old Password">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <div class="mb-2 col-md-12">
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

                                                                </div>

                                                                <div class="col-md-12">
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

                                                            <div class="form-group row">
                                                                <div class="text-left col-lg-12 col-xl-12">
                                                                    <button type="submit" class="submit-btn">Change Password</button>
                                                                </div>
                                                            </div>
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


            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>

    <script>
        $(document).ready(function () {
            const formattedUsMexicoRegex = /^(\+1\s?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}|\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}|\+52\s?1?\s?\d{2,3}\s\d{3,4}\s\d{4})$/;

            $('#phone').on('input', function () {
                const phone = $(this).val().trim();

                if (formattedUsMexicoRegex.test(phone)) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    $('#phone-error').hide();
                } else {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    $('#phone-error').show();
                }
            });
        });
    </script>


    <script>
        $("#carrierForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            company_name: {
                required: true,
                maxlength: 50
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 20
            },
            service_category: {
                required: true
            },
            company_address: {
                required: true,
                minlength: 1,
                maxlength: 50
            },
            authority: {
                required: true,
                minlength: 1,
                maxlength: 50
            },
            dot: {
                required: true,
                minlength: 1,
                maxlength: 20
            },
            mc: {
                required: true,
                maxlength: 10
            },
            scac_code: {
                required: true,
                minlength: 1,
                number: true
            },
            caat_code: {
                required: true,
                minlength: 1,
                maxlength: 20
            },
            country: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Full Name is required",
                minlength: "Full Name must be at least 2 characters",
                maxlength: "Full Name must be at most 50 characters"
            },
            company_name: {
                required: "Company Name is required",
                maxlength: "Company Name must be at most 50 characters"
            },
            office_phone: {
                required: "Phone Number is required",
                maxlength: "Must be at most 17 characters"
            },
            service_category: {
                required: "Service Category is required"
            },
            company_address: {
                required: "Company Address is required",
                maxlength: "Company Address must be at most 100 characters"
            },
            authority: {
                required: "Authority is required",
                maxlength: "Authority must be at most 50 characters"
            },
            dot: {
                required: "DOT is required",
                maxlength: "DOT must be at most 20 characters"
            },
            mc: {
                required: "MC is required",
                maxlength: "MC must be at most 20 characters"
            },
            scac_code: {
                required: "SCAC Code is required",
                number: "SCAC Code must be numeric"
            },
            caat_code: {
                required: "CAAT Code is required",
                maxlength: "CAAT Code must be at most 20 characters"
            },
            country: {
                required: "Please select a country"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    </script>



<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function (element) {
        element.addEventListener('click', function () {
            const target = document.querySelector(this.getAttribute('toggle'));
            const icon = this.querySelector('i');

            if (target.type === 'password') {
                target.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                target.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    });

    const $password = $('#password');
    const $confirm = $('#password_confirmation');
    const $form = $('#updatePasswordForm');

    function validatePasswordRules(password) {
        return {
            length: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password)
        };
    }

    function updatePasswordRulesUI(rules) {
        $('#passwordRules .rule-length').toggleClass('valid', rules.length).toggleClass('invalid', !rules.length);
        $('#passwordRules .rule-uppercase').toggleClass('valid', rules.uppercase).toggleClass('invalid', !rules.uppercase);
        $('#passwordRules .rule-lowercase').toggleClass('valid', rules.lowercase).toggleClass('invalid', !rules.lowercase);
        $('#passwordRules .rule-number').toggleClass('valid', rules.number).toggleClass('invalid', !rules.number);
    }

    function checkPasswordMatch() {
        const password = $password.val();
        const confirm = $confirm.val();

        if (confirm.length > 0) {
            if (password === confirm) {
                $confirm.removeClass('is-invalid').addClass('is-valid');
                $('#mismatchError').hide();
                return true;
            } else {
                $confirm.removeClass('is-valid').addClass('is-invalid');
                $('#mismatchError').show();
                return false;
            }
        } else {
            $confirm.removeClass('is-valid is-invalid');
            $('#mismatchError').hide();
            return false;
        }
    }

    $password.on('input', function () {
        const rules = validatePasswordRules($(this).val());
        updatePasswordRulesUI(rules);
        checkPasswordMatch();
    });

    $confirm.on('input', function () {
        checkPasswordMatch();
    });

    // Add jQuery Validation password rules
    $.validator.addMethod("pwcheck", function (value) {
        return /[A-Z]/.test(value) && /[a-z]/.test(value) && /[0-9]/.test(value);
    });

    $form.validate({
        rules: {
            current_password: {
                required: true,
                minlength: 6
            },
            password: {
                required: true,
                minlength: 8,
                pwcheck: true
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            current_password: {
                required: "Old Password is required",
                minlength: "Old Password must be at least 6 characters"
            },
            password: {
                required: "New Password is required",
                minlength: "Password must be at least 8 characters",
                pwcheck: "Password must include 1 uppercase, 1 lowercase, and 1 number"
            },

        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group, .mb-3, .col-md-12').append(error);
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
</script>


</script>
@endsection

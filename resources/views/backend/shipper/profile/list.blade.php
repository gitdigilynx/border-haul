@extends('layouts.backend.master')
@section('title', 'Profile')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">PROFILE</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="pt-0 card-body">
                                <ul class="pt-2 nav nav-underline border-bottom" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="p-2 nav-link active" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                            <span class="table-card-heading">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-2 nav-link" id="profile_setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab">
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
                                                    <div class="card-header ">
                                                        <h4 class="table-card">Personal Information</h4>
                                                    </div>
                                                    <form id="shipperForm" method="post" action="{{ route('shipper.profile.update', Auth::user()->id) }}">
                                                        @csrf

                                                        <div class="card-body custom-modal modal-title">
                                                            <div class="row">

                                                                <div class="mb-3 col-md-6">
                                                                    <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                                </div>

                                                            @php
                                                                $selectedCategory = old('service_category') ?? (Auth::user()->role == 'Shipper' ? Auth::user()->shipper->service_category : '');
                                                            @endphp

                                                            <div class="col-md-6">
                                                                <label for="service_category" class="form-label">
                                                                    Service Category <span class="text-danger">*</span>
                                                                </label>

                                                                <select name="service_category" id="service_category"
                                                                    class="form-control @error('service_category') is-invalid @enderror">

                                                                    <option value="" disabled {{ $selectedCategory ? '' : 'selected' }}>
                                                                        Select service type
                                                                    </option>

                                                                    @foreach (serviceCategory() as $key => $services_category)
                                                                        <option value="{{ $key }}" {{ $selectedCategory == $key ? 'selected' : '' }}>
                                                                            {{ $services_category }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                                @error('service_category')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>


                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Company Name<span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="company_name" value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->company_name : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Street Address<span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="street_address" value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->street_address : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="city" value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->city : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">State/Province<span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="company_state" value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->company_state : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Zip/Postal Code<span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="company_zip_code" value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->company_zip_code : '' }}">
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                                                    <select name="company_country" id="company_country"
                                                                        class="form-control @error('company_country') is-invalid @enderror">
                                                                        <option value="" disabled {{ old('company_country', Auth::user()->role == 'Shipper' ? Auth::user()->shipper->company_country : '') ? '' : 'selected' }}>
                                                                            Select Company Country
                                                                        </option>
                                                                        <option value="US" {{ old('company_country', Auth::user()->role == 'Shipper' ? Auth::user()->shipper->company_country : '') == 'US' ? 'selected' : '' }}>
                                                                            U.S.
                                                                        </option>
                                                                        <option value="Mexico" {{ old('company_country', Auth::user()->role == 'Shipper' ? Auth::user()->shipper->company_country : '') == 'Mexico' ? 'selected' : '' }}>
                                                                            Mexico
                                                                        </option>
                                                                    </select>
                                                                    @error('company_country')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                            <div class="mb-3 col-lg-6">
                                                                <label class="form-label">Office Phone Number <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="tel" name="office_phone"
                                                                    pattern="(\+1\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}|\+52\s?1?\s?\d{3}\s?\d{3}\s?\d{4}"
                                                                    placeholder="Enter Office or Cell Phone Number"
                                                                    value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->office_phone : '' }}">
                                                            </div>

                                                            <div class="mb-3 col-lg-6">
                                                                <label class="form-label">Cell Phone Number <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="tel" name="phone"
                                                                    pattern="(\+1\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}|\+52\s?1?\s?\d{3}\s?\d{3}\s?\d{4}"
                                                                    placeholder="Enter Office or Cell Phone Number"
                                                                    value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->phone : '' }}">
                                                            </div>


                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
  new Cleave('[name="office_phone"]', {
    phone: true,
    phoneRegionCode: 'US'
  });

  new Cleave('[name="phone"]', {
    phone: true,
    phoneRegionCode: 'MX'
  });
</script>

<script>
    $("#shipperForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            service_category: {
                required: true,
                maxlength: 50
            },
            company_name: {
                required: true,
                maxlength: 50
            },
            street_address: {
                required: true,
                maxlength: 50
            },
            city: {
                required: true,
                maxlength: 50
            },
            company_state: {
                required: true,
                maxlength: 50
            },
            company_zip_code: {
                required: true,
                maxlength: 50
            },
            company_country: {
                required: true,
                maxlength: 50
            },
            office_phone: {
                required: true,
                minlength: 10,
                maxlength: 20
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 20
            }
        },
        messages: {
            name: {
                required: "Full Name is required",
                minlength: "Full Name must be at least 2 characters",
                maxlength: "Full Name must be at most 50 characters"
            },
            service_category: {
                required: "Service Category is required",
                maxlength: "Service Category must be at most 50 characters"
            },
            company_name: {
                required: "Company Name is required",
                maxlength: "Company Name must be at most 50 characters"
            },
            street_address: {
                required: "Street Address is required",
                maxlength: "Street Address must be at most 50 characters"
            },
            city: {
                required: "City is required",
                maxlength: "City must be at most 50 characters"
            },
            company_state: {
                required: "State/Province is required",
                maxlength: "State/Province must be at most 50 characters"
            },
            company_zip_code: {
                required: "Zip/Postal Code is required",
                maxlength: "Zip/Postal Code must be at most 50 characters"
            },
            company_country: {
                required: "Country is required",
                maxlength: "Country must be at most 50 characters"
            },
            office_phone: {
                required: "Office Phone Number is required",
                digits: "Enter valid digits",
                minlength: "Must be at least 17 digits"
            },
            phone: {
                required: "Cell Phone Number is required",
                digits: "Enter valid digits",
                minlength: "Must be at least 17 digits"
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
                minlength: 8
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
                minlength: "Old Password must be at least 8 characters"
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

@endsection

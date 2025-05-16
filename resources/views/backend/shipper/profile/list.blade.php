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
                                                    <div class="card-header">
                                                        <h4 class="table-card">Personal Information</h4>
                                                    </div>
                                                    <form id="shipperForm" method="post" action="{{ route('shipper.profile.update', Auth::user()->id) }}">
                                                        @csrf

                                                        <div class="card-body custom-modal">
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


                                                             <!-- US Format: (123) 456-7890 -->
                                                            <div class="mb-3 col-lg-6">
                                                                <label class="form-label">Office Phone Number <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="tel" name="office_phone"
                                                                    pattern="(\+1\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}"
                                                                    placeholder="Enter Office Phone Number"
                                                                    value="{{ Auth::user()->role == 'Shipper' ? Auth::user()->shipper->office_phone : '' }}">
                                                            </div>

                                                            <!-- Mexico Format: +52 1 234 567 8901 -->
                                                            <div class="mb-3 col-lg-6">
                                                                <label class="form-label">Cell Phone Number <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="tel" name="phone"
                                                                    pattern="\+52\s?1?\s?\d{3}\s?\d{3}\s?\d{4}"
                                                                    placeholder="Enter Phone Number "
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
                                                    <form method="post" action="{{ route('password.update') }}">
                                                        @csrf
                                                        @method('put')
                                                        <div class="card-body custom-modal">
                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">Old Password</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="password" name="current_password" placeholder="Old Password">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">New Password</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="password" name="password" placeholder="New Password">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">Confirm Password</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="text-left col-lg-12 col-xl-12">
                                                                    <button type="submit" class="submit-btn">Change Password</button>
                                                                </div>
                                                            </div>

                                                        </div><!-- end card-body -->
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
                digits: true,
                minlength: 12
            },
            phone: {
                required: true,
                digits: true,
                minlength: 12
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
                minlength: "Must be at least 11 digits"
            },
            phone: {
                required: "Cell Phone Number is required",
                digits: "Enter valid digits",
                minlength: "Must be at least 11 digits"
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
    $(document).ready(function () {
        $("#updatePassword").validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').find('.invalid-feedback').remove();
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            rules: {
                current_password: {
                    required: true,
                    minlength: 6
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    equalTo: '[name="password"]'
                }
            },
            messages: {
                current_password: {
                    required: "Please enter your current password",
                    minlength: "Password must be at least 6 characters long"
                },
                password: {
                    required: "Please enter a new password",
                    minlength: "Password must be at least 6 characters long"
                },
                password_confirmation: {
                    required: "Please confirm your new password",
                    equalTo: "Passwords do not match"
                }
            }
        });
    });
</script>


@endsection

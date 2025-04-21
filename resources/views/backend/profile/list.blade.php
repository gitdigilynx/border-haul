@extends('layouts.backend.master')
@section('title', 'Profile')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-18 fw-semibold">Profile</h4>
                </div>

                <div class="text-end">
                    <ol class="py-0 m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="pt-0 card-body">
                            <ul class="pt-2 nav nav-underline border-bottom" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="p-2 nav-link active" id="setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">Setting</span>
                                    </a>
                                </li>

                            </ul>

                            <div class="bg-white tab-content text-muted">
                                <div class="pt-4 tab-pane active" id="profile_setting" role="tabpanel">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="border card">

                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="mb-0 card-title">Personal Information</h4>
                                                            </div><!--end col-->
                                                        </div>
                                                    </div>
                                                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="card-body">
                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">Company Name</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="text" value="{{ Auth::user()->name }}">
                                                                </div>
                                                            </div>

                                                            {{-- <div class="mb-3 form-group row">
                                                                <label class="form-label">Last Name</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="text" value="Buncle">
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="mb-3 form-group row">
                                                                <label class="form-label">Contact Phone</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"><i class="mdi mdi-phone-outline"></i></span>
                                                                        <input class="form-control" type="text" placeholder="Phone" aria-describedby="basic-addon1"
                                                                        value="{{ Auth::user()->role == 'shipper' ? Auth::user()->shipper->phone : (Auth::user()->role == 'carrier' ? Auth::user()->carrier->phone : (Auth::user()->role == 'admin' ? Auth::user()->admin->phone : '')) }}">
                                                                    </div>
                                                                </div>
                                                            </div> --}}

                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">Email Address</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- <div class="mb-3 form-group row">
                                                                <label class="form-label">City</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="text" value="{{ Auth::user()->company_name }}">
                                                                </div>
                                                            </div> --}}

                                                            {{-- <div class="mb-3 form-group row">
                                                                <label class="form-label">Address</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="text"
                                                                    value="{{ Auth::user()->role == 'shipper' ? Auth::user()->shipper->company_address : (Auth::user()->role == 'carrier' ? Auth::user()->carrier->company_address : (Auth::user()->role == 'admin' ? Auth::user()->admin->company_address : '')) }}">
                                                                </div>
                                                            </div> --}}

                                                            <div class="mb-3 form-group row">
                                                                <label class="form-label">Role</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input class="form-control" type="text" value="{{ Auth::user()->role}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <button type="submit" class="mb-2 btn btn-primary mb-md-0">Update Information</button>
                                                                </div>
                                                            </div>

                                                        </div><!--end card-body-->
                                                    </form>
                                                </div>
                                            </div>

                                                <div class="col-lg-6 col-xl-6">
                                                    <div class="mb-0 border card">

                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h4 class="mb-0 card-title">Change Password</h4>
                                                                </div><!--end col-->
                                                            </div>
                                                        </div>
                                                        <form id="#updatePassword" method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-0 card-body">
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
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 form-group row">
                                                                    <label class="form-label">Confirm Password</label>
                                                                    <div class="col-lg-12 col-xl-12">
                                                                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                                                        <div class="invalid-feedback"></div>

                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-lg-12 col-xl-12">
                                                                        <button type="submit" class="mb-2 btn btn-primary mb-md-0">Change Password</button>
                                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                                    </div>
                                                                </div>

                                                            </div><!--end card-body-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end education -->
                            </div> <!-- Tab panes -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

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
                    equalTo: '[name="password"]' // Reference the password field here
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

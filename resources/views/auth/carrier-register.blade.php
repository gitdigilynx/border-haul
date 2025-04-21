<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register - Border Haul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Register to Border Haul platform."/>
    <meta name="author" content="Zoyothemes"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .is-invalid {
        border-color: #dc3545;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
        }
    </style>
</head>

<body class="bg-primary-subtle">
    <div class="account-page">
        <div class="p-0 container-fluid">
            <div class="row align-items-center g-0">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="mx-auto col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 mb-0 border-0 p-md-5 p-lg-0">
                                        <div class="mb-3 text-center auth-title-section">
                                            <div class="p-0 mb-2 text-center">
                                                <a href="" class="auth-logo">
                                                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="" height="90" style="margin-top: -25px;">
                                                </a>
                                            </div>
                                            <div class="text-center auth-title-section">
                                                {{-- <h3 class="mb-2 text-dark fs-20 fw-medium">Welcome to Border Haul</h3> --}}
                                                <h4 class="mb-4 text-dark text-uppercase" style="font-weight: bold;">Carrier Register</h4>
                                            </div>
                                        </div>
                                        <div class="pt-0">
                                            <form id="registrationCarrier" method="POST" action="{{ route('carrier.register') }}" enctype="multipart/form-data">
                                                @csrf
                                                <!-- Authority & DOT -->
                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Company Name">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="company_address" class="form-label">Company Address <span class="text-danger">*</span></label>
                                                        <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                </div>

                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                </div>

                                                <div class="mb-2 row">
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

                                                    <div class="col-md-6">
                                                        <label for="authority" class="form-label">Authority <span class="text-danger">*</span></label>
                                                        <input type="text" name="authority" id="authority" class="form-control" placeholder="Authority">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                </div>

                                                <!-- MC & SCAC Code -->
                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="mc" class="form-label">MC <span class="text-danger">*</span></label>
                                                        <input type="text" name="mc" id="mc" class="form-control" placeholder="MC">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="scac_code" class="form-label">SCAC Code <span class="text-danger">*</span></label>
                                                        <input type="number" name="scac_code" id="scac_code" class="form-control" placeholder="SCAC Code">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Mexico & CAAT Code -->
                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="mexico" class="form-label">Mexico <span class="text-danger">*</span></label>
                                                        <input type="text" name="mexico" id="mexico" class="form-control" placeholder="Mexico">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="caat_code" class="form-label">CAAT Code <span class="text-danger">*</span></label>
                                                        <input type="number" name="caat_code" id="caat_code" class="form-control" placeholder="CAAT Code">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Service Category & Phone -->
                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="dot" class="form-label">DOT <span class="text-danger">*</span></label>
                                                        <input type="text" name="dot" id="dot" class="form-control" placeholder="DOT">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" >
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>



                                                <!-- Transfer Approval Documents & Insurance Certificate -->
                                                {{-- <div class="mb-3 row">
                                                    <div class="col-md-6">
                                                        <label for="transfer_approval_documents" class="form-label">Transfer Approval Documents <span class="text-danger">*</span></label>
                                                        <input type="file" name="transfer_approval_documents" id="transfer_approval_documents" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="insurance_certificate" class="form-label">Insurance Certificate <span class="text-danger">*</span></label>
                                                        <input type="file" name="insurance_certificate" id="insurance_certificate" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div> --}}

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
                            </div> <!-- card end -->
                        </div> <!-- col end -->
                    </div> <!-- row end -->
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
@include('backend.components.js-validations.carrier.carrier-register')

</body>
</html>






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
   <!-- Normalize.css: keeps useful defaults but normalizes the rest -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

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
             margin-top: 5px;        }
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
        background: url('{{ asset('assets/carrier/shipper_image.png') }}') no-repeat top center;
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
                <form id="registrationCarrier" method="POST" action="{{ route('carrier.register') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Authority & DOT -->
                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Company Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="company_address" class="form-label">Company Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="company_address" id="company_address" class="form-control"
                                placeholder="Company Address">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mb-2 row">

                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone">
                            <div class="invalid-feedback"></div>
                        </div>
                       <div class="col-md-4">
                            <label for="service_category" class="form-label">Service Category <span
                                    class="text-danger">*</span></label>
                            <select name="service_category" id="service_category" class="form-control">
                                <option value="" selected="">Select</option>
                                @foreach (serviceCategory() as $key => $services_category)
                                    <option value="{{ $key }}">{{ $services_category }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                           <div class="col-md-4">
                            <label for="authority" class="form-label">Authority <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="authority" id="authority" class="form-control"
                                placeholder="Authority">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="mc" class="form-label">MC <span class="text-danger">*</span></label>
                            <input type="text" name="mc" id="mc" class="form-control" placeholder="MC">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="scac_code" class="form-label">SCAC Code <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="scac_code" id="scac_code" class="form-control"
                                placeholder="SCAC Code">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                            <select name="country" id="mexico" class="form-control" required>
                                <option value="">Select Country</option>
                                <option value="us">US</option>
                                <option value="mexico">Mexico</option>
                            </select>
                            <div class="invalid-feedback">Please select a country.</div>
                        </div>
                    </div>

                    <!-- Mexico & CAAT Code -->
                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="caat_code" class="form-label">CAAT Code <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="caat_code" id="caat_code" class="form-control"
                                placeholder="CAAT Code">
                            <div class="invalid-feedback"></div>
                        </div>
                         <div class="col-md-4">
                            <label for="dot" class="form-label">DOT <span class="text-danger">*</span></label>
                            <input type="text" name="dot" id="dot" class="form-control" placeholder="DOT">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-md-4">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label for="password_confirmation" class="form-label">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Confirm Password">
                            <div class="invalid-feedback"></div>
                        </div>

                         <div class="col-md-4">
                            <label for="transfer_approval_documents" class="form-label">Transfer Approval Document
                                <span class="text-danger">*</span></label>
                            <input type="file" name="transfer_approval_documents" id="transfer_approval_documents"
                                class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                         <div class="col-md-4">
                            <label for="insurance_certificate" class="form-label">Insurance Certificate <span
                                    class="text-danger">*</span></label>
                            <input type="file" name="insurance_certificate" id="insurance_certificate"
                                class="form-control">
                            <div class="invalid-feedback"></div>
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

            <!-- Right Column: Image & Caption -->
            {{-- <div class="col-md-5" style="height: 95vh; margin-top: 70px;">
                <div class="h-100 w-100 position-relative">
                    <img src="{{ asset('assets/carrier/shipper_image.png') }}" alt="World Trade Bridge"
                        class="img-fluid" style="border-radius: 22px; object-fit: cover; height: 100%; width: 100%;">

                    <div class="bottom-0 p-2 m-4 text-white position-absolute start-0" style="
                        background: rgba(0, 0, 0, 0.4);
                        backdrop-filter: blur(2px);
                        border-radius: 10px;
                        max-width: 90%;">
                        <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" style="height: 30px;"
                            class="mb-2">
                        <h5 class="fw-bold">Ship with Confidence.</h5>
                        <p class="mb-0 small">Manage, track, and deliver shipments with powerful tools built for speed,
                            reliability, and control.</p>
                    </div>
                </div>
            </div> --}}
                <!-- Right Column: Image & Caption -->
        <div class="mt-4 col-12 pb-sm-5 col-md-5 d-flex align-items-end justify-content-center mt-md-0 loginbg" style="/*padding-right: 50px;*/ ">
            {{-- <div class="position-relative w-100" style="/*max-height: 90vh;*/">
                <img src="{{ asset('assets/shipper/loginNewglob.png') }}" alt="World Trade Bridge"
                    class="img-fluid w-100 rounded-4" style="object-fit: contain; max-width:690px;max-height: 800px;"> --}}

                <div class="bottom-0 p-4 m-3 text-white start-0" style="background: linear-gradient(180deg, rgba(106, 106, 106, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);backdrop-filter: blur(16.600000381469727px);border-radius: 10px; max-width: 95%;">
                    <img src="{{ asset('assets/shipper/shipper_logo.png') }}" alt="Logo" class="mb-2" style="height: 30px;">
                    <h5 class="fw-bold custom-font2">Ship with Confidence.</h5>
                    <p class="mb-0 small subline">Manage, track, and deliver shipments with powerful tools built for speed, reliability, and control.</p>
                </div>

        </div>
        <div class="extra"></div>
        </div>
    </div>
</div>
{{--

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
                                                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}"
                                                        alt="" height="90" style="margin-top: -25px;">
                                                </a>
                                            </div>
                                            <div class="text-center auth-title-section">

                                                <h4 class="mb-4 text-dark text-uppercase" style="font-weight: bold;">
                                                    Carrier Register</h4>
                                            </div>
                                        </div>
                                        <div class="pt-0">
                                            <form id="registrationCarrier" method="POST"
                                                action="{{ route('carrier.register') }}" enctype="multipart/form-data">
                                                @csrf
                                                <!-- Authority & DOT -->
                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Company Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            placeholder="Company Name">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="company_address" class="form-label">Company Address
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" name="company_address" id="company_address"
                                                            class="form-control" placeholder="Company Address">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                </div>

                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            placeholder="Email">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone" class="form-label">Phone <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="phone" id="phone"
                                                            class="form-control" placeholder="Phone">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                </div>

                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="service_category" class="form-label">Service
                                                            Category <span class="text-danger">*</span></label>
                                                        <select name="service_category" id="service_category"
                                                            class="form-control">
                                                            <option value="" selected="">Select</option>
                                                            @foreach (serviceCategory() as $key => $services_category)
                                                            <option value="{{ $key }}">{{ $services_category }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="authority" class="form-label">Authority <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="authority" id="authority"
                                                            class="form-control" placeholder="Authority">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                </div>

                                                <!-- MC & SCAC Code -->
                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="mc" class="form-label">MC <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="mc" id="mc" class="form-control"
                                                            placeholder="MC">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="scac_code" class="form-label">SCAC Code <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="scac_code" id="scac_code"
                                                            class="form-control" placeholder="SCAC Code">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!-- Mexico & CAAT Code -->
                                                <div class="mb-2 row">

                                                    <div class="col-md-6">
                                                        <label for="mexico" class="form-label">Country <span
                                                                class="text-danger">*</span></label>
                                                        <select name="mexico" id="mexico" class="form-control" required>
                                                            <option value="">Select Country</option>
                                                            <option value="us">US</option>
                                                            <option value="mexico">Mexico</option>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a country.</div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="caat_code" class="form-label">CAAT Code <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="caat_code" id="caat_code"
                                                            class="form-control" placeholder="CAAT Code">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div> --}}

                                                <!-- Service Category & Phone -->
                                                {{-- <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="dot" class="form-label">DOT <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="dot" id="dot" class="form-control"
                                                            placeholder="DOT">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="password" class="form-label">Password <span
                                                                class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Password">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <div class="col-md-6">
                                                        <label for="password_confirmation" class="form-label">Confirm
                                                            Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation" class="form-control"
                                                            placeholder="Confirm Password">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div> --}}



                                                <!-- Transfer Approval Documents & Insurance Certificate -->
                                                {{-- <div class="mb-3 row">
                                                    <div class="col-md-6">
                                                        <label for="transfer_approval_documents"
                                                            class="form-label">Transfer Approval Documents <span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="transfer_approval_documents"
                                                            id="transfer_approval_documents" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="insurance_certificate" class="form-label">Insurance
                                                            Certificate <span class="text-danger">*</span></label>
                                                        <input type="file" name="insurance_certificate"
                                                            id="insurance_certificate" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div> --}}

                                                <!-- Submit Button -->
                                                {{-- <div class="mb-2 text-center"
                                                    style="padding: 0 100px; margin-top: 20px;">
                                                    <button type="submit"
                                                        class="btn btn-primary w-100">Register</button>
                                                </div>
                                            </form>
                                            <div class="mt-3 text-center text-muted">
                                                <p class="mb-0">Already have an account?
                                                    <a class="text-primary ms-2 fw-medium"
                                                        href="{{ route('carrier.login') }}">Login here</a>
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
    @include('backend.components.js-validations.carrier.carrier-register')

    {{--
</body> --}}

</html>

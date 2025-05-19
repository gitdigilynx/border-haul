<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title','Border Haul')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico/') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <div class="account-page">
        <div class="p-0 container-fluid min-vh-100 d-flex justify-content-center align-items-center">
            <div class="row w-100 justify-content-center">

                <div class="col-xl-6">
                    <div class="row">
                        <div class="mx-auto col-md-8">
                            <div class="p-3 mb-0 card">
                                <span class="logo-lg text-center">
                                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="Border Haul Logo" height="80" style="margin-left:-20px">
                                </span>
                                <div class="card-body">
                                    <div class="p-4 mb-0 border-0 p-md-5 p-lg-0">
                                        <div class="mb-3 text-center auth-title-section">
                                            <h3 class="text-center custom-modal modal-title w-100" style="font-family: Poppins !importent;
                                        font-weight: 800;
                                        font-size: 18px;
                                        line-height: 100%;
                                        letter-spacing: 0%;
                                        text-transform: uppercase;
                                        color: #000000;">Forget Password</h3>
                                            <p class="mt-3 text-dark text-capitalize fs-14">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                        </div>

                                        <div class="pt-0">
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif


                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf
                                            <div class="modal-body custom-modal">

                                                <div class="mb-3 form-group">
                                                    <label for="email" class="form-label">Email address</label>
                                                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" required autofocus placeholder="Enter your email">

                                                    @error('email')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-0 form-group row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="submit-btn" type="submit" >
                                                                {{ __('Email Password Reset Link') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                            </form>

                                            <div class="text-center text-muted">
                                                <p class="mt-3">Change the mind  ?<a class=' ms-2 fw-medium' href='{{ route('shipper.login') }}'>Back to Login</a></p>
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


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


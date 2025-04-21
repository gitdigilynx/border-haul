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
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


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

    </head>
    <div class="account-page">
        <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center p-0">
            <div class="row w-100 justify-content-center">

                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card p-3 mb-0">
                                <div class="card-body">

                                    <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">

                                        <div class="auth-title-section mb-3 text-center">
                                            <h3 class="text-dark fs-20 fw-medium mb-2">Forget Password</h3>
                                            <p class="text-dark text-capitalize fs-14 mb-0">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                        </div>

                                        <div class="pt-0">
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf

                                                <div class="form-group mb-3">
                                                    <label for="email" class="form-label">Email address</label>
                                                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" required autofocus placeholder="Enter your email">

                                                    @error('email')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit">
                                                                {{ __('Email Password Reset Link') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="text-center text-muted">
                                                <p class="mb-0">Change the mind  ?<a class='text-primary ms-2 fw-medium' href='{{ route('login') }}'>Back to Login</a></p>
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

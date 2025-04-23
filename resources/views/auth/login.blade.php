
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
    <body class="bg-info-subtle">

        <!-- Begin page -->
        <div class="account-page">
            <div class="p-0 container-fluid min-vh-100 d-flex justify-content-center align-items-center">
                <div class="row w-100 justify-content-center">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="mx-auto col-md-8">
                                <div class="p-3 mb-0 card">
                                    <div class="card-body">
                                        <div class="p-4 mb-0 border-0 p-md-5 p-lg-0">
                                            <div class="p-0 mb-3 text-center">
                                                <a href="" class="auth-logo">
                                                    <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="" height="100" width="160" style="margin-top: -25px;">
                                                </a>
                                            </div>

                                            <div class="mb-2 text-center auth-title-section">
                                                {{-- <h3 class="mb-2 text-dark fs-20 fw-medium">Welcome To Border Haul</h3> --}}
                                                <h4 class="mb-0 text-dark text-uppercase" style="font-weight: bold;">Shipper Log In</h4>

                                            </div>
                                            <div class="pt-0">
                                                <form id="loginForm" method="POST" action="{{ route('login') }}">
                                                    @csrf

                                                    <div class="mb-3 form-group">
                                                        <label for="emailaddress" class="form-label">Email</label>
                                                        <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter your email">
                                                    </div>

                                                    <div class="mb-3 form-group">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                                    </div>

                                                    @include('backend.components.alerts.errors')

                                                    <div class="mb-3 form-group d-flex">
                                                        <div class="col-sm-6">
                                                            <div class="form-check">

                                                                <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                                                                <label class="form-check-label" for="checkbox-signin">{{ __('Remember me') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 text-end">
                                                            <a class="text-muted fs-14" href="{{ route('password.request') }}">Forgot password?</a>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 form-group row">
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button class="btn btn-primary" type="submit">Sign In</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="text-center text-muted mb-7">
                                                    <p class="mb-1">Don't have an Shipper account ?<a class='text-primary ms-2 fw-medium' href='{{ route('register') }}'>Create Account</a></p>
                                                    <p class="mb-0">Carrier Partner?<a class='text-primary ms-2 fw-medium' href='{{ route('carrier.register') }}'>Create Carrier Partner Account</a></p>
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
        @include('backend.components.js-validations.shipper-users.shipper-login')
    </body>
</html>

 {{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


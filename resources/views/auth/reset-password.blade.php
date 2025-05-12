
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

    <body class="bg-primary-subtle">
        <!-- Begin page -->
        <div class="account-page">
            <div class="p-0 container-fluid">
                <div class="row align-items-center g-0">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="mx-auto col-md-4">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="p-4 mb-0 border-0 p-md-5 p-lg-0">


                                            <div class="mb-3 text-center auth-title-section">
                                                <h3 class="mb-2 text-dark fs-20 fw-medium">Reset Password</h3>
                                                {{-- <p class="mb-0 text-dark fs-14">Register to in account</p> --}}
                                            </div>

                                            <div class="pt-0">
                                                <form method="POST" action="{{ route('password.store') }}">
                                                    @csrf

                                                    <!-- Password Reset Token -->
                                                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                                                    <!-- Email Address -->
                                                    <div class="mb-3 form-group">
                                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" value="{{ old('email', request()->email) }}"
                                                               class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Password -->
                                                    <div class="mb-3 form-group">
                                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password"
                                                               class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Confirm Password -->
                                                    <div class="mb-3 form-group">
                                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                                               class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="mb-2">
                                                        <div class="px-4 mt-3 d-grid">
                                                            <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
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
        <!-- END wrapper -->

    </body>
</html>





    {{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



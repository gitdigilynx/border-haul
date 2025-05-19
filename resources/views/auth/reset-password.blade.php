
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

        <!-- Style css -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

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
                                            color: #000000;">Reset Password</h3>

                                            </div>

                                            <div class="pt-0">
                                                <form method="POST" action="{{ route('password.store') }}">
                                                    @csrf
                                                    <div class="modal-body custom-modal">

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
           class="form-control" placeholder="Password" required>
    <div id="password-error" class="invalid-feedback d-none"></div>
</div>

<!-- Confirm Password -->
<div class="mb-3 form-group">
    <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
    <input type="password" name="password_confirmation" id="password_confirmation"
           class="form-control" placeholder="Confirm Password" required>
    <div id="confirm-password-error" class="invalid-feedback d-none"></div>
</div>

                                                    <!-- Submit Button -->
                                                    <div class="mb-2">
                                                        <div class=" mt-3 d-grid">
                                                            <button type="submit" class="submit-btn">{{ __('Reset Password') }}</button>
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
        <!-- END wrapper -->

    </body>
</html>

<!-- JavaScript Validation -->

<script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');

    function validatePassword() {
        const password = passwordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();

        // Reset classes and errors
        passwordInput.classList.remove('is-invalid');
        confirmPasswordInput.classList.remove('is-invalid');
        passwordError.classList.add('d-none');
        confirmPasswordError.classList.add('d-none');

        // Validate minimum length
        if (password.length < 8) {
            passwordInput.classList.add('is-invalid');
            passwordError.textContent = 'Password must be at least 8 characters.';
            passwordError.classList.remove('d-none');
        }

        // Validate match only if both fields are filled
        if (confirmPassword && password !== confirmPassword) {
            confirmPasswordInput.classList.add('is-invalid');
            confirmPasswordError.textContent = 'Passwords do not match.';
            confirmPasswordError.classList.remove('d-none');
        }
    }

    // Listen for real-time typing
    passwordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePassword);
</script>

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



<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Validation\ValidationException;

use App\Models\User;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

     public function store(Request $request)
     {
         $request->validate([
             'token' => ['required'],
             'email' => ['required', 'email'],
             'password' => ['required', 'confirmed', Rules\Password::defaults()],
         ]);

         $status = Password::reset(
             $request->only('email', 'password', 'password_confirmation', 'token'),
             function (User $user, string $password) use ($request) {
                 $user->forceFill([
                     'password' => Hash::make($password),
                     'remember_token' => Str::random(60),
                 ])->save();

                 // Optional: auto-login
                 auth()->login($user);
             }
         );

         if ($status == Password::PASSWORD_RESET) {
             $user = User::where('email', $request->email)->first();

             // Redirect based on user role
             if ($user->role === 'Carrier') {
                 return redirect()->to('carrier/carrier-users')->with('status', __($status));
             } elseif ($user->role === 'Shipper') {
                 return redirect()->to('shipper/deliveries')->with('status', __($status));
             } else {
                 return redirect()->to('/home')->with('status', __($status));
             }
         }

         throw ValidationException::withMessages([
             'email' => [trans($status)],
         ]);
     }


    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'token' => ['required'],
    //         'email' => ['required', 'email'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     // Here we will attempt to reset the user's password. If it is successful we
    //     // will update the password on an actual user model and persist it to the
    //     // database. Otherwise we will parse the error and return the response.
    //     $status = Password::reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user) use ($request) {
    //             $user->forceFill([
    //                 'password' => Hash::make($request->password),
    //                 'remember_token' => Str::random(60),
    //             ])->save();

    //             event(new PasswordReset($user));
    //         }
    //     );

    //     // If the password was successfully reset, we will redirect the user back to
    //     // the application's home authenticated view. If there is an error we can
    //     // redirect them back to where they came from with their error message.
    //     return $status == Password::PASSWORD_RESET
    //                 ? redirect()->route('shipper.login')->with('status', __($status))
    //                 : back()->withInput($request->only('email'))
    //                         ->withErrors(['email' => __($status)]);
    // }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Shipper;
use App\Enums\RoleEnum;


class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }


    public function store(Request $request): RedirectResponse
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'role' => 'required', 'exists:roles,role',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed|min:6',
        //     'company_name' => 'required|string|max:255',
        //     'company_address' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        // ]);

            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'shipper',
            ]);

            // Assign role
            // $user->assignRole($request->role);

            // Create shipper details
            Shipper::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'phone' => $request->phone,
            ]);

            flash()->success('User created successfully!');

            event(new Registered($user));
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($user->role === RoleEnum::SHIPPER->value) {
                return redirect()->route('shipper.home')->with('success', 'Login successful');
            } elseif ($user->role === RoleEnum::CARRIER->value) {
                return redirect()->route('carrier.home')->with('success', 'Login successful');
            } elseif ($user->role === RoleEnum::ADMIN->value) {
                return redirect()->route('admin.home')->with('success', 'Login successful');
            }

            return redirect('/')->with('success', 'Login successful');        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }
}

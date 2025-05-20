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
use Illuminate\View\View;
use App\Models\Shipper;
use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToShipper;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.shipper-register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'service_category' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'email' => [
                'required',
                'regex:/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/',
                'unique:users,email',
            ],
            'street_address' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'company_state' => 'required|string|max:50',
            'company_zip_code' => 'required|string|max:50',
            'company_country' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'office_phone' => 'required|string|max:50',
            'password' => 'required|confirmed|min:6',
        ]);

        // Redundant check (already handled by validation) — can remove this
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['email' => 'The email address is already registered.']);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Shipper',
        ]);

        // Create shipper details
        Shipper::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'street_address' => $request->street_address,
            'phone' => $request->phone,
            'city' => $request->city,
            'company_state' => $request->company_state,
            'company_zip_code' => $request->company_zip_code,
            'company_country' => $request->company_country,
            'service_category' => $request->service_category,
            'office_phone' => $request->office_phone,
        ]);

        // Send password notification
        Mail::to($request->email)->send(new SendPasswordToShipper($request->email));

        flash()->success('User created successfully!');

        event(new Registered($user));
        Auth::login($user);

        if ($user->role === 'Shipper') {
            return redirect()->route('shipper.deliveries'); // Make sure this route exists
        }

        return redirect(RouteServiceProvider::HOME);
    }



    public function shipperLogin(): View
    {
        return view('auth.shipper-login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        // Fetch the user first
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->onlyInput('email');
        }

        // Check if the user has the carrier role
        if ($user->role !== RoleEnum::SHIPPER->value) {
            return back()->withErrors([
                'email' => 'Access restricted. Only shipper accounts can log in here.',
            ])->onlyInput('email');
        }

        // Check password
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect()->route('carrier.carrier-users')->with('success', 'Login successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('shipper.login');
    }
}

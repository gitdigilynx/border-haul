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
        return view('auth.shipper-register');
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

        // Check if email already exists
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()
                ->withInput() // keeps the old input
                ->withErrors(['email' => 'The email address is already registered.']);
        }
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Shipper',
        ]);

        // Assign role
        // $user->assignRole($request->role);

        // Create shipper details
        Shipper::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'phone' => $request->phone,
            'service_category' => $request->service_category,
        ]);

        flash()->success('User created successfully!');

        event(new Registered($user));
        Auth::login($user);

        if ($user->role === 'Shipper') {
            return redirect()->route('shipper.deliveries');
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
                 'email' => 'No account found with this email.',
             ])->onlyInput('email');
         }
 
         // Check if the user has the carrier role
         if ($user->role !== \App\Enums\RoleEnum::SHIPPER->value) {
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

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
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',

        ]);

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

            Mail::to($request->email)->send(new SendPasswordToShipper($request->email));

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


         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === RoleEnum::SHIPPER->value) {
                return redirect()->route('shipper.deliveries')->with('success', 'Login successful');

            }
            return redirect('/')->with('success', 'Login successful');
        }


        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('shipper.login');
    }

}

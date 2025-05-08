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
use App\Models\Carrier;
use App\Enums\RoleEnum;
use Illuminate\Support\Str;


class CarrierRegisterController extends Controller
{
    public function carrierRegister(): View
    {
        return view('auth.carrier-register');
    }

    public function register(Request $request): RedirectResponse
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'role' => 'required|in:shipper,carrier',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed|min:6',
        //     'phone' => 'required|string|max:20',

        //     // Carrier-specific validations
        //     'company_name' => 'required|string|max:255',
        //     'company_address' => 'required|string|max:255',
        //     'authority' => 'required_if:role,carrier',
        //     'dot' => 'required_if:role,carrier',
        //     'mc' => 'required_if:role,carrier',
        //     'scac_code' => 'required_if:role,carrier',
        //     'mexico' => 'required_if:role,carrier',
        //     'caat_code' => 'required_if:role,carrier',
        //     'service_category' => 'required_if:role,carrier',
        //     // 'transfer_approval_documents' => 'required_if:role,carrier',
        //     // 'insurance_certificate' => 'required_if:role,carrier',
        // ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Carrier',
        ]);

         $originalName = $request->file('file_path')->getClientOriginalName();
            $filename = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('file_path')->getClientOriginalExtension();
            $safeName = Str::slug($filename) . '.' . $extension;

        $transferDocPath = $request->file('transfer_approval_documents')->storeAs('approval_documents', $safeName,'public');
        $insuranceCertPath = $request->file('insurance_certificate')->storeAs('certificates', $safeName, 'public');

        Carrier::create([
            'user_id' => $user->id,
            'company_address' => $request->company_address,
            'authority' => $request->authority,
            'dot' => $request->dot,
            'mc' => $request->mc,
            'scac_code' => $request->scac_code,
            'country' => $request->country,
            'caat_code' => $request->caat_code,
            'service_category' => $request->service_category,
            'phone' => $request->phone,
            'transfer_approval_documents' => $transferDocPath,
            'insurance_certificate' => $insuranceCertPath,
        ]);


        // dd($carrier);
        // Optionally assign role using spatie/laravel-permission
        // $user->assignRole($request->role);

        // flash()->success(ucfirst($request->role) . ' registered successfully!');

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function carrierLogin(): View
    {
        return view('auth.carrier-login');
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
                return redirect()->route('home')->with('success', 'Login successful');
            }
            elseif ($user->role === RoleEnum::CARRIER->value) {
                return redirect()->route('home')->with('success', 'Login successful');
            }
            elseif ($user->role === RoleEnum::ADMIN->value) {
                return redirect()->route('home')->with('success', 'Login successful');
            }
            elseif ($user->role === RoleEnum::subAdmin->value) {
                return redirect()->route('home')->with('success', 'Login successful');
            }

            return redirect('/')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }
}

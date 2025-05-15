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
use App\Mail\SendPasswordToCarrier;
use Illuminate\Support\Facades\Mail;
use Flasher\Laravel\Facade\Flasher;

class CarrierRegisterController extends Controller
{
    public function carrierRegister(): View
    {
        return view('auth.carrier-register');
    }

    public function register(Request $request): RedirectResponse
    {
        try {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',

            // Carrier-specific validations
            'company_address'   => 'required|string|max:50',
            'company_name'   => 'required|string|max:50',
            'authority'         => 'required|string|max:50',
            'dot'               => 'required|string|min:3|max:30',
            'mc'                => 'required|string|min:3|max:30',
            'scac_code'         => 'required|string|min:3|max:30',
            'country'           => 'required|string|min:1|max:30',
            'caat_code'         => 'required|string|min:3|max:30',
            'service_category'  => 'required|string|min:3|max:255',
            'phone'             => 'required|string|max:11',

            // 'transfer_approval_documents' => 'required|string|max:15',
            // 'insurance_certificate' => 'required|string|max:15',
        ]);


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
            'role' => 'Carrier',
        ]);

        //  $originalName = $request->file('file_path')->getClientOriginalName();
        //     $filename = pathinfo($originalName, PATHINFO_FILENAME);
        //     $extension = $request->file('file_path')->getClientOriginalExtension();
        //     $safeName = Str::slug($filename) . '.' . $extension;

        // $transferDocPath = $request->file('transfer_approval_documents')->storeAs('approval_documents', $safeName,'public');
        // $insuranceCertPath = $request->file('insurance_certificate')->storeAs('certificates', $safeName, 'public');

        Carrier::create([
            'user_id' => $user->id,
            'company_address' => $request->company_address,
            'company_name' => $request->company_name,
            'authority' => $request->authority,
            'dot' => $request->dot,
            'mc' => $request->mc,
            'scac_code' => $request->scac_code,
            'country' => $request->country,
            'caat_code' => $request->caat_code,
            'service_category' => $request->service_category,
            'phone' => $request->phone,
            // 'transfer_approval_documents' => $transferDocPath,
            // 'insurance_certificate' => $insuranceCertPath,
        ]);

        Mail::to($request->email)->send(new SendPasswordToCarrier($request->email));

        event(new Registered($user));
        Auth::login($user);

        if ($user->role === 'Carrier') {
            return redirect()->route('carrier.carrier-users');
        }

        return redirect(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        dd('Something went wrong: ' . $e->getMessage());
        return redirect()->back();
    }
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

        // Fetch the user first
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email.',
            ])->onlyInput('email');
        }

        // Check if the user has the carrier role
        if ($user->role !== \App\Enums\RoleEnum::CARRIER->value) {
            return back()->withErrors([
                'email' => 'Access restricted. Only carrier accounts can log in here.',
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

        return redirect()->route('carrier.login'); // ✅ Proper named route
    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToCarrier;
use App\Models\Carrier;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;


class AdminCarrierUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
           $carrierUsers = User::where('role', 'Carrier')

                ->orderBy('created_at', 'desc')
                ->get();

            // dd($carrierUsers);
            return view('backend.admin.carrier.carrier-user.index', compact('carrierUsers'));

        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.admin.carrier.carrier-user.create');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {

            $rawPassword = Str::random(8);

            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($rawPassword),
            'role' => 'Carrier',
        ]);

        Carrier::create([
            'user_id' => $user->id,
            'company_address' => $request->company_address,
            'authority' => $request->authority,
            'dot' => $request->dot,
            'mc' => $request->mc,
            'scac_code' => $request->scac_code,
            'mexico' => $request->mexico,
            'caat_code' => $request->caat_code,
            'service_category' => $request->service_category,
            'phone' => $request->phone,
            // 'transfer_approval_documents ' => $request->transfer_approval_documents,
            // 'insurance_certificate ' => $request->insurance_certificate,
        ]);

        // Send credentials via email
        Mail::to($request->email)->send(new SendPasswordToCarrier($request->email, $rawPassword));

         return redirect()->route('admins.carriers')->with('success', 'Carrier User created successfully!');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }

    }


    public function show($id)
    {
        try {

            $user = Carrier::with('users')->findOrFail($id);
            return view('backend.admin.carrier.carrier-user.show', compact('user'));
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.admin.carrier.carrier-user.edit');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:sub_users,email,' . $request->id,
            ]);

            $request->update($validated);
            return redirect()->route('carrier.carrier-users.index');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $subUser = Carrier::findOrFail($id);
            $subUser->delete();

            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}

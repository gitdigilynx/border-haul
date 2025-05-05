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
use PhpParser\Node\NullableType;

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
           $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:shipper,carrier',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'is_active' => '0',

            // Carrier-specific validations
            'company_address' => 'required|string|max:255',
            'authority' => 'required|string|max:255',
            'dot' => 'required|string|max:255',
            'mc' => 'required|string|max:255',
            'scac_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'caat_code' => 'required|string|max:255',
            'service_category' => 'required|string|max:255',
            'transfer_approval_documents' => 'required|string|max:255',
            'insurance_certificate' => 'required|string|max:255',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Carrier',
        ]);

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
            'transfer_approval_documents ' => $request->transfer_approval_documents,
            'insurance_certificate ' => $request->insurance_certificate,
        ]);

        // Send credentials via email
        Mail::to($request->email)->send(new SendPasswordToCarrier($request->email, $rawPassword));

         return redirect()->route('admin.carriers')->with('success', 'Carrier created successfully!');

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
    public function update(Request $request, $id)
    {
        try {
            // Validate inputs
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $request->id,
                'role'  => 'required|string|max:255',
            ]);

            // Find user by ID
            $carrier = User::findOrFail($id);

            // Update the user
            $carrier->update([
                'name'  => $request['name'],
                'email' => $request['email'],
                'role'  => $request['role'],
            ]);

            return redirect()->route('admin.carriers')->with('success', 'Carrier updated successfully.');
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

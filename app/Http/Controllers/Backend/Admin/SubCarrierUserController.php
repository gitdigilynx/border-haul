<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToCarrier;
use App\Models\CarrierSubUser;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;


class SubCarrierUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
           $subCarrier = User::where('role', 'CarrierUser')
                ->orderBy('created_at', 'desc')
                ->get();

            // dd($carrierUsers);
            return view('backend.admin.carrier.sub-carrier.index', compact('subCarrier'));

        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.admin.carrier.sub-carrier.create');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $subCarrier = auth()->user();

            $rawPassword = Str::random(8);

            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($rawPassword),
            'role' => 'CarrierUser',
        ]);
        CarrierSubUser::create([
            'user_id' => $user->id,
            'carrier_id' => $subCarrier->id,
            'phone' => $request->phone,
        ]);

        // Send credentials via email
        Mail::to($request->email)->send(new SendPasswordToCarrier($request->email, $rawPassword));

         return redirect()->route('admin.sub-carriers')->with('success', 'Carrier Users created successfully!');
        } catch (\Exception $e) {
        flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }

    }


    public function show($id)
    {
        try {
            $user = CarrierSubUser::with('users')->findOrFail($id);
            return view('backend.admin.carrier.sub-carrier.show', compact('user'));
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.admin.carrier.sub-carrier.edit');
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
            $subCarrier = User::findOrFail($id);

            // Update the user
            $subCarrier->update([
                'name'  => $request['name'],
                'email' => $request['email'],
                'role'  => $request['role'],
            ]);

            return redirect()->route('admin.sub-carriers')->with('success', 'Carrier Users updated successfully.');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            $subCarrier = User::findOrFail($id);
            $subCarrier->delete();

            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function toggleSubCarrier(Request $request, $id)
    {
        try {
            $subCarrier = User::findOrFail($id);
            $subCarrier->is_active = $request->has('is_active');
            $subCarrier->save();

            return back()->with('status', 'User status updated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}

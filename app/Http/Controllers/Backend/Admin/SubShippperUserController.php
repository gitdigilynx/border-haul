<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ShipperSubUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToShipperUser;
use App\Models\CarrierSubUser;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Flasher\Laravel\Facade\Flasher;

class SubShippperUserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
           $subShipper = User::where('role', 'ShipperUser')
                ->get();

            // dd($subShipper);
            return view('backend.admin.shipper.sub-shipper.index', compact('subShipper'));

        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.admin.shipper.sub-shipper.create');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $subShipper = auth()->user();
            $rawPassword = Str::random(8);

            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($rawPassword),
            'role' => 'ShipperUser',
        ]);

        $user = ShipperSubUser::create([
            'user_id' => $user->id,
            'shipper_id' => $subShipper->id,
            'phone' => $request->phone,
        ]);

        // Send credentials via email
        Mail::to($request->email)->send(new SendPasswordToShipperUser($request->email, $rawPassword));

         return redirect()->route('admin.sub-shippers')->with('success', 'Shipper Users created successfully!');
         } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }

    }

    public function show($id)
    {
        try {
            $user = ShipperSubUser::with('users')->findOrFail($id);
            return view('backend.admin.shipper.sub-shipper.show', compact('user'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.admin.shipper.sub-shipper.edit');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
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
            $subShipper = User::findOrFail($id);

            // Update the user
            $subShipper->update([
                'name'  => $request['name'],
                'email' => $request['email'],
                'role'  => $request['role'],
            ]);

            return redirect()->route('admin.sub-shippers')->with('success', 'Shipper Users updated successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            $subShipper = User::findOrFail($id);
            $subShipper->delete();

            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function toggleSubShipper(Request $request, $id)
    {
        try {
            $subShipper = User::findOrFail($id);
            $subShipper->is_active = $request->has('is_active');
            $subShipper->save();

            return back()->with('status', 'User status updated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}

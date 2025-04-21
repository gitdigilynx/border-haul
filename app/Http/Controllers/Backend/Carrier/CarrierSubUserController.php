<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarrierSubUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CarrierSubUserController extends Controller
{
    public function index()
    {
        $carrierId = auth()->id();
        $carrierUsers = CarrierSubUser::with('users')
            ->where('carrier_id', $carrierId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.carrier.sub-user.index', compact('carrierUsers'));
    }

    public function create()
    {
        return view('backend.carrier.sub-user.create');
    }

    public function store(Request $request)
    {
        $carrier = auth()->user();

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'carrier_user',
        ]);

        CarrierSubUser::create([
            'user_id' => $user->id,
            'carrier_id' => $carrier->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->email,
        ]);

        return redirect()->route('carrier.carrier-users')->with('success', 'Sub-user created successfully!');
    }

    public function show($id)
    {
        $user = CarrierSubUser::with('users')->findOrFail($id);
        return view('backend.carrier.sub-user.show', compact('user'));
    }

    public function edit(Request $request)
    {
        return view('backend.carrier.sub-user.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sub_users,email,' . $request->id,
        ]);

        $request->update($validated);
        return redirect()->route('carrier.carrier-users.index');
    }

    public function destroy($id)
    {
        $subUser = CarrierSubUser::findOrFail($id);
        $subUser->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

}

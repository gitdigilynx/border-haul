<?php

namespace App\Http\Controllers\Backend\Shipper;

use App\Http\Controllers\Controller;
use App\Models\Shipper;
use App\Models\ShipperSubUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToShipperUser;

class SubUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shipperId = auth()->id();
        $subUsers = ShipperSubUser::with('users')
            ->where('shipper_id', $shipperId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.shipper.sub-user.index', compact('subUsers'));
    }
    public function create()
    {
        return view('backend.shipper.sub-user.create');
    }

    public function store(Request $request)
    {
        $shipper = auth()->user();

        $rawPassword = Str::random(8);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($rawPassword),
            'role' => 'ShipperUser',
        ]);


        ShipperSubUser::create([
            'user_id' => $user->id,
            'shipper_id' => $shipper->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->email,
        ]);

        // Send credentials via email
        Mail::to($request->email)->send(new SendPasswordToShipperUser($request->email, $rawPassword));

        return redirect()->route('shipper.sub-users')->with('success', 'Sub-user created successfully!');
    }


    public function show($id)
    {
        $user = ShipperSubUser::with('users')->findOrFail($id);
        return view('backend.shipper.sub-user.show', compact('user'));
    }

    public function edit(Request $request)
    {
        return view('backend.shipper.sub-users.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sub_users,email,' . $request->id,
        ]);

        $request->update($validated);
        return redirect()->route('shipper.sub-users.index');
    }

     public function destroy($id)
    {
        try {
            $subUser = ShipperSubUser::findOrFail($id);
            $subUser->delete();

            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

}


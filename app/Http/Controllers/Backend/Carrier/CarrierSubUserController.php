<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarrierSubUser;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToCarrierUser;
use Illuminate\Support\Str;
use Flasher\Laravel\Facade\Flasher;


class CarrierSubUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $shipperId = auth()->id();
            $carrierUsers = CarrierSubUser::with('users')
                ->where('carrier_id', $shipperId)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('backend.carrier.sub-user.index', compact('carrierUsers'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.carrier.sub-user.create');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $carrier = auth()->user();

            $rawPassword = Str::random(8);

            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($rawPassword),
                'role' => 'CarrierUser',
            ]);

            CarrierSubUser::create([
                'user_id' => $user->id,
                'carrier_id' => $carrier->id,
            ]);

            // Send credentials via email
            Mail::to($request->email)->send(new SendPasswordToCarrierUser($request->email, $rawPassword));

            return redirect()->route('carrier.carrier-users')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {

            $user = CarrierSubUser::with('users')->findOrFail($id);
            return view('backend.carrier.sub-user.show', compact('user'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.carrier.sub-user.edit');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name'  => 'required|string|max:255',
                // 'email' => 'required|email|unique:users,email,' . $id,
                'last_name'  => 'required|string|max:255',
            ]);

            $subCarrier = User::findOrFail($id);

            $subCarrier->update([
                'name'  => $request->name,
                // 'email' => $request->email,
                'last_name'  => $request->last_name,
            ]);
            return redirect()->route('carrier.carrier-users')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $subUser = CarrierSubUser::findOrFail($id);
            $subUser->delete();

            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function toggleCarrierUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->is_active = $request->has('is_active');
            $user->save();

            return back()->with('status', 'User status updated.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
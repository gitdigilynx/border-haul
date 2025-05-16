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
use Flasher\Laravel\Facade\Flasher;


class SubUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shipperId = auth()->id();
        $subUsers = ShipperSubUser::with('user')
            ->where('shipper_id', $shipperId)
            ->orderBy('created_at', 'desc')
            ->get();

            // dd($subUsers);
        return view('backend.shipper.sub-user.index', compact('subUsers'));
    }
    public function create()
    {
        return view('backend.shipper.sub-user.create');
    }

    public function store(Request $request)
    {
        try {
            $shipper = auth()->user();
            $rawPassword = Str::random(8);

            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($rawPassword),
                'role' => 'ShipperUser',
            ]);

            ShipperSubUser::create([
                'user_id' => $user->id,
                'shipper_id' => $shipper->id,
            ]);

            // Send credentials via email
            Mail::to($request->email)->send(new SendPasswordToShipperUser($request->email, $rawPassword));

            return redirect()->route('shipper.sub-users')->with('success', 'Sub-user created successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        try {
            $user = ShipperSubUser::with('user')->findOrFail($id);
            return view('backend.shipper.sub-user.show', compact('user'));

        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {

            $user = ShipperSubUser::with('user')->findOrFail($id);
            return view('backend.shipper.sub-user.edit',compact('user'));

        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $subUser = ShipperSubUser::findOrFail($id);

            // Update the related User
            $user = User::findOrFail($subUser->user_id);
            $user->update([
                'name'      => $request->name,
                'last_name' => $request->last_name,
            ]);

            return redirect()->route('shipper.sub-users')->with('success', 'User updated successfully.');

        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            $subUser = ShipperSubUser::findOrFail($id);
            $subUser->delete();

            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Exception $e) {
           Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function toggleSubUser(Request $request, $id)
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

    public function checkEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email'
            ]);
            $exists = User::where('email', $request->email)->exists();

            return response()->json(['exists' => $exists]);
        }
        catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToShipperUser;
use App\Models\Shipper;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminShipperUserRequest;
use Flasher\Laravel\Facade\Flasher;

class ShippperUserController extends Controller
{
    public function index()
    {
        try {
            $shippers = User::where('role', 'Shipper')
                ->whereHas('shipper')
                ->with('shipper')
                ->get();

            // dd($shippers);
            return view('backend.admin.shipper.shipper-user.index', compact('shippers'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.admin.shipper.shipper-user.create');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(AdminShipperUserRequest $request): RedirectResponse
    {

        try {
            $user = auth()->user();

            $rawPassword = Str::random(8);

            // Create the new carrier user
            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($rawPassword),
                'role' => 'Shipper',
            ]);

            Shipper::create([
                'shipper_id' => $user->id,
                'user_id' => $newUser->id,
                'company_address' => $request->company_address,
                'company_name' => $request->company_name,
                'service_category' => $request->service_category,
                'phone' => $request->phone,
            ]);


            Mail::to($request->email)->send(new SendPasswordToShipperUser($request->email, $rawPassword));

            return redirect()->route('admin.shippers')->with('success', 'Shipper created successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        try {
            $user = Shipper::with('users')->findOrFail($id);
            return view('backend.admin.shipper.shipper-user.show', compact('user'));
        } catch (\Exception $e) {
           Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.admin.shipper.shipper-user.edit');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
   public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Update user fields
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_active' => $request->is_active,
            ]);

            // Find related carrier
            $shipper = $user->shipper;

            // Prepare carrier update data
            $shipperData = $request->only([
                'company_address',
                'company_name',
                'service_category',
                'phone',
            ]);

            // Update carrier
            if ($shipper) {
                $shipper->update($shipperData);
            }

            return redirect()->route('admin.shippers')->with('success', 'Shipper updated successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            $carrier = User::findOrFail($id);
            $carrier->delete();

            return response()->json(['message' => 'Shipper deleted successfully']);
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function toggleShipper(Request $request, $id)
    {
        try {
            $Carrier = User::findOrFail($id);
            $Carrier->is_active = $request->has('is_active');
            $Carrier->save();

            return back()->with('status', 'User status updated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}

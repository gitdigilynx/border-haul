<?php

namespace App\Http\Controllers\Backend\Shipper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;

class ShipperProfileController extends Controller
{
    public function list()
    {

        return view('backend.shipper.profile.list');
    }
    public function edit(Request $request): View
    {
        return view('backend.shipper.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

     public function update(Request $request, $id)
     {
         try {
             // Validate inputs
             $request->validate([
                 'name'              => 'required|string|max:255',
                 'company_address'   => 'required|string|max:255',
                 'service_category'  => 'required|string|max:255',
                 'phone'             => 'required|string|max:255',
             ]);

             // Find user and shipper
             $user = User::findOrFail($id);
             $shipper = $user->shipper; // assuming a `hasOne` relationship

             if (!$shipper) {
                 return redirect()->back()->withErrors('Shipper profile not found for this user.');
             }

             // Update User
             $user->update([
                 'name' => $request->name,
             ]);

             // Update Shipper
             $shipper->update([
                 'company_address'   => $request->company_address,
                 'service_category'  => $request->service_category,
                 'phone'             => $request->phone,
             ]);

             return redirect()->route('shipper.profile.list')->with('success', 'Profile updated successfully.');
         } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
             return redirect()->back();
         }
     }


    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {

    //             $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

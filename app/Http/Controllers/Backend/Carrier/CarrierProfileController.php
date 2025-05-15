<?php

namespace App\Http\Controllers\Backend\Carrier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
class CarrierProfileController extends Controller
{

    public function list()
    {

        return view('backend.carrier.profile.list');
    }
    public function edit(Request $request): View
    {
        return view('backend.carrier.profile.edit', [
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
                'name'  => 'required|string|max:255',
                'company_address'  => 'required|string|max:255',
                'company_name'  => 'required|string|max:15',
                'phone'  => 'required|string|max:255',
                'authority'  => 'required|string|max:255',
                'dot'  => 'required|string|max:255',
                'mc'  => 'required|string|max:255',
                'scac_code'  => 'required|string|max:255',
                'country'  => 'required|string|max:255',
                'caat_code'  => 'required|string|max:255',
                'service_category'  => 'required|string|max:255',
            ]);

              // Find user and carrier
              $user = User::findOrFail($id);
              $carrier = $user->carrier; // assuming a `hasOne` relationship

            if (!$carrier) {
                return redirect()->back()->withErrors('Carrier profile not found for this user.');
            }
            // Update the user
            $user->update([
                'name'  => $request->name,
            ]);

            $carrier->update([
                'company_address'  => $request->company_address,
                'company_name'  => $request->company_name,
                'phone'  => $request->phone,
                'authority'  => $request->authority,
                'dot'  => $request->dot,
                'mc'  => $request->mc,
                'scac_code'  => $request->scac_code,
                'country'  => $request->country,
                'caat_code'  => $request->caat_code,
                'service_category'  => $request->service_category,
            ]);

            return redirect()->route('carrier.profile.list')->with('success', 'Profile updated successfully.');
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

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
            ]);

            // Find user by ID
            $user = User::findOrFail($id);

            // Update the user
            $user->update([
                'name'  => $request->name,
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

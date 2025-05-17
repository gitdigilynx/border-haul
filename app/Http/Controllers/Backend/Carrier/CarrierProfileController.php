<?php

namespace App\Http\Controllers\Backend\Carrier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Storage;

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
                 'name'  => 'required|string|max:50',
                 'company_address'  => 'required|string|max:50',
                 'company_name'  => 'required|string|max:50',
                 'phone'  => 'required|string|max:20',
                 'authority'  => 'required|string|max:50',
                 'dot'  => 'required|string|max:50',
                 'mc'  => 'required|string|max:50',
                 'scac_code'  => 'required|string|max:10',
                 'country'  => 'required|string|max:10',
                 'caat_code'  => 'required|string|max:10',
                 'service_category'  => 'required|string|max:20',
                 'transfer_approval_documents' => 'nullable|file|mimes:pdf,jpg,jpeg,png,docx|max:10240',
                 'insurance_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png,docx|max:10240',
             ]);

             // Find user and carrier
             $user = User::findOrFail($id);
             $carrier = $user->carrier;

             if (!$carrier) {
                 return redirect()->back()->withErrors('Carrier profile not found for this user.');
             }

             // Update user basic info
             $user->update([
                 'name' => $request->name,
             ]);

             // Handle file uploads and delete old files
             if ($request->hasFile('transfer_approval_documents')) {
                 if ($carrier->transfer_approval_documents && Storage::disk('public')->exists($carrier->transfer_approval_documents)) {
                     Storage::disk('public')->delete($carrier->transfer_approval_documents);
                 }

                 $carrier->transfer_approval_documents = $request->file('transfer_approval_documents')->store('documents', 'public');
             }

             if ($request->hasFile('insurance_certificate')) {
                 if ($carrier->insurance_certificate && Storage::disk('public')->exists($carrier->insurance_certificate)) {
                     Storage::disk('public')->delete($carrier->insurance_certificate);
                 }

                 $carrier->insurance_certificate = $request->file('insurance_certificate')->store('documents', 'public');
             }

             // Update other carrier fields
             $carrier->update([
                 'company_address'     => $request->company_address,
                 'company_name'        => $request->company_name,
                 'phone'               => $request->phone,
                 'authority'           => $request->authority,
                 'dot'                 => $request->dot,
                 'mc'                  => $request->mc,
                 'scac_code'           => $request->scac_code,
                 'country'             => $request->country,
                 'caat_code'           => $request->caat_code,
                 'service_category'    => $request->service_category,
                 'transfer_approval_documents' => $carrier->transfer_approval_documents, // reassign updated paths
                 'insurance_certificate'       => $carrier->insurance_certificate,
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

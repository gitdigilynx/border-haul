<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToCarrier;
use App\Models\Carrier;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use App\Services\DocumentUploadService;
use App\Http\Requests\AdminCarrierUserRequest;
use Flasher\Laravel\Facade\Flasher;


class AdminCarrierUserController extends Controller
{
    protected $uploadService;
    public function __construct(DocumentUploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        try {
            $carriers = User::where('role', 'Carrier')
            ->whereHas('carrier')
            ->with('carrier')
            // ->where('is_active', 1)
            ->orderByDesc('created_at')
            ->get();

            return view('backend.admin.carrier.carrier-user.index', compact('carriers'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.admin.carrier.carrier-user.create');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(AdminCarrierUserRequest $request): RedirectResponse
    {
        try {
            $user = auth()->user();
            $rawPassword = Str::random(8);

            // Create the new carrier user
            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($rawPassword),
                'role' => 'Carrier',
            ]);

            // Handle file uploads
            $transferApprovalPath = $request->file('transfer_approval_documents')->store('carrier-documents', 'public');
            $insuranceCertificatePath = $request->file('insurance_certificate')->store('carrier-documents', 'public');

            Carrier::create([
                'carrier_id' => $user->id,
                'user_id' => $newUser->id,
                'company_address' => $request->company_address,
                'authority' => $request->authority,
                'dot' => $request->dot,
                'mc' => $request->mc,
                'scac_code' => $request->scac_code,
                'country' => $request->country,
                'caat_code' => $request->caat_code,
                'service_category' => $request->service_category,
                'phone' => $request->phone,
                'transfer_approval_documents' => $transferApprovalPath,
                'insurance_certificate' => $insuranceCertificatePath,
            ]);


            Mail::to($request->email)->send(new SendPasswordToCarrier($request->email, $rawPassword));

            return redirect()->route('admin.carriers')->with('success', 'Carrier created successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        try {
            $user = Carrier::with('users')->findOrFail($id);
            return view('backend.admin.carrier.carrier-user.show', compact('user'));
        } catch (\Exception $e) {
           Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.admin.carrier.carrier-user.edit');
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
            $carrier = $user->carrier;

            // Prepare carrier update data
            $carrierData = $request->only([
                'company_address',
                'authority',
                'dot',
                'mc',
                'scac_code',
                'country',
                'caat_code',
                'service_category',
                'phone',
            ]);

            // Handle file uploads
            if ($request->hasFile('transfer_approval_documents')) {
                $carrierData['transfer_approval_documents'] = $request->file('transfer_approval_documents')->store('documents');
            }

            if ($request->hasFile('insurance_certificate')) {
                $carrierData['insurance_certificate'] = $request->file('insurance_certificate')->store('documents');
            }

            // Update carrier
            if ($carrier) {
                $carrier->update($carrierData);
            }

            return redirect()->route('admin.carriers')->with('success', 'Carrier updated successfully.');
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

            return response()->json(['message' => 'Carrier deleted successfully']);
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function toggleCarrier(Request $request, $id)
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

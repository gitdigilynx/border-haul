<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CarrierDocument;
use App\Services\DocumentUploadService;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDocumentRequest;

class CarrierDocumentController extends Controller
{
    protected $uploadService;
    public function __construct(DocumentUploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        try {
            $user = auth()->user();
            $documents = CarrierDocument::with('carrier')
                ->where('carrier_id', $user->carrier->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('backend.carrier.document.index', compact('documents'));
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $carrier = $user->carrier;

            $path = $this->uploadService->upload(
                $request->file('file'),
                'asssts/carrier-documents',
                $user->id
            );

            CarrierDocument::create([
                'carrier_id' => $carrier->id,
                'document_type' => $request->document_type,
                'file_path' => $path,
                'expires_at' => $request->expires_at,
                'status' => $request->status ?? 'pending',
                'notes' => $request->notes
            ]);

            return redirect()->back()->with('success', 'Document uploaded successfully.');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(UpdateDocumentRequest $request, $id)
    {
        try {
            $document = CarrierDocument::findOrFail($id);

            $document->update([
                'document_type' => $request->document_type,
                'expires_at' => $request->expires_at,
                'status' => $request->status ?? 'pending',
                'notes' => $request->notes,
            ]);

            return redirect()->back()->with('success', 'Document updated successfully.');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $document = CarrierDocument::findOrFail($id);
            $document->delete();
            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function download($id)
    {
        try {
            $document = CarrierDocument::findOrFail($id);

            if ($document->carrier_id !== Auth::id()) {
                abort(403, 'Unauthorized');
            }

            return response()->download(storage_path('app/' . $document->file_path));
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}

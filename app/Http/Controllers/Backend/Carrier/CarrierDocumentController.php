<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CarrierDocument;
use App\Services\DocumentUploadService;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
            $documents = collect();
            if ($user->carrier) {
                $documents = CarrierDocument::with('carrier')
                    ->where('carrier_id', $user->carrier->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
            return view('backend.carrier.document.index', compact('documents'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png,docx|max:10240',
            ]);

              $user = auth()->user();
              $carrier = $user->carrier;

            // $path = $this->uploadService->upload(
            //     $request->file('file'),
            //     'asssts/carrier-documents',
            //     $user->id
            // );

                $originalName = $request->file('file_path')->getClientOriginalName();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $request->file('file_path')->getClientOriginalExtension();
                $safeName = Str::slug($filename) . '.' . $extension;

                $documentPath = $request->file('file_path')->storeAs('documents', $safeName, 'public');

             CarrierDocument::create([
                    'carrier_id' => $carrier->id,
                    'document_type' => $request->document_type,
                    'expires_at' => $request->expires_at,
                    'status' => $request->status,
                    'notes' => $request->notes,
                    'file_path' => $documentPath,
                ]);

            return redirect()->back()->with('success', 'Document uploaded successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png,docx|max:10240',
            ]);

            $document = CarrierDocument::findOrFail($id);

            // Prepare update data
            $updateData = [
                'document_type' => $request->document_type,
                'expires_at' => $request->expires_at,
                'status' => $request->status,
            ];


            if ($request->hasFile('file_path')) {
                // Delete old file if exists
                if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
                    Storage::disk('public')->delete($document->file_path);
                }

                // Get original filename and extension
                $originalName = $request->file('file_path')->getClientOriginalName();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $request->file('file_path')->getClientOriginalExtension();

                // Create a safe, slugified filename
                $safeName = Str::slug($filename) . '.' . $extension;

                // Store the new file in 'public/documents' with the safe name
                $documentPath = $request->file('file_path')->storeAs('documents', $safeName, 'public');

                // Update file path
                $updateData['file_path'] = $documentPath;
            }

            // Update the document
            $document->update($updateData);

            return redirect()->back()->with('success', 'Document updated successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
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
            Flasher::addError('Something went wrong: ' . $e->getMessage());
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
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}

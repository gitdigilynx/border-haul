
<div class="modal fade" id="carrierDocumentEdit{{ $document->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100">UPDATE DOCUMENT</h5>
            </div>


        <form id="shipperAddressBook" class="px-3 py-2 row g-3" method="POST" action="{{ isset($document) ? route('carrier.documents.update', $document->id) : route('carrier.documents.store') }}">
          @csrf

          <div class="modal-body">
            <div class="row">
            <div class="mb-2 col-md-12">
                <div>
                    <label for="serviceCategory" class="form-label">Document Type</label>
                    <select class="form-select" name="document_type" id="document_type">
                        <option value="" {{ old('document_type', $document->document_type) == '' ? 'selected' : '' }}>Select</option>
                        <option value="Docx" {{ old('document_type', $document->document_type) == 'Docx' ? 'selected' : '' }}>DOCX</option>
                        <option value="doc" {{ old('document_type', $document->document_type) == 'doc' ? 'selected' : '' }}>DOC</option>
                        <option value="Pdf" {{ old('document_type', $document->document_type) == 'Pdf' ? 'selected' : '' }}>PDF</option>
                        <option value="xls" {{ old('document_type', $document->document_type) == 'xls' ? 'selected' : '' }}>XLS</option>
                        <option value="jpg" {{ old('document_type', $document->document_type) == 'jpg' ? 'selected' : '' }}>JPG</option>
                        <option value="jpeg" {{ old('document_type', $document->document_type) == 'jpeg' ? 'selected' : '' }}>JPEG</option>
                        <option value="png" {{ old('document_type', $document->document_type) == 'png' ? 'selected' : '' }}>PNG</option>
                        <option value="gif" {{ old('document_type', $document->document_type) == 'gif' ? 'selected' : '' }}>GIF</option>
                    </select>
                </div>
            </div>


            <div class="col-md-12">
              <label for="expires_at" class="form-label">Date</label>
              <input type="date" class="form-control" name="expires_at" placeholder="Date"
                     value="{{ old('expires_at', $document->expires_at ?? '') }}" required>
            </div>

            <div class="col-md-12">
              <label for="status" class="form-label">Status</label>
              <select name="status" class="form-select" required>
                @foreach (documentStatus() as $key => $label)
                  <option value="{{ $key }}" {{ (old('status', $document->status ?? '') == $key) ? 'selected' : '' }}>
                    {{ $label }}
                  </option>
                @endforeach
              </select>
            </div>

              <!-- File Upload -->
              <div class="col-md-12">
                <label for="file" class="form-label">Upload Document</label>
                <div class="p-4 text-center border rounded upload-box" style="position: relative; background-color: #D5F2FD;">
                    <input type="file" name="file_path" accept=".zip,.rar" class="file-input"
                           style="opacity: 0; position: absolute; top: 0; left: 0; height: 100%; width: 100%; cursor: pointer;" required>
                    <div>
                        <div class="mb-2">

                            <img src="{{ asset('assets/icons/document-icon.svg') }}" alt="Upload Icon" width="40" height="40">
                        </div>
                        <strong style="color: #000;">Drag and drop files, or <span style="color: #000;">Browse</span></strong>
                        <div class="text-dark">Support zip and rar files</div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-12">
                <label for="notes" class="form-label">Note</label>
                <textarea class="form-control" name="notes" rows="4" placeholder="Notes" required>{{ old('notes', $document->notes ?? '') }}</textarea>
              </div> --}}

          </div>
          <div class="mt-3 text-center">
            <button type="submit" class="submit-btn">UPDATE</button>
        </div>
    </div>
</form>
</div>
</div>
</div>

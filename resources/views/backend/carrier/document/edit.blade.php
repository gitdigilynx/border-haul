<div class="modal fade" id="carrierDocumentEdit{{ $document->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="subUserModalLabel">Update Document</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="shipperAddressBook" class="px-3 py-2 row g-3" method="POST" action="{{ isset($document) ? route('carrier.documents.update', $document->id) : route('carrier.documents.store') }}">
          @csrf

          <div class="modal-body row">
            <div class="col-md-6">
              <label for="document_type" class="form-label">Doc Type</label>
              <input type="text" class="form-control" name="document_type" placeholder="Doc Type"
                     value="{{ old('document_type', $document->document_type ?? '') }}" required>
            </div>

            <div class="col-md-6">
              <label for="expires_at" class="form-label">Date</label>
              <input type="date" class="form-control" name="expires_at" placeholder="Date"
                     value="{{ old('expires_at', $document->expires_at ?? '') }}" required>
            </div>

            <div class="col-md-6">
              <label for="status" class="form-label">Status</label>
              <select name="status" class="form-select" required>
                @foreach (documentStatus() as $key => $label)
                  <option value="{{ $key }}" {{ (old('status', $document->status ?? '') == $key) ? 'selected' : '' }}>
                    {{ $label }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-12">
                <label for="notes" class="form-label">Note</label>
                <textarea class="form-control" name="notes" rows="4" placeholder="Notes" required>{{ old('notes', $document->notes ?? '') }}</textarea>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">{{ isset($document) ? 'Update' : 'Save' }}</button>
          </div>

        </form>
      </div>
    </div>
  </div>

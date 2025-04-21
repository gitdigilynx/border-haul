<!-- Modal -->
<div class="modal fade" id="carrierDocumentShow{{ $document->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Document View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Doc Type</th>
                            <td>{{ $document->document_type ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>{{ $document->expires_at ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>{{ $document->status ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Notes</th>
                            <td>{{ ucfirst($document->notes ?? '-') }}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="text-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

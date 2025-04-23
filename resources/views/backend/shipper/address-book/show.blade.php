<!-- Modal -->
<div class="modal fade" id="ShipperAddressBookModal{{ $document->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Address Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $address->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Street Address</th>
                            <td>{{ $address->street_address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">City</th>
                            <td>{{ $address->city ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>{{ ucfirst($address->country ?? '-') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">State</th>
                            <td>{{ ucfirst($address->state ?? '-') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>{{ $address->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Type</th>
                            <td>{{ ucfirst($address->type ?? '-') }}</td>
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

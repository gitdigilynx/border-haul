<!-- Modal -->
<div class="modal fade" id="ShipperAddressBookModal{{ $address->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="padding: 0.5rem 1rem; border-radius: 8px;">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                style="margin-left: auto;"></button>

            <div class="modal-header" style="border-bottom: none; padding: 0.5rem 0 0.25rem 0;">
                <h5 class="text-center modal-title w-100"
                    style="font-size: 1.5rem; font-family: 'Staatliches', sans-serif; margin: 0; color:black">
                    ADDRESS DETAILS
                </h5>
            </div>

            <div class="modal-body" style="padding: 0.5rem 0;">
                <table class="table table-bordered" style="font-size: 0.95rem;">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">Name</th>
                            <td>{{ $address->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">Street Address</th>
                            <td>{{ $address->street_address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">City</th>
                            <td>{{ $address->city ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">Country</th>
                            <td>{{ ucfirst($address->country ?? '-') }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">State</th>
                            <td>{{ ucfirst($address->state ?? '-') }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">Phone Number</th>
                            <td>{{ $address->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 30%; font-weight: 600;">Type</th>
                            <td>{{ ucfirst($address->type ?? '-') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3 text-center">
                    <button type="button"
                        class="btn"
                        style="background-color: #dc3545; color: white; border: none; width: 100%; padding: 10px; font-size: 1rem; font-weight: bold; border-radius: 10px;"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

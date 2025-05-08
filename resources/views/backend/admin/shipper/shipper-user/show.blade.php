<!-- Modal -->
<div class="modal fade" id="shipperShowModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Carrier View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $user->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Role</th>
                            <td>{{ ucfirst($user->role ?? '-') }}</td>
                        </tr>
                         <tr>
                            <th scope="row">Company Name</th>
                            <td>{{ ucfirst($user->shipper->company_name ?? '-') }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Compnay Address</th>
                            <td>{{ ucfirst($user->shipper->company_address ?? '-') }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Phone</th>
                            <td>{{ ucfirst($user->shipper->phone ?? '-') }}</td>
                        </tr>

                         <tr>
                            <th scope="row">Phone</th>
                            <td>{{ ucfirst($user->shipper->phone ?? '-') }}</td>
                        </tr>

                         <tr>
                            <th scope="row">Status</th>
                            <td>
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </td>
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

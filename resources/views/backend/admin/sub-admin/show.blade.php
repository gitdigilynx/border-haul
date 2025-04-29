<div class="modal fade" id="subAdminShowModal{{ $admin->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Admin Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $admin->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $admin->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Role</th>
                            <td>{{ $admin->role ?? '-' }}</td>
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

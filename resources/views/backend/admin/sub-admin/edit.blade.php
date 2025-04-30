@foreach ($subAdmins as $admin)
    <div class="modal fade" id="subAdminEditModal{{ $admin->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">
                        Edit Admin
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="subAdminForm{{ $admin->id }}" method="POST" action="{{ route('admin.sub-admin.update', $admin->id) }}">
                        @csrf

                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $admin->name) }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email) }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endforeach



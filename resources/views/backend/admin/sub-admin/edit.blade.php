<div class="modal fade" id="subAdminEditModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <h5 class="modal-title" id="exampleModalgridLabel">
                    {{ isset($user) ? 'Edit Admin' : 'Add Admin' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="subAdminForm" method="POST"
                    action="{{ isset($admin) ? route('admin.sub-admin.update', $admin->id) : route('admin.sub-admin.store') }}">
                    @csrf
                    <div class="row g-3">

                        <div class="col-xxl-6">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    value="{{ old('name', $admin->name ?? '') }}" required>
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-6">
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                    value="{{ old('email', $admin->email ?? '') }}" required>
                            </div>
                        </div><!--end col-->


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit"
                                class="btn btn-success">{{ isset($admin) ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

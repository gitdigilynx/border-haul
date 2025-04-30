
@foreach ($permissions as $permission)
<div class="modal fade" id="permissionEditModal{{ $permission->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">
                    {{ isset($permission) ? 'Edit Permission' : 'Add Permission' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="permissionForm" method="POST"
                    action="{{ isset($permission) ? route('admin.permissions.update', $permission->id) : route('admin.permissions.store') }}">
                    @csrf
                    <div class="row g-3">

                        <div class="col-xxl-6">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    value="{{ old('name', $permission->name ?? '') }}" required>
                            </div>
                        </div><!--end col-->


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit"
                                class="btn btn-success">{{ isset($permission) ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach

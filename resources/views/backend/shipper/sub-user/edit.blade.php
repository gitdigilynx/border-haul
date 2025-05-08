<div class="modal fade" id="subShipperEditModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="driverModalLabel">
                    {{ isset($user) ? 'Update Sub User' : 'Add Sub User' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="shipperForm" method="POST"
                action="{{ isset($user) ? route('shipper.sub-users.update', $user->id) : route('shipper.sub-users.store') }}">
                @csrf
                <div class="modal-body row">
                    <div class="mb-3 col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                            value="{{ old('name', $user->users->name ?? '') }}" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email"
                            value="{{ old('email', $user->users->email ?? '') }}" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" placeholder="Role"
                            value="{{ old('role', $user->users->role ?? '') }}">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        {{ isset($user) ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

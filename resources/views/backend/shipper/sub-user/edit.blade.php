<div class="modal fade" id="subShipperEditModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal-content custom-modal">

            <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header custom-modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100 custom-modal-title">
                    {{ isset($user) ? 'Update Sub User' : 'Add Sub User' }}
                </h5>
            </div>

            <form id="shipperForm" method="POST"
                action="{{ isset($user) ? route('shipper.sub-users.update', $user->id) : route('shipper.sub-users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="name" class="form-label label-custom">Name</label>
                        <input type="text" class="form-control input-custom" name="name" placeholder="Enter Name"
                            value="{{ old('name', $user->users->name ?? '') }}" required>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label label-custom">Email</label>
                        <input type="email" class="form-control input-custom" name="email" placeholder="Enter Email"
                            value="{{ old('email', $user->users->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label label-custom">Role</label>
                        <input type="text" class="form-control input-custom" name="role" placeholder="Enter Role"
                            value="{{ old('role', $user->users->role ?? '') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="submit-btn">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

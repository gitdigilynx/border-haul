<div class="modal fade" id="carrierEditModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header" style="border-bottom: none;">
                <h5 class="text-center modal-title w-100">
                    UPDATE TRUCK
                </h5>
            </div>
            <form id="carrierForm" method="POST" action="{{ route('carrier.carrier-users.update', $user->id) }}">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name"
                                value="{{ old('name', $user->users->name ?? '') }}" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="last_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                value="{{ old('last_name', $user->users->last_name ?? '') }}" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                value="{{ old('email', $user->users->email ?? '') }}" required readonly>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

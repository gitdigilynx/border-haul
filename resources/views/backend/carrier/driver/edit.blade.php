<div class="modal fade" id="driverEdit{{ $driver->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-width"> {{-- Optional custom width --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="driverModalLabel">
                    {{ isset($driver) ? 'Edit Driver' : 'Add Driver' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="driverForm" method="POST"
                action="{{ isset($driver) ? route('carrier.drivers.update', $driver->id) : route('carrier.drivers.store') }}">
                @csrf

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name"
                                value="{{ old('name', $driver->name ?? '') }}" required>
                        </div>

                        <div class="col-xxl-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" placeholder="Phone Number"
                                value="{{ old('phone_number', $driver->phone_number ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        {{ isset($driver) ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

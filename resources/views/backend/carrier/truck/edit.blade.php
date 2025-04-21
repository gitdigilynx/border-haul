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
                            <label for="plate_number" class="form-label">Plate Number</label>
                            <input type="text" class="form-control" name="plate_number" placeholder="Plate Number"
                                value="{{ old('plate_number', $driver->plate_number ?? '') }}" required>
                        </div>

                        <div class="col-xxl-6">
                            <label for="trucker_number" class="form-label">Trucker Number (Optional)</label>
                            <input type="text" class="form-control" name="trucker_number" placeholder="Trucker Number"
                                value="{{ old('trucker_number', $driver->trucker_number ?? '') }}">
                        </div>

                        <div class="col-xxl-6">
                            <label for="service_category" class="form-label">Service Category</label>
                            <input type="text" class="form-control" name="service_category" placeholder="Service Category"
                                value="{{ old('service_category', $driver->service_category ?? '') }}" required>
                        </div>

                        <div class="col-xxl-6">
                            <label for="in_service" class="form-label">In Service</label>
                            <select class="form-control" name="in_service" required>
                                <option value="">Select</option>
                                <option value="1" {{ old('in_service', $driver->in_service ?? '') == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('in_service', $driver->in_service ?? '') == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="col-xxl-6">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Location"
                                value="{{ old('location', $driver->location ?? '') }}" required>
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

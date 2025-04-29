<div class="modal fade" id="truckEdit{{ $truck->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="driverModalLabel">
                    {{ isset($truck) ? 'Update Truck/Driver' : 'Add Truck/Driver' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="truckForm" method="POST"
                action="{{ isset($truck) ? route('carrier.trucks.update', $truck->id) : route('carrier.trucks.store') }}">
                @csrf
                <div class="modal-body row">
                    <div class="mb-3 col-md-6">
                        <label for="driverName" class="form-label">Driver Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                            value="{{ old('name', $truck->driver->name ?? '') }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone"
                            value="{{ old('phone_number', $truck->driver->phone_number ?? '') }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="plateNumber" class="form-label">Plate Number</label>
                        <input type="text" class="form-control" name="plate_number" placeholder="Plate Number"
                            value="{{ old('plate_number', $truck->plate_number ?? '') }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="truckerNumber" class="form-label">Trucker Number</label>
                        <input type="text" class="form-control" name="trucker_number" placeholder="Trucker Number"
                            value="{{ old('trucker_number', $truck->trucker_number ?? '') }}">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="serviceCategory" class="form-label">Service Category</label>
                        <select class="form-control" name="service_category" required>
                            <option value="">Select Category</option>
                            <option value="general_cargo" {{ old('service_category', $truck->service_category ?? '') === 'general_cargo' ? 'selected' : '' }}>General Cargo</option>
                            <option value="reefer" {{ old('service_category', $truck->service_category ?? '') === 'reefer' ? 'selected' : '' }}>Reefer</option>
                            <option value="hazmat" {{ old('service_category', $truck->service_category ?? '') === 'hazmat' ? 'selected' : '' }}>Hazmat</option>
                            <option value="flatbed" {{ old('service_category', $truck->service_category ?? '') === 'flatbed' ? 'selected' : '' }}>Flatbed</option>
                            <option value="rgn" {{ old('service_category', $truck->service_category ?? '') === 'rgn' ? 'selected' : '' }}>RGN</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="inService" class="form-label">In Service</label>
                        <select class="form-control" name="in_service" required>
                            <option value="">Select</option>
                            <option value="1" {{ old('in_service', $truck->in_service ?? '') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('in_service', $truck->in_service ?? '') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Location"
                            value="{{ old('location', $truck->location ?? '') }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        {{ isset($truck) ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

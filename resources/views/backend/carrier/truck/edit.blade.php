<div class="modal fade" id="truckEdit{{ $truck->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100">UPDATE TRUCK</h5>
            </div>

            <form id="truckForm" method="POST"
                action="{{ isset($truck) ? route('carrier.trucks.update', $truck->id) : route('carrier.trucks.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="mt-2 col-md-6">
                            <label for="truckNumber" class="form-label">Track Plate</label>
                            <input type="text" class="form-control" name="plate_number"
                                value="{{ old('plate_number', $truck->plate_number ?? '') }}" placeholder="Enter Plate Number"
                                required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="truckerNumber" class="form-label">Truck #</label>
                            <input type="text" class="form-control" name="trucker_number"
                                value="{{ old('trucker_number', $truck->trucker_number ?? '') }}"
                                placeholder="Enter Trucker Number" required>
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="serviceCategory" class="form-label">Service Category</label>
                        <select class="form-control" name="service_category" required>
                            <option value="">Select Category</option>
                            <option
                                value="General Cargo"{{ old('service_category', $truck->service_category ?? '') === 'general_cargo' ? 'selected' : '' }}>
                                General Cargo</option>
                            <option
                                value="Reefer"{{ old('service_category', $truck->service_category ?? '') === 'reefer' ? 'selected' : '' }}>
                                Reefer</option>
                            <option
                                value="Hazmat"{{ old('service_category', $truck->service_category ?? '') === 'hazmat' ? 'selected' : '' }}>
                                Hazmat</option>
                            <option
                                value="Flatbed"{{ old('service_category', $truck->service_category ?? '') === 'flatbed' ? 'selected' : '' }}>
                                Flatbed</option>
                            <option
                                value="RGN"{{ old('service_category', $truck->service_category ?? '') === 'rgn' ? 'selected' : '' }}>
                                RGN</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-6">
                            <label for="driverName" class="form-label">Driver Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $truck->driver->name ?? '') }}" placeholder="Enter Drvier Name"
                                required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="driverPhone" class="form-label">Driver Phone NO.</label>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ old('phone_number', $truck->driver->phone_number ?? '') }}"
                                placeholder="Enter Trucker" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-12">
                            <label for="inService" class="form-label">In Service</label>
                            <select class="form-control" name="in_service" required>
                                <option value="">Select</option>
                                <option value="1"
                                    {{ old('in_service', $truck->in_service ?? '') == 1 ? 'selected' : '' }}>Yes
                                </option>
                                <option value="0"
                                    {{ old('in_service', $truck->in_service ?? '') == 0 ? 'selected' : '' }}>No
                                </option>
                            </select>
                        </div>

                        <div class="mt-2 mb-2 col-md-12">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location"
                                value="{{ old('location', $truck->location ?? '') }}" placeholder="Enter Location"
                                required>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" class="submit-btn">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

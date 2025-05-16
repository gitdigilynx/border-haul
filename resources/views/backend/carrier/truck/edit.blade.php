<div class="modal fade" id="truckEdit{{ $truck->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">

            <div class="modal-header border-bottom-0 p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <h5 class="text-center modal-title w-100">UPDATE TRUCK</h5>

            <form id="editTruckForm" method="POST"
                action="{{ isset($truck) ? route('carrier.trucks.update', $truck->id) : route('carrier.trucks.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="mt-2 col-md-6">
                            <label for="truckNumber" class="form-label">Track Plate <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="plate_number"
                                value="{{ old('plate_number', $truck->plate_number ?? '') }}"
                                placeholder="Enter Plate Number" required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="truckerNumber" class="form-label">Truck ID <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="trucker_number"
                                value="{{ old('trucker_number', $truck->trucker_number ?? '') }}"
                                placeholder="Enter Trucker Number" required>
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="serviceCategory" class="form-label">Service Category <span
                                class="text-danger">*</span></label>
                        <select class="form-control" name="service_category" required>
                            <option value="">Select Category</option>
                            <option
                                value="General Cargo"{{ old('service_category', $truck->service_category ?? '') === 'General Cargo' ? 'selected' : '' }}>
                                General Cargo</option>
                            <option
                                value="Reefer"{{ old('service_category', $truck->service_category ?? '') === 'Reefer' ? 'selected' : '' }}>
                                Reefer</option>
                            <option
                                value="Hazmat"{{ old('service_category', $truck->service_category ?? '') === 'Hazmat' ? 'selected' : '' }}>
                                Hazmat</option>
                            <option
                                value="Flatbed"{{ old('service_category', $truck->service_category ?? '') === 'Flatbed' ? 'selected' : '' }}>
                                Flatbed</option>
                            <option
                                value="RGN"{{ old('service_category', $truck->service_category ?? '') === 'RGN' ? 'selected' : '' }}>
                                RGN</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-6">
                            <label for="driverName" class="form-label">Driver Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $truck->driver->name ?? '') }}" placeholder="Enter Drvier Name"
                                required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="driverPhone" class="form-label">Driver Phone NO. <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ old('phone_number', $truck->driver->phone_number ?? '') }}"
                                placeholder="Enter Trucker" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-12">
                            <label for="inService" class="form-label">In Service <span
                                    class="text-danger">*</span></label>
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
                            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>


<script>
    // OR, allow multiple formats
    $('input[name="phone_number"]').inputmask({
        mask: ['(999) 999-9999', '+52-999-999-9999'],
        greedy: false,
        showMaskOnHover: false,
        showMaskOnFocus: false, // hide mask while typing
        autoUnmask: true,
        oncomplete: function() {
            // Format on completion
            const input = $(this);
            const value = input.inputmask.unmaskedvalue();

            // Custom formatting
            if (value.length === 10) {
                input.val('(' + value.slice(0, 3) + ') ' + value.slice(3, 6) + '-' + value.slice(6));
            } else if (value.length === 13 && value.startsWith('52')) {
                input.val('+52-' + value.slice(2, 5) + '-' + value.slice(5, 8) + '-' + value.slice(8));
            }
        }
    });

    $('#editTruckForm').validate({
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group, .col-md-6, .col-md-12').find('.invalid-feedback').remove();
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        rules: {
            plate_number: {
                required: true
            },
            trucker_number: {
                required: true
            },
            service_category: {
                required: true
            },
            name: {
                required: true,
                minlength: 2
            },
            phone_number: {
                required: true,
                minlength: 10,
                maxlength: 17
            },
            in_service: {
                required: true
            },
            location: {
                required: true
            }
        },
        messages: {
            plate_number: "Please enter the plate number",
            trucker_number: "Please enter the trucker number",
            service_category: "Please select a service category",
            name: "Please enter the driver's name",
            phone_number: {
                required: "Please enter the driver's phone number",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number must not exceed 15 digits",
                digits: "Phone number should contain only digits"
            },
            in_service: "Please select the in-service status",
            location: "Please enter the location"
        }
    });
</script>

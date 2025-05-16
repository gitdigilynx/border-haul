<!-- Modal -->
<div class="modal fade" id="truckUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content custom-modal">
            <div class="modal-header border-bottom-0 p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <h5 class="text-center modal-title w-100" id="subUserModalLabel">ADD TRUCK</h5>

            <form id="truckForm" method="POST" action="{{ route('carrier.trucks.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mt-2 col-md-6">
                            <label for="truckNumber" class="form-label">Track Plate *</label>
                            <input type="text" class="form-control" name="plate_number"
                                placeholder="Enter Plate Number" required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="truckerNumber" class="form-label">Truck ID *</label>
                            <input type="text" class="form-control" name="trucker_number"
                                placeholder="Enter Trucker Number" required>
                        </div>
                    </div>

                    <div class="mt-2 col-md-12">
                        <div>
                            <label for="serviceCategory" class="form-label">Service Category *</label>
                            <select class="form-select" name="service_category" id="serviceCategory">
                                <option value="" selected>Select</option>
                                <option value="General Cargo">General Cargo</option>
                                <option value="Reefer">Reefer</option>
                                <option value="Hazmat">Hazmat</option>
                                <option value="Flatbed">Flatbed</option>
                                <option value="RGN">RGN</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-6">
                            <label for="driverName" class="form-label">Driver Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Drvier Name"
                                required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="driverPhone" class="form-label">Driver Phone NO. *</label>
                            <input type="text" class="form-control" name="phone_number" placeholder="Enter Trucker "
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-12">
                            <label for="inService" class="form-label">In Service *</label>
                            <select class="form-control" name="in_service" required>
                                <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="mt-2 mb-2 col-md-12">
                            <label for="location" class="form-label">Location *</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter Location"
                                required>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" class="submit-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#truckForm').validate({
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
                maxlength: 15
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

<style>
    .text-danger,
    .invalid-feedback {
        font-size: 0.875em;
        margin-top: 0.25rem;
    }
</style>

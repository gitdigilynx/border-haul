<!-- Modal -->
<div class="modal fade" id="truckUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add Truck/Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="truckForm" method="POST" action="{{ route('carrier.trucks.store') }}">
                @csrf
                <div class="modal-body row">

                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Driver Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="phoneNumber" class="form-label">Driver Phone</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone" required>
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="truckNumber" class="form-label">Track Plate</label>
                        <input type="text" class="form-control" name="plate_number" placeholder="Enter Plate Number"
                            required>
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="truckerNumber" class="form-label">Truck #</label>
                        <input type="text" class="form-control" name="trucker_number"
                            placeholder="Enter Trucker Number">
                    </div>


                    <div class="mt-2 col-md-6">
                        <div>
                            <label for="serviceCategory" class="form-label">Service Category</label>
                            <select class="form-select" name="service_category" id="serviceCategory">
                                <option value="" selected>Select</option>
                                <option value="general_cargo">General Cargo</option>
                                <option value="reefer">Reefer</option>
                                <option value="hazmat">Hazmat</option>
                                <option value="flatbed">Flatbed</option>
                                <option value="RGN">rgn</option>
                            </select>
                        </div>
                    </div>


                    <div class="mt-2 col-md-6">
                        <label for="inService" class="form-label">In Service</label>
                        <select class="form-control" name="in_service" required>
                            <option value="">Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>


                    <div class="mt-2 mb-2 col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter Location"
                            required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- end row -->

            </form> <!-- end form -->
        </div> <!-- end modal body -->
    </div> <!-- end modal content -->
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('#truckForm').validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group, .col-md-6').find('.invalid-feedback').remove();
                error.insertAfter(element);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },

                phone_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 15
                },
            },
            messages: {
                name: "Please enter your first name",
                phone_number: {
                    required: "Please enter your phone number",
                    minlength: "Phone number must be at least 10 digits",
                    maxlength: "Phone number must not exceed 15 digits",
                    digits: "Phone number should contain only digits"
                },
            }
        });
    });
</script>

<style>
    .text-danger,
    .invalid-feedback {
        font-size: 0.875em;
        margin-top: 0.25rem;
    }
</style>

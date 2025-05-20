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
                            <label for="truckNumber" class="form-label">Track Plate <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="plate_number"
                                placeholder="Enter Plate Number" required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="truckerNumber" class="form-label">Truck ID <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="trucker_number"
                                placeholder="Enter Trucker Number" required>
                        </div>
                    </div>

                    <div class="mt-2 col-md-12">
                        <div>
                            <label for="serviceCategory" class="form-label">Service Category <span
                                    class="text-danger">*</span></label>
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
                            <label for="driverName" class="form-label">Driver Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Driver Name"
                                required>
                        </div>

                        <div class="mt-2 col-md-6">
                            <label for="phone_number" class="form-label">Driver Phone No. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone No">
                            <div class="invalid-feedback"></div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="mt-2 col-md-12">
                            <label for="inService" class="form-label">In Service <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="in_service" required>
                                <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="mt-2 mb-2 col-md-12">
                            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
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
                maxlength: 20
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

//  phone number format for us and mexico

document.addEventListener('DOMContentLoaded', function () {
    const phoneFields = [
        {
            input: document.getElementById('phone_number'),
            error: document.getElementById('phone_number')?.nextElementSibling
        }
    ];

    const allPatterns = [
        // US formats
        /^\d{3}-\d{3}-\d{4}$/,
        /^\(\d{3}\)\s?\d{3}-\d{4}$/,
        /^\d{3}\.\d{3}\.\d{4}$/,
        /^\+1\s\d{3}\s\d{3}\s\d{4}$/,
        /^\+1\d{10}$/,
        /^\+1\s\(\d{3}\)\s\d{3}-\d{4}$/,
        // Mexico formats
        /^\d{2}-\d{4}-\d{4}$/,
        /^\+52\s1\s\d{2}\s\d{4}\s\d{4}$/,
        /^\+52\s\d{2}\s\d{4}\s\d{4}$/,
        /^\+521\d{8}$/,
        /^\+5255\d{8}$/
    ];

    const allExamples = [
        '(123) 456-7890',
        '+1 123 456 7890',
        '+52 1 55 1234 5678',
        '+52 55 1234 5678'
    ];

    function validatePhone(inputEl, errorEl) {
        const value = inputEl.value.trim();

        if (value === '') {
            // Don't validate or show error on empty input
            inputEl.classList.remove('is-invalid');
            errorEl.innerHTML = '';
            errorEl.style.display = 'none';
            return;
        }

        const isValid = allPatterns.some(pattern => pattern.test(value));

        if (!isValid) {
            inputEl.classList.add('is-invalid');
            errorEl.innerHTML = `Invalid phone format.<br>Examples:<br>${allExamples.join('<br>')}`;
            errorEl.style.display = 'block';
        } else {
            inputEl.classList.remove('is-invalid');
            errorEl.innerHTML = '';
            errorEl.style.display = 'none';
        }
    }

    // function setPlaceholders() {
    //     phoneFields.forEach(({ input }) => {
    //         if (input) {
    //             input.placeholder = `e.g., ${allExamples[0]}`;
    //         }
    //     });
    // }

    // Attach events
    phoneFields.forEach(({ input, error }) => {
        if (input) {
            input.addEventListener('input', () => validatePhone(input, error));
        }
    });

    // Set placeholder only (no initial validation)
    setPlaceholders();
});

</script>

<style>
    .text-danger,
    .invalid-feedback {
        font-size: 0.875em;
        margin-top: 0.25rem;
    }


</style>

<!-- Modal -->
<div class="modal fade" id="truckUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="truckForm" method="POST" action="{{ route('carrier.trucks.store') }}">
                      @csrf
                       <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="plateNumber" class="form-label">Plate Number</label>
                                    <input type="text" class="form-control" name="plate_number" placeholder="Enter Plate Number" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="truckerNumber" class="form-label">Trucker Number (Optional)</label>
                                    <input type="text" class="form-control" name="trucker_number" placeholder="Enter Trucker Number">
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="serviceCategory" class="form-label">Service Category</label>
                                      <select class="form-select" name="service_category">
                                        <option value="" selected="">Select</option>
                                        @foreach (serviceDirverCategory() as $key => $service_category)
                                            <option value="{{ $key }}">{{ $service_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="inService" class="form-label">In Service</label>
                                    <select class="form-control" name="in_service" required>
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="Enter Location" required>
                                </div>
                            </div><!--end col-->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div><!-- end row -->

                    </form> <!-- end form -->
                </div> <!-- end modal body -->
            </div> <!-- end modal content -->
        </div>
    </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#truckForm').validate({
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorElement: 'div',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group, .col-md-6').find('.invalid-feedback').remove();
          error.insertAfter(element);
        },
        highlight: function (element) {
          $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element) {
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

<!-- Modal -->
<div class="modal fade" id="carrierDocuments" tabindex="-1" aria-labelledby="subUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="subUserModalLabel">Add Document</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="documents" class="px-3 py-2 row g-3" method="POST" action="{{ route('carrier.documents.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <!-- Document Type -->
                    <div class="col-md-6">
                        <label for="document_type" class="form-label">Document Type</label>
                        <input type="text" class="form-control" name="document_type" placeholder="Insurance Certificate" required>
                    </div>

                    <!-- File Upload -->
                    <div class="col-md-6">
                        <label for="file" class="form-label">Upload Document</label>
                        <input type="file" class="form-control" name="file" accept=".pdf,.jpg,.jpeg,.png" required>
                    </div>

                    <!-- Expiration Date -->
                    <div class="col-md-6">
                        <label for="expires_at" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control" name="expires_at">
                    </div>

                    <div class="col-md-6">
                        <label for="expires_at" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="" selected="">Select</option>
                            @foreach (documentStatus() as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Notes -->
                    <div class="col-md-12">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Optional notes..."></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#documents').validate({
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
          shipper_id: {
            required: true,
            digits: true
          },
          name: {
            required: true,
            minlength: 2
          },
          phone: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 15
          },
          street_address: {
            required: true,
            minlength: 5
          },
          city: {
            required: true,
            minlength: 2
          },
          state: {
            minlength: 2
          },
          postal_code: {
            minlength: 2,
            maxlength: 20
          },
          country: {
            required: true,
            minlength: 2
          },
          type: {
            required: true,
            minlength: 2
          }
        },
        messages: {
          shipper_id: "Please enter a valid shipper ID",
          name: {
            required: "Please enter the contact name",
            minlength: "Name must be at least 2 characters"
          },
          phone: {
            required: "Please enter your phone number",
            digits: "Phone number should contain only digits",
            minlength: "Phone number must be at least 10 digits",
            maxlength: "Phone number must not exceed 15 digits"
          },
          street_address: {
            required: "Please enter the street address",
            minlength: "Street address must be at least 5 characters"
          },
          city: {
            required: "Please enter the city",
            minlength: "City must be at least 2 characters"
          },
          state: {
            minlength: "State must be at least 2 characters"
          },
          postal_code: {
            minlength: "Postal code must be at least 2 characters",
            maxlength: "Postal code must not exceed 20 characters"
          },
          country: {
            required: "Please enter the country",
            minlength: "Country must be at least 2 characters"
          },
          type: {
            required: "Please select a type",
            minlength: "Please select a valid type"
          }
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

<!-- Modal -->
    <div class="modal fade" id="carrierDocuments" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100" id="subUserModalLabel">ADD DOCUMENTS</h5>
            </div>

            <form id="documents" method="POST" action="{{ route('carrier.documents.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                    <!-- Document Type -->
                    <div class="mb-2 col-md-12">
                        <div>
                            <label for="serviceCategory" class="form-label">Document Type<span class="text-danger">*</span></label>
                            <select class="form-select" name="document_type" id="document_type">
                                <option value="" selected>Select Document</option>
                                <option value="Insurance Certificate">Insurance Certificate</option>
                                <option value="Transfer Authority">Transfer Authority</option>
                                <option value="Vehicle Registration">Vehicle Registration</option>
                                <option value="Business License">Business License</option>
                                <option value="Compliance Document">Compliance Document</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Expiration Date -->
                    <div class="mb-2 col-md-12">
                        <label for="expires_at" class="form-label">Expiration Date ( Optional )</label>
                        <input type="date" class="form-control" name="expires_at">
                    </div>

                    <div class="mb-2 col-md-12">
                        <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                        <select class="form-select" name="status">
                            <option value="" selected="">Select Status</option>
                            <option value="Verified">Verified</option>
                            <option value="Submitted">Submitted</option>
                            <option value="Under Review">Under Review</option>
                        </select>
                    </div>
                    <!-- File Upload -->
                    <div class="col-md-12">
                        <label for="file" class="form-label">Upload Document<span class="text-danger">*</span></label>
                        <div class="p-4 text-center border rounded upload-box" style="position: relative; background-color: #D5F2FD;">
                            <input type="file"
                                name="file_path"
                                accept=".pdf,.jpg,.jpeg,.png,.docx"
                                class="file-input"
                                   style="opacity: 0; position: absolute; top: 0; left: 0; height: 100%; width: 100%; cursor: pointer;" required>
                            <div>
                                <div class="mb-2">

                                    <img src="{{ asset('assets/icons/document-icon.svg') }}" alt="Upload Icon" width="40" height="40">
                                </div>
                                <strong style="color: #000;">Drag and drop files, or <span style="color: #000;">Browse</span></strong>
                                <div class="text-dark">Support File: PDF, JPG, PNG, DOCX (Max 10MB)”</div>
                            </div>
                        </div>
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

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>



  <script>
    // Custom filesize method (for max 10MB)
    $.validator.addMethod("filesize", function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param);
    }, "File size must be less than {0}");

    $("#documents").validate({
        rules: {
            document_type: {
                required: true
            },
            // expires_at: {
            //     required: true,
            //     date: true
            // },
            status: {
                required: true
            },
            file_path: {
                extension: "pdf|jpg|jpeg|png|",
                filesize: 10485760 // 10MB
            }
        },
        messages: {
            document_type: {
                required: "Missing document type"
            },
            expires_at: {
                required: "Expiration date is required",
                date: "Invalid date format"
            },
            status: {
                required: "Status is required"
            },
            file_path: {
                required: "Missing file upload",
                extension: "Unsupported file format",
                filesize: "File must be less than 10MB"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.closest('.upload-box').length) {
                element.closest('.upload-box').append(error);
            } else {
                element.closest('.mb-2, .col-md-12').append(error);
            }
        }
    });
</script>

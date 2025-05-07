
<!-- Modal -->
<div class="modal fade" id="ShipperUserCreate" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invite User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="carrierUserForm" method="POST" action="{{ route('admin.shippers.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <!-- Document Type -->
                    <div class="mb-2 col-md-6">
                        <label for="name" class="form-label">Shipper Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="company_address" class="form-label">Company Addres <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_address" placeholder="Company Address" required>
                    </div>

                     <div class="mb-2 col-md-6">
                        <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                    </div>

                     <!-- Service Category -->

                     <div class="mb-2 col-md-6">
                        <label for="service_category" class="form-label">Service Category <span class="text-danger">*</span></label>
                             <select class="form-select" name="service_category">
                                <option value="" selected="">Select</option>
                                 @foreach (serviceCategory() as $key => $services_category)
                                <option value="{{ $key }}">{{ $services_category }}</option>
                                 @endforeach
                            </select>
                        </div>


                      <div class="mb-2 col-md-6">
                        <label for="is_active" class="form-label">Status <span class="text-danger">*</span></label>
                             <select class="form-select" name="is_active">
                                <option value="" selected="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Invite</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

<script>
$(document).ready(function () {
    $('#carrierUserForm').validate({
        rules: {
            name: { required: true },
            email: { required: true, email: true },
            role: { required: true },
            company_address: { required: true },
            dot: { required: true },
            mc: { required: true },
            scac_code: { required: true },
            mexico: { required: true },
            caat_code: { required: true },
            service_category: { required: true },
            status: { required: true },
            transfer_approval_documents: { required: true },
            insurance_certificate: { required: true },
        },
        messages: {
            name: "Please enter name",
            email: {
                required: "Please enter email",
                email: "Please enter a valid email"
            },
            role: "Please enter role",
            company_address: "Please enter company address",
            dot: "Please enter DOT",
            mc: "Please enter MC",
            scac_code: "Please enter SCAC Code",
            mexico: "Please select a country",
            caat_code: "Please enter CAAT Code",
            service_category: "Please select service category",
            status: "Please select status",
            transfer_approval_documents: "Please upload transfer approval document",
            insurance_certificate: "Please upload insurance certificate"
        },
        errorElement: 'div',
        errorClass: 'text-danger',
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
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

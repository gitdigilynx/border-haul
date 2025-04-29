<!-- Modal -->
<div class="modal fade" id="subAdmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="subAdminForm" method="POST" action="{{ route('admin.sub-admin.store') }}">
                    @csrf
                    <div class="row g-3">

                        <div class="col-xxl-6">
                            <div>
                                <label for="first_name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-6">
                            <div>
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                            </div>
                        </div><!--end col-->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and jQuery Validate -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('#subAdminForm').validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
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
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                name: "Please enter your name",
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
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

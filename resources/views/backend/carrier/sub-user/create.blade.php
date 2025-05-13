<!-- Modal -->
    <div class="modal fade" id="carrierUserCreate" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-header" style="border-bottom: none;">
                    <h5 class="text-center modal-title w-100">
                        ADD SUB USER
                    </h5>
                </div>

            <form id="carrierUserForm" method="POST" action="{{ route('carrier.carrier-users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">First Name </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Entr First Name" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Last Name </label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                    </div>
                    </div>
                    <div class="mb-4 col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn">Invite</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $('#carrierUserForm').validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            rules: {
                first_name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                first_name: "Please enter your first name",
                last_name: "Please enter your last name",
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
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

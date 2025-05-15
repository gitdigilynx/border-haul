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
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Entr First Name" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Last Name </label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Enter Last Name" required>
                        </div>
                    </div>
                    <div class="mb-4 col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter Email" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn">Invite</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#carrierUserForm').validate({
        rules: {
            name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: '/carrier/check-email', // your route to check email availability
                    type: 'POST',
                    data: {
                        _token: function() {
                            return $('#carrierUserForm input[name="_token"]')
                                .val(); // get CSRF token from form
                        },
                        email: function() {
                            return $('#email').val(); // send current email value for validation
                        }
                    }
                }
            }
        },
        messages: {
            name: {
                required: "First name is required"
            },
            last_name: {
                required: "Last name is required"
            },
            email: {
                required: "Email is required",
                email: "Please enter a valid email",
                remote: "Email is already taken"
            }
        },
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorElement: 'div',
        highlight: function(element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
            error.addClass('invalid-feedback');
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

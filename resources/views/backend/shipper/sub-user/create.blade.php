<div class="modal fade" id="subUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header" style="border-bottom: none;">
                <h5 class="text-center modal-title w-100">
                    Deliver More, Stress Less to Invite Your Team
                </h5>
            </div>

            <form id="subUserForm" method="POST" action="{{ route('shipper.sub-users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter First Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="last_name" class="form-label">Last Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Email Address <span
                        class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                            value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>


<script>
    $("#subUserForm").validate({
        rules: {
            name: {
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
            }
        },
        messages: {
            name: {
                required: "First name is required",
                minlength: "First name must be at least 2 characters"
            },
            last_name: {
                required: "Last name is required",
                minlength: "Last name must be at least 2 characters"
            },
            email: {
                required: "Email is required",
                email: "Please enter a valid email address"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },

        submitHandler: function (form) {
            let email = $("#email").val();

            $.ajax({
                url: '{{ route("shipper.check.email") }}',
                method: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.exists) {
                        let emailField = $("#email");
                        emailField.addClass("is-invalid");
                        emailField.next('.invalid-feedback').remove();
                        emailField.after('<div class="invalid-feedback">Email already exists</div>');
                    } else {
                        form.submit();
                    }
                }
            });
        }

    });
</script>


<div class="modal fade" id="subShipperEditModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal-content custom-modal">

            <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header custom-modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100 custom-modal-title">
                    {{ isset($user) ? 'Update Sub User' : 'Add Sub User' }}
                </h5>
            </div>

            <form id="editSubForm" method="POST"
                action="{{ isset($user) ? route('shipper.sub-users.update', $user->id) : route('shipper.sub-users.store') }}">

                @csrf
                @isset($user)
                    @method('PUT')
                @endisset

                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label label-custom">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-custom" name="name" id="name"
                                placeholder="Enter Name" value="{{ old('name', $user->user->name ?? '') }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="last_name" class="form-label label-custom">Last Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-custom" name="last_name" id="last_name"
                                placeholder="Enter Last Name" value="{{ old('last_name', $user->user->last_name ?? '') }}">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label label-custom">Email<span class="text-danger">*</span></label>
                        <input type="email"
                               class="form-control input-custom "
                               name="email"

                               placeholder="Enter Email"
                               value="{{ old('email', $user->user->email ?? '') }}" disabled>

                    </div>


                    <div class="text-center">
                        <button type="submit" class="submit-btn">
                            {{ isset($user) ? 'Update' : 'Submit' }} <!-- Fixed typo -->
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>


<script>
    $("#editSubForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 1
            },
            last_name: {
                required: true,
                minlength: 1
            },
            // email: {
            //     required: true,
            //     email: true
            // }
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
            // email: {
            //     required: "Email is required",
            //     email: "Please enter a valid email address"
            // }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },

    });
</script>

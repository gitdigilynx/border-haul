<div class="modal fade" id="carrierEditModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <div class="modal-header border-bottom-0 p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <h5 class="text-center modal-title w-100">
                UPDATE SUB USER
            </h5>
            <form id="carrierForm" method="POST"
                action="{{ route('carrier.carrier-users.update', $user->users->id) }}">
                @csrf
                <input type="hidden" name="id" value="{{ $user->users->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">First Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Name"
                                value="{{ old('name', $user->users->name ?? '') }}" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="last_name" class="form-label">Last Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                value="{{ old('last_name', $user->users->last_name ?? '') }}" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                value="{{ old('email', $user->users->email ?? '') }}" required readonly disabled>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#carrierForm').validate({
        rules: {
            name: {
                required: true
            },
            last_name: {
                required: true
            },
        },
        messages: {
            name: {
                required: "First name is required"
            },
            last_name: {
                required: "Last name is required"
            },

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

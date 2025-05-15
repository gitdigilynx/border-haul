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
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
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

<script>
    $(function () {
      $('#subUserForm').on('submit', function (e) {
        let isValid = true;
        const fields = [
          { id: 'first_name', name: 'First Name', maxLength: 50 },
          { id: 'last_name', name: 'Last Name', maxLength: 50 },
          { id: 'email', name: 'Email', email: true }
        ];

        // Clear previous errors
        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');

        fields.forEach(({ id, name, email, maxLength }) => {
          const $field = $('#' + id);
          const val = $field.val().trim();

          if (!val) {
            isValid = false;
            $field.addClass('is-invalid');
            $field.after(`<div class="invalid-feedback">${name} is required.</div>`);
          } else if (maxLength && val.length > maxLength) {
            isValid = false;
            $field.addClass('is-invalid');
            $field.after(`<div class="invalid-feedback">${name} must be at most ${maxLength} characters.</div>`);
          } else if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
            isValid = false;
            $field.addClass('is-invalid');
            $field.after(`<div class="invalid-feedback">Please enter a valid ${name.toLowerCase()}.</div>`);
          }
        });

        if (!isValid) e.preventDefault();
      });
    });
</script>

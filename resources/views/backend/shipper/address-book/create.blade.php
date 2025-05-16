<!-- Address Book Modal -->
<div class="modal fade" id="addressBook" tabindex="-1" aria-labelledby="subUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100" id="subUserModalLabel">MANAGE YOUR ADDRESS</h5>
            </div>

            <form id="shipperAddressBook" method="POST" action="{{ route('shipper.address-book.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">COMPANY NAME <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="company_name" name="name"
                                placeholder="Enter Company Name">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="street_address" class="form-label">STREET ADDRESS <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="street_address" name="street_address"
                                placeholder="Enter Street Address">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="city" class="form-label">CITY <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">STATE/PROVINCE <span class="text-danger">*</span></label>
                            <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                                @foreach (getStateOptions() as $country => $states)
                                    <optgroup label="{{ $country }}">
                                        @foreach ($states as $code => $state)
                                            <option value="{{ $code }}">{{ $state }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                              </select>
                        </div>

                         <div class="mb-3 col-md-6">
                            <label for="postal_code" class="form-label">ZIP/POSTAL CODE <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="postal_code" name="postal_code"
                                placeholder="Postal Code">
                        </div>


                        <div class="mb-3 col-md-12">
                            <label for="country" class="form-label">COUNTRY <span class="text-danger">*</span></label>
                            <select class="form-control" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="mexico">Mexico</option>
                                <option value="us">US</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select class="form-control" name="type" id="pickup_type">
                                <option selected>Select Type</option>
                                <option value="pickup">Pickup</option>
                                <option value="delivery">Delivery</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="contact_person_name" class="form-label">CONTACT PERSON NAME <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_person_name" id="contact_person_name"
                                placeholder="Contact Person Name">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="phone">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter phone number"
                                class="form-control">
                            <div id="phone-error" style="color: red; display: none; font-size: 12px;">Invalid phone
                                number format</div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#shipperAddressBook').on('submit', function (e) {
            let isValid = true;

            $('#shipperAddressBook input:not(#phone), #shipperAddressBook select:not(#country)').each(function () {
                const input = $(this);
                const value = input.val().trim();
                const id = input.attr('id');
                let errorMessage = '';

                // Required field messages
                if (id === 'company_name' && value === '') {
                    errorMessage = 'This company name field is required.';
                } else if (id === 'street_address' && value === '') {
                    errorMessage = 'This address field is required.';
                } else if (id === 'city' && value === '') {
                    errorMessage = 'This city field is required.';
                } else if (id === 'state' && value === '') {
                    errorMessage = 'This state field is required.';
                } else if (id === 'postal_code' && value === '') {
                    errorMessage = 'This postal code field is required.';
                } else if (id === 'country' && value === '') {
                    errorMessage = 'This country field is required.';
                } else if (id === 'pickup_type' && value === '') {
                    errorMessage = 'This type field is required.';
                } else if (id === 'contact_person_name' && value === '') {
                    errorMessage = 'This person name field is required.';
                }

                // Length validations
                if (!errorMessage) {
                    if (['company_name', 'street_address', 'contact_person_name'].includes(id) && value.length > 50) {
                        errorMessage = 'Maximum 50 characters allowed.';
                    } else if (['state', 'country','postal_code'].includes(id) && value.length > 10) {
                        errorMessage = 'Maximum 10 characters allowed.';
                    }
                }

                if (errorMessage !== '') {
                    isValid = false;
                    input.addClass('is-invalid');
                    if (input.next('.error-msg').length === 0) {
                        input.after('<div class="error-msg text-danger">' + errorMessage + '</div>');
                    }
                } else {
                    input.removeClass('is-invalid');
                    input.next('.error-msg').remove();
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

        $('#shipperAddressBook input, #shipperAddressBook select').on('input change', function () {
            const input = $(this);
            if (input.val().trim() !== '') {
                input.removeClass('is-invalid');
                input.next('.error-msg').remove();
            }
        });

        // PHONE VALIDATION
        $('#phone').on('blur', function () {
            validatePhone();
        });

        $('#country').on('change', function () {
            $('#phone').val('');
            $('#phone-error').hide();
        });

        function validatePhone() {
            var phone = $('#phone').val().trim();
            var country = $('#country').val();
            var isValid = false;

            if (phone.length > 15) {
                $('#phone-error').text('Maximum 15 characters allowed.').show();
                return false;
            }

            if (country === 'us') {
                var usPattern = /^(\+1\s?)?(\(?\d{3}\)?[\s-]?)?\d{3}[\s-]?\d{4}$/;
                isValid = usPattern.test(phone);
            } else if (country === 'mexico') {
                var mxPattern = /^(\+52\s?1?\s?\d{2,3}\s?\d{3,4}\s?\d{4}$|^\d{2,3}-\d{3,4}-\d{4}$)/;
                isValid = mxPattern.test(phone);
            }

            if (!isValid) {
                $('#phone-error').text('Invalid phone number format.').show();
            } else {
                $('#phone-error').hide();
            }

            return isValid;
        }

        $('form').on('submit', function (e) {
            if (!validatePhone()) {
                e.preventDefault();
            }
        });
    });
</script>


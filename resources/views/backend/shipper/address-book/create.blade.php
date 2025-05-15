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

                        {{-- <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">STATE/PROVINCE<span class="text-danger">*</span><label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                        </div> --}}
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">STATE/PROVINCE <span class="text-danger">*</span></label>
                            <select class="form-control" id="state" name="state">

                                <optgroup label="United States">
                                  <option value="AL">AL</option>
                                  <option value="AK">AK</option>
                                  <option value="AZ">AZ</option>
                                  <option value="AR">AR</option>
                                  <option value="CA">CA</option>
                                  <option value="CO">CO</option>
                                  <option value="CT">CT</option>
                                  <option value="DE">DE</option>
                                  <option value="FL">FL</option>
                                  <option value="GA">GA</option>
                                  <option value="HI">HI</option>
                                  <option value="ID">ID</option>
                                  <option value="IL">IL</option>
                                  <option value="IN">IN</option>
                                  <option value="IA">IA</option>
                                  <option value="KS">KS</option>
                                  <option value="KY">KY</option>
                                  <option value="LA">LA</option>
                                  <option value="ME">ME</option>
                                  <option value="MD">MD</option>
                                  <option value="MA">MA</option>
                                  <option value="MI">MI</option>
                                  <option value="MN">MN</option>
                                  <option value="MS">MS</option>
                                  <option value="MO">MO</option>
                                  <option value="MT">MT</option>
                                  <option value="NE">NE</option>
                                  <option value="NV">NV</option>
                                  <option value="NH">NH</option>
                                  <option value="NJ">NJ</option>
                                  <option value="NM">NM</option>
                                  <option value="NY">NY</option>
                                  <option value="NC">NC</option>
                                  <option value="ND">ND</option>
                                  <option value="OH">OH</option>
                                  <option value="OK">OK</option>
                                  <option value="OR">OR</option>
                                  <option value="PA">PA</option>
                                  <option value="RI">RI</option>
                                  <option value="SC">SC</option>
                                  <option value="SD">SD</option>
                                  <option value="TN">TN</option>
                                  <option value="TX">TX</option>
                                  <option value="UT">UT</option>
                                  <option value="VT">VT</option>
                                  <option value="VA">VA</option>
                                  <option value="WA">WA</option>
                                  <option value="WV">WV</option>
                                  <option value="WI">WI</option>
                                  <option value="WY">WY</option>
                                  <option value="DC">DC</option>
                                </optgroup>

                                <!-- Mexico -->
                                <optgroup label="Mexico">
                                  <option value="AG">AG</option> <!-- Aguascalientes -->
                                  <option value="BC">BC</option> <!-- Baja California -->
                                  <option value="BS">BS</option> <!-- Baja California Sur -->
                                  <option value="CM">CM</option> <!-- Campeche -->
                                  <option value="CS">CS</option> <!-- Chiapas -->
                                  <option value="CH">CH</option> <!-- Chihuahua -->
                                  <option value="CO">CO</option> <!-- Coahuila -->
                                  <option value="CL">CL</option> <!-- Colima -->
                                  <option value="DF">DF</option> <!-- Ciudad de México -->
                                  <option value="DG">DG</option> <!-- Durango -->
                                  <option value="GT">GT</option> <!-- Guanajuato -->
                                  <option value="GR">GR</option> <!-- Guerrero -->
                                  <option value="HG">HG</option> <!-- Hidalgo -->
                                  <option value="JA">JA</option> <!-- Jalisco -->
                                  <option value="MX">MX</option> <!-- México (State of Mexico) -->
                                  <option value="MI">MI</option> <!-- Michoacán -->
                                  <option value="MO">MO</option> <!-- Morelos -->
                                  <option value="NA">NA</option> <!-- Nayarit -->
                                  <option value="NL">NL</option> <!-- Nuevo León -->
                                  <option value="OA">OA</option> <!-- Oaxaca -->
                                  <option value="PU">PU</option> <!-- Puebla -->
                                  <option value="QE">QE</option> <!-- Querétaro -->
                                  <option value="QR">QR</option> <!-- Quintana Roo -->
                                  <option value="SL">SL</option> <!-- San Luis Potosí -->
                                  <option value="SI">SI</option> <!-- Sinaloa -->
                                  <option value="SO">SO</option> <!-- Sonora -->
                                  <option value="TB">TB</option> <!-- Tabasco -->
                                  <option value="TM">TM</option> <!-- Tamaulipas -->
                                  <option value="TL">TL</option> <!-- Tlaxcala -->
                                  <option value="VE">VE</option> <!-- Veracruz -->
                                  <option value="YU">YU</option> <!-- Yucatán -->
                                  <option value="ZA">ZA</option> <!-- Zacatecas -->
                                </optgroup>
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
                            <select class="form-control" name="type" id="type">
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
                } else if (id === 'type' && value === '') {
                    errorMessage = 'This type field is required.';
                } else if (id === 'contact_person_name' && value === '') {
                    errorMessage = 'This person name field is required.';
                }

                // Length validations
                if (!errorMessage) {
                    if (['company_name', 'street_address', 'contact_person_name'].includes(id) && value.length > 50) {
                        errorMessage = 'Maximum 50 characters allowed.';
                    } else if (['state', 'country', 'type', 'postal_code'].includes(id) && value.length > 10) {
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


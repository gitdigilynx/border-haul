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
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Company Name">
                            <div class="text-danger error-message" id="error-name"></div>
                        </div>
            
                        <div class="mb-3 col-md-12">
                            <label for="street_address" class="form-label">STREET ADDRESS <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Enter Street Address">
                            <div class="text-danger error-message" id="error-street_address"></div>
                        </div>
            
                        <div class="mb-3 col-md-12">
                            <label for="city" class="form-label">CITY <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            <div class="text-danger error-message" id="error-city"></div>
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
                            <div class="text-danger error-message" id="error-state"></div>
                        </div>
            
                        <div class="mb-3 col-md-6">
                            <label for="postal_code" class="form-label">ZIP/POSTAL CODE <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code">
                            <div class="text-danger error-message" id="error-postal_code"></div>
                        </div>
            
                        <div class="mb-3 col-md-12">
                            <label for="country" class="form-label">COUNTRY <span class="text-danger">*</span></label>
                            <select class="form-control" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="mexico">Mexico</option>
                                <option value="us">US</option>
                            </select>
                            <div class="text-danger error-message" id="error-country"></div>
                        </div>
            
                        <div class="mb-3 col-md-12">
                            <label for="pickup_type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select class="form-control" name="type" id="pickup_type">
                                <option value="">Select Type</option>
                                <option value="pickup">Pickup</option>
                                <option value="delivery">Delivery</option>
                            </select>
                            <div class="text-danger error-message" id="error-pickup_type"></div>
                        </div>
            
                        <div class="mb-3 col-md-12">
                            <label for="contact_person_name" class="form-label">CONTACT PERSON NAME <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_person_name" id="contact_person_name" placeholder="Contact Person Name">
                            <div class="text-danger error-message" id="error-contact_person_name"></div>
                        </div>
            
                        <div class="mb-3 col-md-12">
                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter phone number" class="form-control">
                            <div class="text-danger error-message" id="error-phone"></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

<script>
    $.validator.addMethod("phoneFormatByCountry", function(value, element) {
    if (!value) return false; // required handled separately

    const country = $("#country").val();
    if (!country) return false; // no country selected - fail validation

    const countryLower = country.toLowerCase();
    const val = value.trim();

    // Only accept US or Mexico country codes
    if (countryLower !== 'us' && countryLower !== 'mexico') {
        return false; // no validation for other countries allowed
    }

    const patterns = {
        us: [
            /^\d{3}-\d{3}-\d{4}$/,                    // 123-456-7890
            /^\(\d{3}\)\s?\d{3}-\d{4}$/,              // (123) 456-7890
            /^\d{3}\.\d{3}\.\d{4}$/,                  // 123.456.7890
            /^\+1\s\d{3}\s\d{3}\s\d{4}$/,             // +1 123 456 7890
            /^\+1\d{10}$/,                            // +11234567890
            /^\+1\s\(\d{3}\)\s\d{3}-\d{4}$/           // +1 (123) 456-7890
        ],
        mexico: [
            /^\d{2}-\d{4}-\d{4}$/,                    // 55-1234-5678
            /^\+52\s1\s\d{2}\s\d{4}\s\d{4}$/,         // +52 1 55 1234 5678
            /^\+52\s\d{2}\s\d{4}\s\d{4}$/,            // +52 55 1234 5678
            /^\+521\d{8}$/,                           // +5215512345678
            /^\+5255\d{8}$/                           // +525512345678
        ]
    };

    return patterns[countryLower].some(pattern => pattern.test(val));

}, function(params, element) {
    const country = $("#country").val();
    const countryLower = country ? country.toLowerCase() : '';
    const examples = {
        us: '(123) 456-7890 or +1 (123) 456-7890',
        mexico: '55-1234-5678 or +52 1 55 1234 5678'
    };

    const exampleText = examples[countryLower] || 'a valid phone number format';
    const countryDisplay = country ? country.toUpperCase() : 'Selected country';

    return "Invalid phone format for " + countryDisplay + ". Examples: " + exampleText;
});

$("#shipperAddressBook").validate({
    rules: {
        name: {
            required: true,
            minlength: 2
        },
        street_address: {
            required: true,
            minlength: 5
        },
        city: {
            required: true,
            minlength: 2
        },
        state: {
            required: true
        },
        postal_code: {
            required: true,
            digits: true
        },
        country: {
            required: true
        },
        type: {
            required: true
        },
        contact_person_name: {
            required: true,
            minlength: 2
        },
        phone: {
            required: true,
            phoneFormatByCountry: true
        }
    },
    messages: {
        name: {
            required: "Company name is required",
            minlength: "Company name must be at least 2 characters"
        },
        street_address: {
            required: "Street address is required",
            minlength: "Street address must be at least 5 characters"
        },
        city: {
            required: "City is required",
            minlength: "City must be at least 2 characters"
        },
        state: {
            required: "State/Province is required"
        },
        postal_code: {
            required: "Postal code is required",
            digits: "Postal code must be numeric"
        },
        country: {
            required: "Country is required"
        },
        type: {
            required: "Type is required"
        },
        contact_person_name: {
            required: "Contact person name is required",
            minlength: "Contact person name must be at least 2 characters"
        },
        phone: {
            required: "Phone number is required"
            // custom message from validator method for invalid format
        }
    },
    errorClass: "is-invalid",
    validClass: "is-valid",
    errorElement: "div",
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.mb-3').append(error);
    },
    submitHandler: function(form) {
        form.submit();
    }
});

// Update phone placeholder and validate on country change
$("#country").on('change', function() {
    const country = $(this).val();
    const countryLower = country ? country.toLowerCase() : '';
    const phoneInput = $("#phone");
    const examples = {
        us: '(123) 456-7890',
        mexico: '55-1234-5678'
    };
    if (examples[countryLower]) {
        phoneInput.attr('placeholder', 'e.g., ' + examples[countryLower]);
    } else {
        phoneInput.attr('placeholder', '');
    }
    if (phoneInput.val()) {
        phoneInput.valid(); // only validate if input has a value
    }
});

</script>
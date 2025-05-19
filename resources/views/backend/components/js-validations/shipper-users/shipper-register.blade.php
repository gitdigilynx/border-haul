<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

<script>
    $(document).ready(function() {
        $("#registrationForm").validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group, .col-md-6').find('.invalid-feedback')
                    .remove(); // Remove existing errors
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
                service_category: {
                    required: true
                },
                company_name: {
                    required: true
                },
                street_address: {
                    required: true
                },
                city: {
                    required: true
                },
                company_state: {
                    required: true
                },
                company_zip_code: {
                    required: true
                },
                company_country: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    mix: 20
                },
                office_phone: {
                    required: true,
                    mix: 20
                },

                // password: {
                //     required: true,
                //     minlength: 6
                // },
                // password_confirmation: {
                //     required: true,
                //     equalTo: "#password"
                // }
            },
            messages: {
                name: "Please enter your name",
                service_category: "Please select a service category",
                company_name: "Please enter your company name",
                company_address: "Please enter your company address",
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
                },
                phone: {
                    required: "Please enter your Cell number",
                    minlength: "Phone number must be at least 20 characters long"
                },
                office_phone: {
                    required: "Please enter your Office number",
                    minlength: "Phone number must be at least 20 characters long"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 8 characters long"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                }
            }
        });
    });

</script>
<script>
    document.querySelectorAll('.toggle-password').forEach(function(element) {
        element.addEventListener('click', function() {
            const input = document.querySelector(this.getAttribute('toggle'));
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });


    $(document).ready(function() {
        // Event bindings

        const $password = $('#password');
        const $confirm = $('#password_confirmation');
        const $form = $('form');

        // Set required attributes just in case
        $password.attr('required', true);
        $confirm.attr('required', true);

        // Validate password rules
        function validatePasswordRules(password) {
            return {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password)
            };
        }

        function updatePasswordRulesUI(rules) {
            $('#passwordRules .rule-length').toggleClass('valid', rules.length).toggleClass('invalid', !rules
                .length);
            $('#passwordRules .rule-uppercase').toggleClass('valid', rules.uppercase).toggleClass('invalid', !
                rules.uppercase);
            $('#passwordRules .rule-lowercase').toggleClass('valid', rules.lowercase).toggleClass('invalid', !
                rules.lowercase);
            $('#passwordRules .rule-number').toggleClass('valid', rules.number).toggleClass('invalid', !rules
                .number);
        }

        function checkPasswordMatch() {
            const password = $password.val();
            const confirm = $confirm.val();

            if (confirm.length > 0) {
                if (password === confirm) {
                    $confirm.removeClass('invalid').addClass('valid');
                    $('#mismatchError').hide();
                    return true;
                } else {
                    $confirm.removeClass('valid').addClass('invalid');
                    $('#mismatchError').show();
                    return false;
                }
            } else {
                $confirm.removeClass('valid invalid');
                $('#mismatchError').hide();
                return false;
            }
        }

        $password.on('input', function() {
            const rules = validatePasswordRules($(this).val());
            updatePasswordRulesUI(rules);
        });

        $password.add($confirm).on('input', function() {
            checkPasswordMatch();
        });

        // Block form submission if validation fails (protects even if required is removed)
        $form.on('submit', function(e) {
            const password = $password.val();
            const confirm = $confirm.val();

            const rules = validatePasswordRules(password);
            const allValid = rules.length && rules.uppercase && rules.lowercase && rules.number;
            const match = password === confirm;

            if (!password || !confirm || !allValid || !match || !validatePhone()) {
                e.preventDefault(); // prevent submission
                $password[0].reportValidity(); // show browser prompt for empty
                $confirm[0].reportValidity(); // show browser prompt for empty
            }
        });
    });

    function checkPasswordMatch() {
        const password = $('#password').val();
        const confirm = $('#password_confirmation').val();

        if (confirm.length > 0) {
            if (password === confirm) {
                $('#password_confirmation').removeClass('invalid').addClass('valid');
                $('#mismatchError').hide();
            } else {
                $('#password_confirmation').removeClass('valid').addClass('invalid');
                $('#mismatchError').show();
            }
        } else {
            $('#password_confirmation').removeClass('valid invalid');
            $('#mismatchError').hide();
        }
    }

    $('#password, #password_confirmation').on('input', function() {
        console.log('run file');

        checkPasswordMatch(); // Live check for matching
    });


// countries base validation on phone numbers

  document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('company_country');
    const phoneFields = [
        { input: document.getElementById('office_phone'), error: document.getElementById('office-phone-error') },
        { input: document.getElementById('phone'), error: document.getElementById('phone-error') }
    ];

    const patterns = {
        US: [
            /^\d{3}-\d{3}-\d{4}$/,                    // 123-456-7890
            /^\(\d{3}\)\s?\d{3}-\d{4}$/,              // (123) 456-7890
            /^\d{3}\.\d{3}\.\d{4}$/,                  // 123.456.7890
            /^\+1\s\d{3}\s\d{3}\s\d{4}$/,             // +1 123 456 7890
            /^\+1\d{10}$/,                            // +11234567890
            /^\+1\s\(\d{3}\)\s\d{3}-\d{4}$/           // +1 (123) 456-7890
        ],
        Mexico: [
            /^\d{2}-\d{4}-\d{4}$/,                    // 55-1234-5678
            /^\+52\s1\s\d{2}\s\d{4}\s\d{4}$/,         // +52 1 55 1234 5678
            /^\+52\s\d{2}\s\d{4}\s\d{4}$/,            // +52 55 1234 5678
            /^\+521\d{8}$/,                           // +5215512345678
            /^\+5255\d{8}$/                           // +525512345678
        ]
    };

    const examples = {
        US: [
            // '123-456-7890',
            '(123) 456-7890',
            // '123.456.7890',
            // '+1 123 456 7890',
            // '+11234567890',
            '+1 (123) 456-7890'
        ],
        Mexico: [
             '55-1234-5678',
             '+52 1 55 1234 5678',
            // '+52 55 1234 5678',
            // '+5215512345678',
            // '+525512345678'
        ]
    };

    function validatePhone(inputEl, errorEl) {
        const selectedCountry = countrySelect.value;
        const phone = inputEl.value.trim();
        const validPatterns = patterns[selectedCountry] || [];

        const isValid = validPatterns.some(regex => regex.test(phone));

        if (!isValid && selectedCountry) {
            errorEl.innerHTML = `Invalid ${inputEl.name.replace('_', ' ')} format for ${selectedCountry}.<br>Examples:<br>${examples[selectedCountry].join('<br>')}`;
            errorEl.style.display = 'block';
            inputEl.classList.add('is-invalid');
        } else {
            errorEl.style.display = 'none';
            inputEl.classList.remove('is-invalid');
        }
    }

    function updatePlaceholders() {
        const selected = countrySelect.value;
        if (examples[selected]) {
            phoneFields.forEach(({ input }) => {
                input.placeholder = `e.g., ${examples[selected][0]}`;
            });
        }
    }

    // Listen for country change
    countrySelect.addEventListener('change', () => {
        updatePlaceholders();
        phoneFields.forEach(({ input, error }) => validatePhone(input, error));
    });

    // Validate each phone field on input
    phoneFields.forEach(({ input, error }) => {
        input.addEventListener('input', () => validatePhone(input, error));
    });

    // Initial state
    updatePlaceholders();
    phoneFields.forEach(({ input, error }) => validatePhone(input, error));
});


</script>

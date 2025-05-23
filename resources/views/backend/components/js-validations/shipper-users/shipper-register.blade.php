{{-- @include('backend.components.backend.master') --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const countrySelect = document.getElementById('company_country');
            const officeInput = document.getElementById('office_phone');
            const cellInput = document.getElementById('phone');
        
            const initTelInput = (input) => {
                return window.intlTelInput(input, {
                    onlyCountries: ['us', 'mx'],
                    initialCountry: 'us',
                    nationalMode: false,
                    autoHideDialCode: false,
                    formatOnDisplay: true,
                    allowDropdown: false,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.min.js"
                });
            };
        
           
            const itiOffice = initTelInput(officeInput);
            const itiCell = initTelInput(cellInput);
        
            // Change country handler
            countrySelect.addEventListener('change', function () {
                const countryCode = countrySelect.value === 'Mexico' ? 'mx' : 'us';
                itiOffice.setCountry(countryCode);
                itiCell.setCountry(countryCode);
            });
        
            const validatePhone = (input, iti, errorId) => {
                const errorDiv = document.getElementById(errorId);
                const value = input.value.trim();
                const dialCode = '+' + iti.getSelectedCountryData().dialCode;
        
                // Check if number starts with correct dial code
                if (!value.startsWith(dialCode)) {
                    showError(input, errorDiv, 'Invalid phone number for selected country.');
                    return;
                }
        
                // Strip formatting to count digits
                const rawDigits = value.replace(/\D/g, '').replace(iti.getSelectedCountryData().dialCode, '');
        
                if (rawDigits.length < 10) {
                    clearFeedback(input, errorDiv); // don't show error while typing
                    return;
                }
        
                if (!iti.isValidNumber()) {
                    showError(input, errorDiv, 'Invalid phone number for selected country.');
                } else {
                    showValid(input, errorDiv);
                }
            };
        
            const showError = (input, errorDiv, msg) => {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                errorDiv.textContent = msg;
                errorDiv.style.display = 'block';
            };
        
            const showValid = (input, errorDiv) => {
                input.classList.add('is-valid');
                input.classList.remove('is-invalid');
                errorDiv.style.display = 'none';
            };
        
            const clearFeedback = (input, errorDiv) => {
                input.classList.remove('is-invalid', 'is-valid');
                errorDiv.style.display = 'none';
            };
        
            const formatPhoneNumber = (value) => {
                const digits = value.replace(/\D/g, '').slice(0, 10);
                const match = digits.match(/^(\d{0,3})(\d{0,3})(\d{0,4})$/);
                if (!match) return value;
        
                let formatted = '';
                if (match[1]) formatted += '(' + match[1];
                if (match[1].length === 3) formatted += ') ';
                if (match[2]) formatted += match[2];
                if (match[2].length === 3) formatted += '-';
                if (match[3]) formatted += match[3];
        
                return formatted;
            };
        
            const setupRealTimeValidation = (input, iti, errorId) => {
                input.addEventListener('input', () => {
                    const dialCode = '+' + iti.getSelectedCountryData().dialCode;
                    let raw = input.value.replace(dialCode, '').replace(/\D/g, '');
                    const formatted = formatPhoneNumber(raw);
                    input.value = dialCode + ' ' + formatted;
        
                    validatePhone(input, iti, errorId);
                });
            };
        
            setupRealTimeValidation(officeInput, itiOffice, 'office-phone-error');
            setupRealTimeValidation(cellInput, itiCell, 'phone-error');
        
            const setupExtraValidation = (input, iti, errorId) => {
                input.addEventListener('blur', () => validatePhone(input, iti, errorId));
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        validatePhone(input, iti, errorId);
                        input.blur();
                    }
                });
            };
        
            
            setupExtraValidation(officeInput, itiOffice, 'office-phone-error');
            setupExtraValidation(cellInput, itiCell, 'phone-error');
        });
</script>
          
        
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
                    minlength: 11
                },
                office_phone: {
                    required: true,
                    minlength: 11
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
                company_country: "Please enter your company address",
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
                },
                phone: {
                    required: "Please enter your Cell number",
                    minlength: "Phone number must be at least 11 characters long"
                },
                office_phone: {
                    required: "Please enter your Office number",
                    minlength: "Phone number must be at least 11 characters long"
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

    // Override default email validator
    jQuery.validator.addMethod("email", function(value, element) {
        return this.optional(element) || /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/.test(value);
    }, "Please enter a valid email address");


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

//   document.addEventListener('DOMContentLoaded', function () {
//     const countrySelect = document.getElementById('company_country');
//     const phoneFields = [
//         { input: document.getElementById('office_phone'), error: document.getElementById('office-phone-error') },
//         { input: document.getElementById('phone'), error: document.getElementById('phone-error') }
//     ];

//     const patterns = {
//         US: [
//             /^\d{3}-\d{3}-\d{4}$/,                    // 123-456-7890
//             /^\(\d{3}\)\s?\d{3}-\d{4}$/,              // (123) 456-7890
//             /^\d{3}\.\d{3}\.\d{4}$/,                  // 123.456.7890
//             /^\+1\s\d{3}\s\d{3}\s\d{4}$/,             // +1 123 456 7890
//             /^\+1\d{10}$/,                            // +11234567890
//             /^\+1\s\(\d{3}\)\s\d{3}-\d{4}$/           // +1 (123) 456-7890
//         ],
//         Mexico: [
//             /^\d{2}-\d{4}-\d{4}$/,                    // 55-1234-5678
//             /^\+52\s1\s\d{2}\s\d{4}\s\d{4}$/,         // +52 1 55 1234 5678
//             /^\+52\s\d{2}\s\d{4}\s\d{4}$/,            // +52 55 1234 5678
//             /^\+521\d{8}$/,                           // +5215512345678
//             /^\+5255\d{8}$/                           // +525512345678
//         ]
//     };

//     const examples = {
//         US: [
//             // '123-456-7890',
//             '(123) 456-7890',
//             // '123.456.7890',
//             // '+1 123 456 7890',
//             // '+11234567890',
//             '+1 (123) 456-7890'
//         ],
//         Mexico: [
//              '55-1234-5678',
//              '+52 1 55 1234 5678',
//             // '+52 55 1234 5678',
//             // '+5215512345678',
//             // '+525512345678'
//         ]
//     };

//     function validatePhone(inputEl, errorEl) {
//         const selectedCountry = countrySelect.value;
//         const phone = inputEl.value.trim();
//         const validPatterns = patterns[selectedCountry] || [];

//         const isValid = validPatterns.some(regex => regex.test(phone));

//         if (!isValid && selectedCountry) {
//             errorEl.innerHTML = `Invalid ${inputEl.name.replace('_', ' ')} format for ${selectedCountry}.<br>Examples:<br>${examples[selectedCountry].join('<br>')}`;
//             errorEl.style.display = 'block';
//             inputEl.classList.add('is-invalid');
//         } else {
//             errorEl.style.display = 'none';
//             inputEl.classList.remove('is-invalid');
//         }
//     }

//     function updatePlaceholders() {
//         const selected = countrySelect.value;
//         if (examples[selected]) {
//             phoneFields.forEach(({ input }) => {
//                 input.placeholder = `e.g., ${examples[selected][0]}`;
//             });
//         }
//     }

//     // Listen for country change
//     countrySelect.addEventListener('change', () => {
//         updatePlaceholders();
//         phoneFields.forEach(({ input, error }) => validatePhone(input, error));
//     });

//     // Validate each phone field on input
//     phoneFields.forEach(({ input, error }) => {
//         input.addEventListener('input', () => validatePhone(input, error));
//     });

//     // Initial state
//     updatePlaceholders();
//     phoneFields.forEach(({ input, error }) => validatePhone(input, error));
// });


function validateEmail(input) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    const errorDiv = document.getElementById('emailError');

    if (!regex.test(input.value)) {
        input.classList.add('is-invalid');
        errorDiv.classList.remove('d-none');
    } else {
        input.classList.remove('is-invalid');
        errorDiv.classList.add('d-none');
    }
}


</script>

<style>
    .iti {
  direction: ltr;
}

.iti--allow-dropdown input {
  padding-left: 52px; /* enough space for flag */
}

.iti__flag-container {
  left: 0;
  right: auto;
}

    </style>
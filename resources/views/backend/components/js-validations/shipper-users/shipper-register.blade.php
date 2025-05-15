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
                    minlength: 10
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
                    required: "Please enter your phone number",
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

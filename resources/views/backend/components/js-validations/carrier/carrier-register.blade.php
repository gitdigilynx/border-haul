<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

<script>
    $(document).ready(function () {
        $("#registrationCarrier").validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group, .col-md-6').find('.invalid-feedback').remove(); // Remove existing errors
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            rules: {
                name: { required: true },
                company_address: { required: true },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                authority: { required: true },
                dot: { required: true },
                mc: { required: true },
                scac_code: { required: true },
                mexico: { required: true },
                caat_code: { required: true },
                service_category: { required: true },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }
                // Uncomment below if file uploads are required
                // transfer_approval_documents: { required: true },
                // insurance_certificate: { required: true }
            },
            messages: {
                name: "Please enter your company name",
                company_address: "Please enter your company address",
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                phone: {
                    required: "Please enter your phone number",
                    minlength: "Phone number must be at least 10 characters"
                },
                authority: "Please enter authority",
                dot: "Please enter DOT",
                mc: "Please enter MC",
                scac_code: "Please enter SCAC Code",
                mexico: "Please enter Mexico info",
                caat_code: "Please enter CAAT Code",
                service_category: "Please select a service category",
                password: {
                    required: "Please enter your password",
                    minlength: "Password must be at least 8 characters long"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                }
                // transfer_approval_documents: "Please upload the Transfer Approval Documents",
                // insurance_certificate: "Please upload the Insurance Certificate"
            }
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.delete-sub-user').click(function () {
            var userId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/sub-users/' + userId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            Swal.fire('Deleted!', 'The sub-user has been deleted.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

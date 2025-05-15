@extends('layouts.backend.master')
@section('title', 'Delivers Listing')
@section('content')
    <div class="content-page">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">Your Deliveries</h4>
                </div>

                <div class="text-end">
                   <img src="{{ asset('assets/icons/icon.svg') }}" alt="Truck Icon" style="width: 40px; height: 40px; margin-right: 8px;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#subUserModal"
                        style="background-color: #06367B; color: white; border: none;  font-size: 1rem; font-weight: bold; border-radius: 6px; ">
                        + New Request
                    </button>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header" style="border-bottom: none;">
                            <div class="row g-3"> <!-- Bootstrap grid row with gutter spacing -->

                                <!-- Status Dropdown -->
                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-bold text-uppercase small">Status</label>
                                    <select class="form-control" name="country" required>
                                        <option selected>Select Status</option>
                                        <option value="inprogress">In Progress</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>

                                <!-- Date Range Input with Flatpickr -->
                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-bold text-uppercase small">Date Range</label>
                                    <div class="input-group">
                                        <input type="text" id="dateRangePicker" class="form-control" placeholder="MM/DD/YYYY">
                                        <span class="bg-white input-group-text border-start-0">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Search Deliveries Input -->
                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-bold text-uppercase small">Search Deliveries</label>
                                    <div class="position-relative topbar-search">
                                        <input type="text" class="bg-opacity-75 form-control ps-4"
                                            placeholder="Search Deliveries..." style="border: 2px solid #f5f5f5;">
                                        <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card-body">
                            <table id="responsive-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Pickup</th>
                                        <th>Drop-off</th>
                                        <th>Driver/Vehicle</th>
                                        <th>Total Price</th>
                                        <th>Created By</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#47D265">In Progress</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#FFC200">Pending</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#47D265">In Progress</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>

                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#FFC200">Pending</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#47D265">In Progress</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#FFC200">Pending</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#FFC200">Pending</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>

                                        <td>$William Johnson</td>
                                    </tr>

                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#47D265">In Progress</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#FFC200">Pending</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>
                                    <tr>
                                        <td>3423</td>
                                        <td style="color:#FFC200">Pending</td>
                                        <td>123 Main St, New York</td>
                                        <td>456 Broadway, Brooklyn</td>
                                        <td>Alex Smith</td>
                                        <td style="color:#04C1E7">$45</td>
                                        <td>$William Johnson</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <!-- Left: Info Text -->
                                <div id="customInfoText" class="text-muted small"></div>

                                <!-- Right: Custom Buttons -->
                                <div class="gap-2 mt-4 d-flex justify-content-end align-items-center">
                                    <button id="prevPage" class="btn custom-pagination-btn disabled">
                                        <i class="fa fa-arrow-left me-1"></i> Previous
                                    </button>
                                    <button id="nextPage" class="btn custom-pagination-btn">
                                        Next <i class="fa fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.delete-user').click(function() {
                const button = $(this);
                const deleteUrl = button.data('url');

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
                            url: deleteUrl,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!',
                                        'The document entry has been deleted.',
                                        'success')
                                    .then(() => {
                                        location.reload();
                                    });
                            },
                            error: function(xhr) {
                                Swal.fire('Error', 'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>


<script>
     flatpickr("#dateRangePicker", {
            dateFormat: "m/d/Y",
            allowInput: true
        });
    $(document).ready(function() {
        var table = $('#responsive-datatable').DataTable({
            responsive: true,
            lengthChange: false,
            pageLength: 50,
            ordering: false,
            info: false,
            pagingType: 'simple',
        });

        $('#customSearch').on('keyup', function() {
            console.log('work'); // Should now fire
            table.search(this.value).draw();
        });
        $('#responsive-datatable_filter').hide();

        function updateButtons() {
            let info = table.page.info();

            $('#prevPage').toggleClass('disabled', info.page === 0);
            $('#nextPage').toggleClass('disabled', info.page === info.pages - 1);
        }

        function updateInfo() {
            let info = table.page.info();
            $('#customInfoText').text(
                `Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`
            );
            updateButtons();
        }

        updateInfo();

        $('#nextPage').on('click', function() {
            table.page('next').draw('page');
        });

        $('#prevPage').on('click', function() {
            table.page('previous').draw('page');
        });

        table.on('draw', function() {
            updateInfo();
        });
    });
</script>


    <style>
    .custom-pagination-btn {
        border: 1px solid #d1d5db;
        /* light gray */
        border-radius: 8px;
        font-weight: 500;
        background-color: #fff;
        color: #111827;
        padding: 6px 16px;
        font-size: 14px;
        transition: all 0.2s ease-in-out;
    }

    .custom-pagination-btn:hover {
        background-color: #f3f4f6;
        /* light hover effect */
        color: #000;
    }

    .custom-pagination-btn.disabled {
        color: #9ca3af;
        border-color: #d1d5db;
        background-color: #fff;
        pointer-events: none;
        cursor: not-allowed;
    }

    .dataTables_paginate {
        display: none !important;
    }

    @media (min-width: 992px) {
        .responsive-search {
            max-width: 140px !important;
        }
    }

    @media (max-width: 991.98px) {
        .responsive-search {
            max-width: 300px !important;
        }
    }
    </style>

@endsection

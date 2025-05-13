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
                            <div class="gap-4 d-flex w-100">
                                <!-- Status Dropdown -->
                                <div class="flex-grow-1">
                                    <label class="form-label fw-bold text-uppercase small">Status</label>
                                    <div class="input-group">
                                        <div class="mb-3 col-md-12">
                                            <select class="form-control" name="country" required>
                                              <option selected>Select</option>
                                              <option value="inprogress">In Progess</option>
                                              <option value="pending">Pending</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <!-- Date Range Input with Flatpickr -->
                                <div class="flex-grow-1">
                                    <label class="form-label fw-bold text-uppercase small">Date Range</label>
                                    <div class="input-group">
                                        <input type="text" id="dateRangePicker" class="form-control"
                                            placeholder="DD/MM/YYYY">
                                        <span class="bg-white input-group-text border-start-0">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Search Deliveries Input -->

                                <div class="flex-grow-1">
                                    <label class="form-label fw-bold text-uppercase small">Search Deliveries</label>
                                    <li class="d-lg-block">
                                        <div class="position-relative topbar-search">
                                            <input type="text"
                                                    class="bg-opacity-75 form-control ps-4"
                                                    placeholder="Search Deliveries...."
                                                    style="border: 2px solid #f5f5f5;"> <!-- #007BFF is Bootstrap blue -->
                                                <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>

                                        </div>
                                    </li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



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

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
           $(document).ready(function() {
        $('#responsive-datatable').DataTable({
            searching: false, // Hide the search box
            lengthChange: false, // Hide the entries dropdown
            info: false, // Hide the information about the number of entries
            pageLength: 10 // Default number of rows displayed per page
        });
    });

        flatpickr("#dateRangePicker", {
            dateFormat: "d/m/Y",
            allowInput: true
        });
    </script>


@endsection

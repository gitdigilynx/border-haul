@extends('layouts.backend.master')
@section('title', 'Truck Listing')
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">DRIVERS/TRUCKS</h4>
                </div>
                <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none;">
                    <img src="{{ asset('assets/icons/icon.svg') }}" alt="Truck Icon"
                        style="width: 40px; height: 40px; margin-right: 8px;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#truckUserModal"
                        style="background-color: #06367B; color: white; border: none;  font-size: 1rem; font-weight: bold; border-radius: 6px; ">
                        + Add Truck
                    </button>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 row align-items-center justify-content-between">
                                <!-- Left: Company Details -->
                                <div class="mb-2 col-md-6 col-12 mb-md-0">
                                    <h3 style="
                                    font-family: Poppins;
                                    font-weight: 600;
                                    font-size: 18px;
                                    line-height: 100%;
                                    letter-spacing: 0%;
                                    color: #000000;
                                "
                                        class="" style="font-family: 'Poppins', sans-serif; color: black;">
                                        Trucks</h3>
                                </div>

                                <!-- Right: Search Input -->
                                <div class="input-group responsive-search float-end">
                                    <span class="bg-white input-group-text border-end-0">
                                        <i class="fa fa-search text-muted"></i>
                                    </span>
                                    <input type="text" id="customSearch" class="form-control border-start-0"
                                        placeholder="Search...">
                                </div>
                            </div>
                            <table id="responsive-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Truck Plate #</th>
                                        <th>Trucker ID #</th>
                                        <th>Service Category</th>
                                        <th>Driver Name</th>
                                        <th>Driver Phone</th>
                                        <th>In Service</th>
                                        {{-- <th>Location</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trucks as $truck)
                                        <tr>
                                            <td>{{ $truck->plate_number }}</td>
                                            <td>{{ $truck->trucker_number }}</td>
                                            <td>{{ $truck->service_category }}</td>
                                            <td>{{ $truck->driver->name }}</td>
                                            <td>{{ formatPhone($truck->driver->phone_number) }}</td>

                                            <td>

                                                <form method="POST"
                                                    action="{{ route('carrier.trucks.toggleTruck', $truck->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="in_service"
                                                            onchange="this.form.submit()"
                                                            {{ $truck->in_service ? 'checked' : '' }}>
                                                        <span
                                                            class="{{ statusInService($truck->in_service ? 'ON' : 'OFF') }}">
                                                            {{ $truck->in_service ? 'ON' : 'OFF' }}
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>


                                            {{-- <td>{{ $truck->location }}</td> --}}
                                            <td>
                                                <a href="javascript:void(0)" style="background-color: #E0F3FF;"
                                                    class="p-0 mb-0 btn" data-id="{{ $truck->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#truckShow{{ $truck->id }}">
                                                    <i style="color:#007BFF" class="p-2 fa fa-eye" title="View Truck"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"></i>
                                                </a>

                                                <a href="javascript:void(0)" style="background-color: #EFEFEF;"
                                                    class="p-0 mb-0 btn" data-bs-toggle="modal"
                                                    data-bs-target="#truckEdit{{ $truck->id }}">
                                                    <i style="color:#9F9F9F" class="p-2 fa fa-edit" title="Edit Entry"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"></i>
                                                </a>

                                                <a href="javascript:void(0);" style="background: #D2232A1A;"
                                                    class="p-0 mb-0 delete-truck btn" data-id="{{ $truck->id }}"
                                                    data-url="{{ route('carrier.trucks.destroy', $truck->id) }}"
                                                    title="Delete Truck" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <i style="color:#D2232A" class="p-2 fa fa-trash-can"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


    @include('backend.carrier.truck.create')

    @foreach ($trucks as $truck)
        @include('backend.carrier.truck.show', ['truck' => $truck])
        @include('backend.carrier.truck.edit', ['truck' => $truck])
    @endforeach


    <script>
        $(document).ready(function() {
            $('.delete-truck').click(function() {
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
                                Swal.fire('Deleted!', 'Document entry deleted.',
                                        'success')
                                    .then(() => {
                                        location.reload();
                                    });
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
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

@extends('layouts.backend.master')
@section('title', 'Truck Listing')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-18 fw-semibold">Trucks</h4>
                </div>
                <div class="text-end">
                    <ol class="py-0 m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Trucks</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Trucks List</h5>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#truckUserModal">
                               + Add Truck
                            </button>
                        </div>
                        <div class="card-body responsive-datatable">
                            <table id="datatable-basic" class="table table-bordered dt-responsive nowrap table-flush">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Truck Number</th>
                                        <th>Plate Number</th>
                                        <th>Service Category</th>
                                        <th>In Service</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $driver)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $truck->name }}</td>
                                            <td>{{ $truck->trucker_number }}</td>
                                            <td>{{ $truck->plate_number }}</td>
                                            <td>{{ $truck->in_service }}</td>
                                            <td>{{ $truck->in_service }}</td>
                                            <td>
                                                <!-- View Button -->
                                                <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-primary"
                                                    data-bs-toggle="modal"data-id="{{ $truck->id }}"
                                                    data-bs-target="#driverShow{{ $truck->id }}">
                                                    <i class="p-1 text-white fa fa-eye text-secondary"></i>
                                                </a>

                                                <!-- Edit Button -->
                                                <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                    data-bs-toggle="modal" data-id="{{ $truck->id }}"
                                                    data-bs-target="#driverEdit{{ $truck->id }}">
                                                    <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <a href="javascript:void(0);" class="p-0 mb-0 delete-driver btn bg-danger rounded-circle"  data-id="{{ $driver->id }}"
                                                        data-url="{{ route('carrier.drivers.destroy', $truck->id) }}">
                                                    <i class="p-1 text-white fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.carrier.driver.create')
@include('backend.components.alerts.shipper-users')

@foreach($trucks as $truck)
    @include('backend.carrier.truck.show', ['driver' => $truck])
    @include('backend.carrier.truck.edit', ['driver' => $truck])
@endforeach


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.delete-driver').click(function () {
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
                        success: function (response) {
                            Swal.fire('Deleted!', 'The document entry has been deleted.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        },
                        error: function (xhr) {
                            Swal.fire('Error', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#datatable-basic').DataTable({
            responsive: true
        });
    });
</script>

@endsection

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
                                        <th>Driver Name</th>
                                        <th>Trucker Number</th>
                                        <th>Plate Number</th>
                                        <th>Service Category</th>
                                        <th>In Service</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trucks as $truck)
                                        <tr>
                                            <td>{{ $truck->driver->name }}</td>
                                            <td>{{ $truck->trucker_number }}</td>
                                            <td>{{ $truck->plate_number }}</td>
                                            <td>{{ $truck->service_category }}</td>
                                            <td>
                                              <form method="POST" action="{{ route('carrier.trucks.toggleTruck', $truck->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-check form-switch">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            name="in_service"
                                                            onchange="this.form.submit()"
                                                            {{ $truck->in_service ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label">
                                                            {{ $truck->in_service ? 'On' : 'Off' }}
                                                        </label>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- View Button -->
                                                <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-primary"
                                                    data-bs-toggle="modal" data-id="{{ $truck->id }}"
                                                    data-bs-target="#truckShow{{ $truck->id }}">
                                                    <i class="p-1 text-white fa fa-eye text-secondary"></i>
                                                </a>

                                                <!-- Edit Button -->
                                                <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                    data-bs-toggle="modal" data-id="{{ $truck->id }}"
                                                    data-bs-target="#truckEdit{{ $truck->id }}">
                                                    <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <a href="javascript:void(0);" class="p-0 mb-0 delete-truck btn bg-danger rounded-circle"
                                                   data-id="{{ $truck->id }}"
                                                   data-url="{{ route('carrier.trucks.destroy', $truck->id) }}">
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

@include('backend.carrier.truck.create')

@foreach($trucks as $truck)
    @include('backend.carrier.truck.show', ['truck' => $truck])
    @include('backend.carrier.truck.edit', ['truck' => $truck])
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.delete-truck').click(function () {
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
                            Swal.fire('Deleted!', 'Document entry deleted.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
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

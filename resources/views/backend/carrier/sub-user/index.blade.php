@extends('layouts.backend.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="m-0 fs-18 fw-semibold">Users</h4>
                    </div>
                    <div class="text-end">
                        <ol class="py-0 m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 card-title">Sub sers List</h5>
                                {{-- <button type="button" class="btn btn-success">Add Users</button> --}}
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#carrierUserCreate">
                                    + Invite Users
                                </button>
                            </div>
                            <div class="card-body responsive-datatable">
                                <table id="datatable-basic" class="table table-bordered dt-responsive nowrap table-flush">
                                    <thead>
                                        <tr>
                                            {{-- <th>Sr #</th> --}}
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carrierUsers as $user)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ optional($user->users)->name }}</td>
                                                <td>{{ optional($user->users)->email }}</td>
                                                <td>{{ optional($user->users)->role }}</td>

                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('shipper.sub-users.toggleSubUser', $user->users->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="is_active"
                                                                onchange="this.form.submit()"
                                                                {{ $user->users->is_active ? 'checked' : '' }}>
                                                            <label
                                                                class="form-check-label px-1 rounded text-white
                                                                {{ $user->users->is_active ? 'bg-success' : 'bg-danger' }}">
                                                                {{ $user->users->is_active ? 'Active' : 'Inactive' }}
                                                            </label>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>

                                                    <!-- View Button -->
                                                    <a href="javascript:void(0)"
                                                        class="p-0 mb-0 rounded-circle btn bg-primary"
                                                        data-bs-toggle="modal"data-id="{{ $user->id }}"
                                                        data-bs-target="#carrierShowModal{{ $user->id }}">
                                                        <i class="p-1 text-white fa fa-eye text-secondary"></i>
                                                    </a>

                                                <!-- Edit Button -->
                                                <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                    data-bs-toggle="modal" data-id="{{ $user->id }}"
                                                    data-bs-target="#carrierEditModal{{ $user->id }}">
                                                    <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                                </a>

                                                    <!-- Delete Button -->
                                                    <a href="javascript:void(0);"
                                                        class="p-0 mb-0 delete-carrier-user btn bg-danger rounded-circle"
                                                        data-id="{{ $user->id }}"
                                                        data-url="{{ route('carrier.carrier-users.destroy', $user->id) }}">
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

    @include('backend.carrier.sub-user.create')
    @foreach ($carrierUsers as $user)
        @include('backend.carrier.sub-user.show', ['document' => $user])
        @include('backend.carrier.sub-user.edit', ['document' => $user])
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.delete-carrier-user').click(function() {
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
        $(document).ready(function() {
            $('#datatable-basic').DataTable({
                responsive: true
            });
        });
    </script>

@endsection

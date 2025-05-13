@extends('layouts.backend.master')
@section('title', 'Users Listing')
@section('content')
<div class="content-page">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">COMPANY USERS</h4>
                </div>
                <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none;">
                    <img src="{{ asset('assets/icons/icon.svg') }}" alt="Truck Icon" style="width: 40px; height: 40px; margin-right: 8px;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#subUserModal"
                    style="background-color: #06367B; color: white; border: none;  font-size: 1rem; font-weight: bold; border-radius: 6px; ">
                       + Invite Users
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none;">
                            <h3 style="font-family: 'Poppins', sans-serif; color: black;font-size: 1rem; margin-bottom:-20px; font-weight: 600;">USER</h3>
                        </div>
                        <div class="card-body">
                            <table id="responsive-datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th>Sr #</th> --}}
                                        <th>Driver Name</th>
                                        <th>Email</th>
                                        <th>User Role</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subUsers as $user)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $user->users->name }} {{ $user->users->last_name }}</td>
                                            <td>{{ $user->users->email }}</td>
                                            <td>{{ $user->users->role }}</td>
                                            {{-- <td> --}}
                                           {{-- <form method="POST" action="{{ route('shipper.sub-users.toggleSubUser', $user->users->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_active"
                                                        onchange="this.form.submit()"
                                                        {{ $user->users->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label px-1 rounded text-white
                                                        {{ $user->users->is_active ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $user->users->is_active ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </form> --}}

                                                {{-- </td> --}}
                                            <td>
                                                  <!-- View Button -->
                                                <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-primary"
                                                    data-bs-toggle="modal"data-id="{{ $user->id }}"
                                                    data-bs-target="#shipperUsertShow{{ $user->id }}">
                                                    <i class="p-1 text-white fa fa-eye text-secondary"></i>
                                                </a>

                                                <!-- Edit Button -->
                                                {{-- <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                    data-bs-toggle="modal" data-id="{{ $user->id }}"
                                                    data-bs-target="#subShipperEditModal{{ $user->id }}">
                                                    <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                                </a> --}}

                                                <!-- Delete Button -->
                                                {{-- <a href="javascript:void(0);" class="p-0 mb-0 delete-user btn bg-danger rounded-circle"  data-id="{{ $user->id }}"
                                                        data-url="{{ route('shipper.sub-users.destroy', $user->id) }}">
                                                    <i class="p-1 text-white fa fa-trash"></i>
                                                </a> --}}

                                                {{-- <a href="{{ route('sub-users.edit', $user->id) }}" class="p-0 mb-0 rounded-circle btn bg-success">
                                                    <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                                </a> --}}
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

@include('backend.shipper.sub-user.create')
@foreach($subUsers as $user)
    @include('backend.shipper.sub-user.show', ['user' => $user])
    @include('backend.shipper.sub-user.edit', ['user' => $user])
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-user').click(function () {
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
        $('#responsive-datatable').DataTable({
            responsive: true
        });
    });
</script>

@endsection

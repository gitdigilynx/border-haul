@extends('layouts.backend.master')
@section('title', 'Address Book List')
@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">

                <div class="flex-grow-1">
                    <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">ADDRESS BOOK</h4>
                </div>

                <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none;">

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addressBook"
                    style="background-color: #06367B; color: white; border: none;  font-size: 1rem; font-weight: bold; border-radius: 6px; ">
                    + Add New Address
                    </button>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="responsive-datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Phone#</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addressBook as $address)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $address->name }}</td>
                                        <td>{{ $address->street_address }}</td>
                                        {{-- <td>{{ $address->country }}</td>
                                        <td>{{ $address->type }}</td> --}}
                                        <td>{{ $address->phone }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-primary"
                                                data-bs-toggle="modal"
                                                data-id="{{ $address->id }}"
                                                data-bs-target="#ShipperAddressBookModal{{ $address->id }}">
                                                    <i class="p-1 text-white fa fa-eye text-secondary"></i>
                                                </a>

                                             <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                data-bs-toggle="modal" data-bs-target="#addressBookEdit{{ $address->id }}">
                                                    <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                            </a>

                                            {{-- <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                data-bs-toggle="modal" data-id="{{ $address->id }}" data-bs-target="#addressBookEdit">
                                                <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                            </a> --}}

                                            <a href="javascript:void(0);"
                                                class="p-0 mb-0 delete-address-book btn bg-danger rounded-circle"
                                                data-id="{{ $address->id }}"
                                                data-url="{{ route('shipper.address-book.destroy', $address->id) }}">
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

@include('backend.shipper.address-book.create')
@foreach($addressBook as $address)
   @include('backend.shipper.address-book.show', ['address' => $address])
   @include('backend.shipper.address-book.edit', ['address' => $address])
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.delete-address-book').click(function () {
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
                            Swal.fire('Deleted!', 'The address entry has been deleted.', 'success')
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

@extends('layouts.backend.master')
@section('title', 'Dashboard')
@section('content')

<div class="content-page">
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="m-0 fs-26" style="font-family: 'Staatliches', sans-serif; color: black;">DOCUMENTS</h4>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none;">
                <img src="{{ asset('assets/icons/icon.svg') }}" alt="Truck Icon" style="width: 40px; height: 40px; margin-right: 8px;">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#carrierDocuments"
                style="background-color: #06367B; color: white; border: none;  font-size: 1rem; font-weight: bold; border-radius: 6px; ">
                 + New Documents
                </button>

            </div>

        </div>

        <div class="flex-grow-1">
            <h4 class="mb-2 fs-18" style="font-family: 'Staatliches', sans-serif; color: black;">RECENTLY EDITED</h4>
        </div>
            <div class="row">
                <div class="col-12">
                     <!-- Start Content-->
                     <div class="container-fluid">
                        <div class="row">
                            @foreach ($documents as $document)
                                <div class="mb-4 col-sm-6 col-xl-4">
                                    <div class="overflow-hidden border-0 shadow-lg card rounded-4 position-relative" style="border-top-right-radius: 3rem;">
                                        @php
                                            $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);
                                            $filename = pathinfo($document->file_path, PATHINFO_FILENAME);
                                            $previewableImageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                        @endphp

                                        <div class="card-body">
                                            <h5 class="mb-1 card-title fw-bold">
                                                {{ ucwords(str_replace(['-', '_'], ' ', $filename)) }}
                                                <span class="text-muted fw-normal">.{{ $extension }}</span>
                                            </h5>
                                            <p class="mb-3 text-muted small">Edited {{ $document->updated_at->diffForHumans() }}</p>

                                            @if(in_array(strtolower($extension), $previewableImageTypes))
                                                <img class="rounded img-fluid" src="{{ asset('storage/' . $document->file_path) }}" alt="Image document preview">
                                            @elseif(strtolower($extension) === 'pdf')
                                                <div class="overflow-hidden border rounded" style="height: 200px; background-color: #f8f9fa;">
                                                    <iframe src="{{ asset('storage/' . $document->file_path) }}" width="100%" height="200px" style="border: none;"></iframe>
                                                </div>
                                            @else
                                                <div class="overflow-hidden rounded" style="height: 200px; background-color: #f4f4f4;">
                                                    <img src="{{ asset('images/placeholder-doc.png') }}" class="w-100 h-100 object-fit-cover" alt="Doc preview" style="opacity: 0.6;">
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body responsive-datatable">
                            <table id="datatable-basic" class="table table-bordered dt-responsive nowrap table-flush">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th>Status</th>
                                        <th>Expire Date</th>
                                        <th>Last Modified</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->document_type }}</td>
                                        <td>
                                            <span class="{{ statusDocument($document->status) }}">
                                                {{ ucfirst($document->status) }}
                                            </span>
                                        </td>

                                        <td>{{ $document->expires_at }}</td>
                                        <td>
                                            {{ $document->updated_at->format('M j, Y') }}
                                        </td>
                                        <td>
                                             <!-- Download Button -->
                                            {{-- <a href="{{ route('carrier.documents.download', $document->id) }}"
                                                class="p-0 mb-0 rounded-circle btn bg-info" title="Download">
                                                <i class="p-1 text-white fa fa-download"></i>
                                            </a> --}}

                                            <!-- View Button -->
                                            <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-primary"
                                                data-bs-toggle="modal"data-id="{{ $document->id }}"
                                                data-bs-target="#carrierDocumentShow{{ $document->id }}">
                                                <i class="p-1 text-white fa fa-eye text-secondary"></i>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="javascript:void(0)" class="p-0 mb-0 rounded-circle btn bg-success"
                                                data-bs-toggle="modal" data-id="{{ $document->id }}"
                                                data-bs-target="#carrierDocumentEdit{{ $document->id }}">
                                                <i class="p-1 text-white fa fa-edit text-secondary"></i>
                                            </a>


                                            <!-- Delete Button -->
                                            <a href="javascript:void(0);" class="p-0 mb-0 delete-documents btn bg-danger rounded-circle"  data-id="{{ $document->id }}"
                                                    data-url="{{ route('carrier.documents.destroy', $document->id) }}">
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

@include('backend.carrier.document.create')

@foreach($documents as $document)
    @include('backend.carrier.document.show', ['document' => $document])
    @include('backend.carrier.document.edit', ['document' => $document])
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.delete-documents').click(function () {
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

<style>
.card {
    border-top-right-radius: 2rem !important;
}
</style>
@endsection

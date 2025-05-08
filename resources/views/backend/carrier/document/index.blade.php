@extends('layouts.backend.master')
@section('title', 'Dashboard')
@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-18 fw-semibold">Documents</h4>
                </div>

                <div class="text-end">
                    <ol class="py-0 m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Documents</li>

                    </ol>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                     <!-- Start Content-->
                    <div class="container-fluid">

                       <div class="row">
    @foreach ($documents as $document)
        <div class="mb-4 col-sm-6 col-xl-4">
            <div class="shadow card d-block">
                @php
                    $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);
                    $filename = pathinfo($document->file_path, PATHINFO_FILENAME);
                @endphp

                <div class="card-body">
                    <h5 class="card-title">
                        {{ ucwords(str_replace(['-', '_'], ' ', $filename)) }} <small class="text-muted">.{{ $extension }}</small>
                    </h5>
                    <p class="text-muted small">Edited {{ $document->updated_at->diffForHumans() }}</p>

                    @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                        <img class="rounded img-fluid" src="{{ asset('storage/' . $document->file_path) }}" alt="Document image">
                    @elseif(strtolower($extension) === 'pdf')
                        <iframe src="{{ asset('storage/' . $document->file_path) }}" width="100%" height="200px"></iframe>
                    @else
                        <div class="p-3 text-center border rounded text-muted">
                            <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                            <p class="mt-2 mb-0">Unsupported preview for .{{ $extension }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>


                    </div> <!-- container-fluid -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Documents List</h5>
                            {{-- <button type="button" class="btn btn-success">Add Users</button> --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#carrierDocuments">
                               + Documents
                            </button>
                        </div>
                        <div class="card-body responsive-datatable">
                            <table id="datatable-basic" class="table table-bordered dt-responsive nowrap table-flush">
                                <thead>
                                    <tr>
                                        {{-- <th>Sr #</th> --}}
                                        <th>Document Type</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $document->document_type }}</td>
                                        <td>{{ $document->expires_at }}</td>
                                        <td>
                                            <span class="{{ statusBadge($document->status) }}">
                                                {{ ucfirst($document->status) }}
                                            </span>
                                        </td>
                                        <td>
                                             <!-- Download Button -->
                                            <a href="{{ route('carrier.documents.download', $document->id) }}"
                                                class="p-0 mb-0 rounded-circle btn bg-info" title="Download">
                                                <i class="p-1 text-white fa fa-download"></i>
                                            </a>

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

@endsection

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
                 + Add Document
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
                        <div class="card-body">
                            <div class="px-2 row align-items-center justify-content-between">
                                <!-- Left: Company Details -->
                                <div class="mb-2 col-md-6 col-12 mb-md-0">
                                    <h3 style="
                                        font-family: Poppins !importent;
                                        font-weight: 600;
                                        font-size: 16px;
                                        line-height: 100%;
                                        letter-spacing: 0%;
                                        color: #000000;
                                    " class="" style="font-family: 'Poppins' !importent; color: black;">
                                        Documents</h3>
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
                                        <td style="
                                            color:
                                                {{ $document->status === 'Verified' ? 'green' :
                                                ($document->status === 'Submitted' ? 'blue' :
                                                ($document->status === 'Under Review' ? 'orange' : 'black')) }};
                                        ">
                                            {{ $document->status }}
                                        </td>


                                        <td>{{ $document->expires_at }}</td>
                                        <td>
                                            {{ $document->updated_at->format('M j, Y') }}
                                        </td>
                                        <td>

                                        <a href="javascript:void(0)" style="background-color: #E0F3FF; "
                                            class="p-0 mb-0 btn" data-bs-toggle="modal" data-id="{{ $document->id }}"
                                            data-bs-target="#carrierDocumentShow{{ $document->id }}">
                                            <i class="p-2 fa fa-eye" style="color:#007BFF" title="View Document"
                                            data-bs-toggle="tooltip" data-bs-placement="top"></i>

                                        </a>

                                        <a href="javascript:void(0)" style="background-color: #EFEFEF; "
                                            class="p-0 mb-0 btn" data-bs-toggle="modal"
                                            data-bs-target="#carrierDocumentEdit{{ $document->id }}">
                                            <i class="p-2 fa fa-edit" style="color:#9F9F9F" title="Edit Document"
                                            data-bs-toggle="tooltip" data-bs-placement="top"></i>
                                        </a>

                                        <a href="javascript:void(0);" style="background: #D2232A1A;  "
                                            class="p-0 mb-0 delete-documents btn " data-id="{{ $document->id }}"
                                            data-url="{{ route('carrier.documents.destroy', $document->id) }}">
                                            <i class="p-2 fa fa-trash-can" style="color:#D2232A"
                                                    title="Delete Document" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"></i>

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
    $(document).ready(function() {
        var table = $('#responsive-datatable').DataTable({
            responsive: true,
            lengthChange: false,
            pageLength: 10,
            ordering: false,
            info: false,
            pagingType: 'simple',
            language: {
                emptyTable: '<div style="text-align:center;">No documnet have been added yet. Click ‘+ Add Document to add a new document.</div>'
            }
        });

        $('#customSearch').on('keyup', function() {
            console.log('work'); // Should now fire
            table.search(this.value).draw();
        });
        $('#responsive-datatable_filter').hide();

       function updateButtons() {
            let info = table.page.info();

            if (info.recordsDisplay === 0) {
                // No data — disable both buttons
                $('#prevPage, #nextPage').addClass('disabled');
            } else {
                $('#prevPage').toggleClass('disabled', info.page === 0);
                $('#nextPage').toggleClass('disabled', info.page === info.pages - 1);
            }
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
        /* status */

    .verified {
        color: green;
    }
    .submitted {
        color: blue;
    }
    .under-review {
        color: orange;
    }

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
    .card {
    border-top-right-radius: 2rem !important;
}

</style>
@endsection

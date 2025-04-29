@extends('layouts.backend.master')
@section('title', 'Permission Listing')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="py-4 container-fluid">

            <!-- Page Header -->
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h2 class="mb-0 fs-4 fw-bold">Assign Permissions List</h2>
                <ol class="mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>

            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 fs-5">Assign Permissions to : {{ $admin->name }}</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.sub-admin.permissions.update', $admin->id) }}">
                        @csrf

                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="mb-3 col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="permission-{{ $permission->id }}"
                                               name="permissions[]"
                                               value="{{ $permission->name }}"
                                               {{ $admin->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        <label class="form-check-label fs-5 ms-2" for="permission-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="px-2 btn btn-success btn-xl">
                                Update Permissions
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

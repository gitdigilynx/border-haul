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

    @php
        function formatPermissions($permissions, $module)
        {
            $actions = ['add', 'edit', 'delete', 'view'];
            $result = [];

            foreach ($actions as $action) {
                $result[$action] = $permissions->first(function ($permission) use ($module, $action) {
                    return str_contains(strtolower($permission->name), strtolower($module . ' ' . $action));
                });
            }

            return $result;
        }

        $modules = [
            'Carrier Users' => 'carrier',
            'Shipper Users' => 'shipper',
            'Address' => 'address',
            'Documents' => 'documents',
        ];
    @endphp

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Module</th>
                <th style="text-align: center">Add</th>
                <th style="text-align: center">Edit</th>
                <th style="text-align: center">Delete</th>
                <th style="text-align: center">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $label => $keyword)
                @php
                    $filteredPermissions = $permissions->filter(function ($permission) use ($keyword) {
                        return str_contains(strtolower($permission->name), strtolower($keyword));
                    });

                    $grouped = formatPermissions($filteredPermissions, $keyword);
                @endphp
                <tr>
                    <td>{{ $label }}</td>
                    @foreach (['add', 'edit', 'delete', 'view'] as $action)
                        <td class="text-center">
                            @if (!empty($grouped[$action]))
                                <input type="checkbox"
                                    id="permission-{{ $grouped[$action]->id }}"
                                    name="permissions[]"
                                    value="{{ $grouped[$action]->name }}"
                                    {{ in_array($grouped[$action]->name, old('permissions', $admin->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>
                            @else
                                <input type="checkbox"
                                    id="permission-{{ $action }}-no-permission"
                                    name="permissions[]"
                                    value="{{ $action }}_{{ $keyword }}"
                                    title="No permission available for this action">
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-end">
        <button type="submit" class="px-4 btn btn-success">Update Permissions</button>
    </div>
</form>


                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

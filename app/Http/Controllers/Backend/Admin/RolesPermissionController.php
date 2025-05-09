<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Flasher\Laravel\Facade\Flasher;

class RolesPermissionController extends Controller
{
    public function index()
    {
        try {
            $rolePermissions = User::get();
            // dd($rolePermissions);
            return view('backend.admin.role-permission.index', compact('rolePermissions'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editPermission($id)
    {
        try {
            $admin = User::findOrFail($id);
            $permissions = Permission::all();
            $adminPermissions = $admin->permissions->pluck('name')->toArray();

            return view(
                'backend.admin.role-permission.assign-permissions',
                compact('admin', 'permissions', 'adminPermissions')
            );
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updatePermission(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'permissions' => 'array',
                'permissions.*' => 'string|exists:permissions,name',
            ]);

            $user->syncPermissions($request->input('permissions', []));

            return redirect()
                ->route('admin.sub-admin', $user->id)
                ->with('success', 'Permissions updated successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function toggleRolePermission(Request $request, $id)
    {
        try {
            $subUser = User::findOrFail($id);
            $subUser->is_active = $request->has('is_active');
            $subUser->save();

            return back()->with('status', 'User status updated.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}

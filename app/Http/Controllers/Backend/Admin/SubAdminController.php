<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarrierSubUser;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordToCarrierUser;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Flasher\Laravel\Facade\Flasher;

class SubAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $subAdmins = User::where('role', 'subadmin')->get();
            return view('backend.admin.sub-admin.index', compact('subAdmins'));
        } catch (\Exception $e) {
      Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('backend.admin.sub-admin.create');
        } catch (\Exception $e) {
      Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {

            $rawPassword = Str::random(8);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($rawPassword),
                'role' => 'subAdmin',
            ]);

            // Send credentials via email
            Mail::to($request->email)->send(new SendPasswordToCarrierUser($request->email, $rawPassword));

            return redirect()->route('admin.sub-admin')->with('success', 'Sub Admin created successfully!');
        } catch (\Exception $e) {
      Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $admin = User::findOrFail($id);
            return view('backend.admin.sub-admin.show', compact('admin'));
        } catch (\Exception $e) {
      Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('backend.admin.sub-admin.edit');
        } catch (\Exception $e) {
             Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);
            $admin = User::findOrFail($id);
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('admin.sub-admin');
        } catch (\Exception $e) {
             Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $subAdmin = User::findOrFail($id);
            $subAdmin->delete();

            return response()->json(['message' => 'Sub Admin deleted successfully']);
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

     public function editPermission($id)
    {
        $admin = User::findOrFail($id);
        $permissions = Permission::all();
        $adminPermissions = $admin->permissions->pluck('name')->toArray();

        return view('backend.admin.sub-admin.assign-permissions', compact('admin', 'permissions', 'adminPermissions'));
    }

    public function updatePermission(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $admin->syncPermissions($request->input('permissions', []));

        return redirect()
            ->route('admin.sub-admin', $admin->id)
            ->with('success', 'Permissions updated successfully.');
    }

    public function toggleAdmin(Request $request, $id)
    {
        try {
            $subUser = User::findOrFail($id);
            $subUser->is_active = $request->has('is_active');
            $subUser->save();

            return back()->with('status', 'User status updated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}

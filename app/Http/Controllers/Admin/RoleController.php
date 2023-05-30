<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        $permissions = Permission::all();
        return view('admin.role.index', compact('roles', 'permissions'));
    }
    public function roleCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        if ($request->has('permission')) {
            
            foreach ($request->permission as $permissions) {
                $rolePermission = new RoleHasPermission();
                $explode = explode(':', $permissions);
                $rolePermission->permission_id = $explode[0];
                $rolePermission->permission_name = $explode[1];
                $rolePermission->role_id = $role->id;
                $rolePermission->role_name = $role->name;
                $rolePermission->save();
            }
        }
        return redirect()->back()->with('success', 'role create successfully');
    }
    public function destroy($id)
    {
        $Recruiter = Role::find($id);

        $Recruiter->delete();

        return redirect()->back();
    }
    public function updateRole(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $role = Role::find($id);

        $role->name = $request->name;
        $role->save();

        if ($request->has('permission')) {
            RoleHasPermission::where('role_id', $role->id)->delete();
            foreach ($request->permission as $permissions) {
                $rolePermission = new RoleHasPermission();
                $explode = explode(':', $permissions);
                $rolePermission->permission_id = $explode[0];
                $rolePermission->permission_name = $explode[1];
                $rolePermission->role_id = $role->id;
                $rolePermission->role_name = $role->name;
                $rolePermission->save();
            }
        }

        return redirect()->back()->with('update', 'role update successfully');
    }

}

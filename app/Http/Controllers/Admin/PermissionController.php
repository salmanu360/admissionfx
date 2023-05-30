<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.permission.index', compact('permissions'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        return redirect()->back()->with('success', 'permission create successfully');
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);

        $permission->delete();

        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $permission = Permission::find($id);

        $permission->name = $request->name;
        $permission->save();

        return redirect()->back()->with('update', 'permission update successfully');
    }

}

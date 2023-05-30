<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.profile');
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'newPassword' => '',
            'confrimPassword' => 'same:newPassword'
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-img.' . $file->getClientOriginalExtension();
            $filePath = $file->move('uploads/admin/profile', $fileName);
            if (auth()->user()->photo) {
                Storage::delete(auth()->user()->image);
            }
            auth()->user()->image = $filePath;
            auth()->user()->save();
        }
        if ($request->newPassword != "") {
            Admin::where('id', $id)->update([
                'password' => Hash::make($request['newPassword']),
            ]);
        }


        return redirect('/admin/profile');
    }
}

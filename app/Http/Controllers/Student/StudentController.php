<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function StudentDashboard()
    {
        return view('student.dashboard');
    }
    public function profile(){
        return view('student.profile');
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
            $filePath = $file->move('uploads/students/profile', $fileName);
            if (auth()->user()->photo) {
                Storage::delete(auth()->user()->photo);
            }
            auth()->user()->photo = $filePath;
            auth()->user()->save();
        }
        User::where('id', $id)->update([
            'password' => Hash::make($request['newPassword']),
        ]);

        if(auth()->user()->role == 'student'){
            StudentPassword::where('user_id',$id)->update([
                'student_password' => $request->newPassword,
            ]);
        }

        return redirect()->back();
    }
}

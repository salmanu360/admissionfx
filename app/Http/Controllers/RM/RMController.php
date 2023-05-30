<?php

namespace App\Http\Controllers\RM;

use App\Http\Controllers\Controller;
use App\Models\AssignRecruiterToRm;
use App\Models\College;
use App\Models\Country;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RMController extends Controller
{
    public function RMDashboard()
    {
        $totalCollege = College::count();
        $totalStudent = Student::count();
        $totalRecruiter = Recruiter::count();
        $totalCourse = Course::count();
        $totalCountry = Country::count();
        return view('rmanager.dashboard',compact('totalCollege', 'totalCourse', 'totalStudent', 'totalRecruiter', 'totalCountry'));
    }
    
     public function rmrecruiter()
    {
        
        $assigns = AssignRecruiterToRm::where('rm_id', auth()->user()->id)->Latest()->get();
        $recruiters = Recruiter::all();
        $rms = User::where('role', 'rm')->get();
        return view('rmanager.assignRecruiuterToRm.recruiterrm', compact('assigns', 'recruiters', 'rms'));
    }
    
    public function profile(){
        return view('rmanager.profile');
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
            $filePath = $file->move('uploads/RM/profile', $fileName);
            if (auth()->user()->photo) {
                Storage::delete(auth()->user()->photo);
            }
            auth()->user()->photo = $filePath;
            auth()->user()->save();
        }
        User::where('id', $id)->update([
            'password' => Hash::make($request['newPassword']),
        ]);

        return redirect('/rm/profile');
    }

}

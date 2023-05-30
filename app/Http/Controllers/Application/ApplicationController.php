<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\LeadStatus;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ApplicationController extends Controller
{
    public function ApplicationDashboard()
    {
        return view('application.dashboard');
    }
    
    public function application()
    {
        $students = Student::Latest()->get();
        return view('application.index', compact('students'));
    }

    public function lead()
    {
        $leadStatus = LeadStatus::latest()->get();
        return view('application.lead', compact('leadStatus'));
    }
    
    public function recruiter()
    {                 
        $recruiters = Recruiter::latest()->get();
        return view('application.recruiter', compact('recruiters'));
    }
    
    public function recruiterdetail($id)
    {
        $recruiter = Recruiter::find($id);
        return view('application.recruiter_view', compact('recruiter'));
    }
    
    public function application1(Request $request, $id)
    {
        
        $students = Student::where('application_team',auth()->user()->id)->where('lead_status',$id)->get();
        $student = Student::where('application_team',auth()->user()->id)->where('lead_status',$id)->first();
        $leadStatus = LeadStatus::all();
        return view('application.index1', compact('students', 'student','leadStatus'));
    }
    
    public function totalstudent()
    {
        $students = Student::where('application_team',auth()->user()->id)->get();
        $leadStatus = LeadStatus::all();
        return view('application.totalstudent', compact('students', 'leadStatus'));
    }
    
    public function showstudent(Request $request, $id)
    {
        $leadStatus = LeadStatus::all();
        $students = Student::where('application_team',auth()->user()->id)->where('id',$id)->get();
        $studentone = Student::where('application_team',auth()->user()->id)->where('id',$id)->first();
        return view('application.showstudent', compact('students', 'leadStatus','studentone'));
    }
    
     public function profile(){
        return view('application.profile');
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
            $filePath = $file->move('uploads/application/profile', $fileName);
            if (auth()->user()->photo) {
                Storage::delete(auth()->user()->photo);
            }
            auth()->user()->photo = $filePath;
            auth()->user()->save();
        }
        User::where('id', $id)->update([
            'password' => Hash::make($request['newPassword']),
        ]);

        return redirect('/application/profile');
    }
    
}

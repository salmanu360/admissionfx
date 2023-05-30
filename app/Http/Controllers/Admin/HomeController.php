<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Student;
use App\Models\College;
use App\Models\Course;
use App\Models\Recruiter;



class HomeController extends Controller
{
    
   
   
    public function index()
    {
        $totalCollege = College::count();
        $totalCourse = Course::count();
        $totalStudent = Student::count();
        $totalCountry = Country::count();
        $totalrecruiter = Recruiter::count();
        $total_new_recruiter = Recruiter::count();
        $leadstatus=\App\Models\LeadStatus::get();
        // dd($totalrecruiter);
        
        return view('admin.index', compact('totalCollege', 'totalCountry', 'totalCourse', 'totalStudent','totalrecruiter','leadstatus'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
    
    
}

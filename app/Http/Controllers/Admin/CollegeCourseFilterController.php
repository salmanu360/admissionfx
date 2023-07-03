<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Course;
use App\Models\StudentApply;
use Illuminate\Http\Request;

class CollegeCourseFilterController extends Controller
{
    public function index()
    {
        $filters = Course::where('id', 1);
        return view('admin.college-course-filter', compact('filters'));
    }
    public function filter(Request $request)
    {

        $course = $request->course;
        $college = $request->college;

        if (isset(($course)) || !empty($course)) {
            $filters = Course::join('colleges', 'colleges.id', '=', 'courses.college_id')
                ->join('countries', 'countries.id', 'colleges.country_id')
                ->where('colleges.id', $course)
                ->orwhere('courses.college_id', $college)
                ->select(
                    'colleges.*',
                    'colleges.name AS clgName',
                    'courses.*',
                    'courses.id AS courseID',
                    'countries.name AS country'
                )
                ->get();

            // dd($filters);
            // $filters = College::join('courses', 'colleges.id', 'courses.college_id')
            // ->where('courses.id', $course)
            // ->get();
        }
        return view('admin.college-course-filter', compact('filters'));

        //     if(isset(($course)) && !empty($course)) {
        //         $filters = College::join('courses' ,'colleges.id', '=', 'courses.college_id')
        //         ->join('countries', 'countries.id', 'colleges.country_id')
        //         ->where('colleges.id', $course)
        //         ->select('colleges.*', 'colleges.name AS clgName', 'courses.*', 
        //         'courses.id AS courseID', 'countries.name AS country')
        //         ->get();

        //         // dd($filters);
        //         // $filters = College::join('courses', 'colleges.id', 'courses.college_id')
        //         // ->where('courses.id', $course)
        //         // ->get();
        //     } 
        //     elseif(isset(($college)) && !empty($college)) {
        //         $filters = College::
        //         join('courses', 'colleges.id', '=', 'courses.college_id')
        //         ->join('countries', 'countries.id', 'colleges.country_id')
        //         ->where('courses.college_id', $college)
        //         ->select('colleges.*', 'colleges.name AS clgName', 'courses.*',
        //         'courses.id AS courseID', 'countries.name AS country')
        //         ->get();

        //     } 
        //  else {
        //     $filters = Course::where('id', 1);
        // }


    }

    public function intake()
    {
        $filters = Course::where('id', 1);
        return view('admin.intake-filter', compact('filters'));
    }
    public function intakeFilter(Request $request)
    {
        $course = $request->course;
        $college = $request->college;
        $country = $request->country;
        $state = $request->state_id;
        $intake = $request->intake_month;
        $program = $request->program;
        $category = $request->category;
        $duration = $request->duration;


        // $intake_month = $request->input('intake_month');
        // $startDate = date('Y-m-01', strtotime("2023-$intake_month-01"));
        // $endDate = date('Y-m-t', strtotime($startDate));
        // ->whereBetween('colleges.intake', [$startDate, $endDate])
        //     ->orWhere(function ($query) use ($startDate, $endDate) {
        //         $query->whereBetween('courses.intake', [$startDate, $endDate]);
        //     })


        if (isset(($course)) || !empty($course)) {
            $filters = Course::join('colleges', 'colleges.id', '=', 'courses.college_id')
                ->join('countries', 'countries.id', 'colleges.country_id')
                ->where('colleges.id', $course)
                ->orwhere('courses.college_id', $college)
                ->orwhere('colleges.country_id', $country)
                ->orwhere('courses.state_id', $state)
                ->orwhere('courses.program_id', $program)
                ->orwhere('courses.category_id', $category)
                ->orwhere('courses.duration', 'LIKE', "%$duration%")
                ->orwhereDate('colleges.intake', 'LIKE', "%$intake%")
                ->orwhereDate('courses.intake', 'LIKE', "%$intake%")
                ->select(
                    'colleges.*',
                    'colleges.name AS clgName',
                    'courses.*',
                    'courses.id AS courseID',
                    'countries.name AS country'
                )
                ->get();
        }

        return view('admin.intake-filter', compact('filters'));
    }


    public function apply(Request $request)
    {
        $request->validate([
            'student' => 'required',
        ]);
        $apply = new StudentApply();

        $apply->student_id = $request->student;
        $apply->created_by = auth()->user()->id;
        $apply->college_id =   $request->college;
        $apply->course_id = $request->course;

        $apply->save();

        return redirect()->back()->with('success', 'Apply to course successfully');
    }
}

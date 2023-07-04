<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        if (isset($course) || !empty($course)) {
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
         $query = Course::select(
            'courses.*', 'courses.id AS courseID',
            'colleges.*', 'colleges.name AS clgName',
            'countries.name AS country'
        )
            ->join('colleges', 'colleges.id', '=', 'courses.college_id')
            ->join('countries', 'countries.id', 'colleges.country_id');


        if (isset($request->course) || !empty($request->course)) {
            $query->where('courses.id', $request->course);
        }

        if (isset($request->college) || !empty($request->college)) {
            $query->where('colleges.id', $request->college);
        }

        if (isset($request->country) || !empty($request->country)) {
            $query->where('colleges.country_id', $request->country);
        }

        if (isset($request->state_id) || !empty($request->state_id)) {
            $query->where('colleges.state_id', $request->state_id);
        }
        if (isset($request->program) || !empty($request->program)) {
            $query->where('courses.program_id', $request->program);
        }

        if (isset($request->category) || !empty($request->category)) {
            $query->where('courses.category_id', $request->category);
        }

        if (isset($request->duration) || !empty($request->duration)) {
            $query->where('courses.duration', 'LIKE', "%$request->duration%");
        }

        if (isset($request->intake_month) || !empty($request->intake_month)) {
            $query->whereDate('colleges.intake', 'LIKE', "%$request->intake_month%");
            $query->orwhereDate('courses.intake', 'LIKE', "%$request->intake_month%");
        }

        $filters = $query->get();

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

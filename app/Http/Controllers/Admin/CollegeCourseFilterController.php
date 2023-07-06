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
        $validateData=['course'=>'','college'=>'','country'=>'','state_id'=>'','program'=>'','category'=>'','duration'=>'','intake_month'=>''];
        $filters = Course::join('colleges','courses.college_id','=', 'colleges.id')
        ->join('countries','courses.country_id','=','countries.id')
            ->select(
                'courses.*',
                'colleges.name as clgName',
                'countries.name AS country'
            )->orderBy('courses.created_at','DESC')->get();
        return view('admin.intake-filter', compact('filters', 'validateData'));
    }
    public function intakeFilter(Request $request)
    {
        if($request->state_id) {
            $validateData=['course'=>$request->course,'college'=>$request->college,'country'=>$request->country,
                'state_id'=>$request->state_id,'program'=>$request->program,'category'=>$request->category,
                'duration'=>$request->duration,'intake_month'=>$request->intake_month];

        } else{
            $validateData=['course'=>$request->course,'college'=>$request->college,'country'=>$request->country,
                'state_id'=>0,'program'=>$request->program,'category'=>$request->category,
                'duration'=>$request->duration,'intake_month'=>$request->intake_month];

        }
         $query = Course::select(
             'courses.*',
             'colleges.name as clgName',
             'countries.name AS country'
         )
            ->join('colleges', 'colleges.id', '=', 'courses.college_id')
            ->join('countries', 'countries.id', '=', 'courses.country_id');

        if (isset($request->course) || !empty($request->course)) {
            $query->where('courses.id', $request->course);
        }

        if (isset($request->college) || !empty($request->college)) {
            $query->where('courses.college_id', $request->college);
        }

        if (isset($request->country) || !empty($request->country)) {
            $query->where('courses.country_id', $request->country);
        }

        if (isset($request->state_id) || !empty($request->state_id)) {
            $query->where('courses.state_id', $request->state_id);
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
            $query->whereDate('courses.intake', 'LIKE', "%$request->intake_month%");
        }

        $filters = $query->orderBy('courses.created_at','DESC')->get();

        return view('admin.intake-filter', compact('filters', 'validateData'));
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

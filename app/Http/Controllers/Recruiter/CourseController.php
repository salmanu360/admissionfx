<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Country;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\ignoreCase;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        //$courses = Course::where('created_by', auth()->user()->id)->with('college')->Latest()->get();
        $courses = Course::with('college')->Latest()->get();
        return view('recruiter.course.index', compact('courses'));
    }

    public function create()
    {
        $colleges = College::all();
        return view('recruiter.course.add', compact('colleges'));
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|unique:courses',
            'intake' => 'required',
            'description' => 'nullable',
            'duration' => 'required',
            'tuition_fee' => 'required',
            'application_fee' => 'nullable',
            'tags' => 'nullable',
            'requirement' => 'required',
            'college_id' => 'required',
            'status' => 'nullable',
        ]);

        $course = new Course();
        $course->name = ucfirst($request->name);
        $course->slug = Str::slug(ucfirst($request->name));
        $course->intake = $request->intake;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->tuition_fee = $request->tuition_fee;
        $course->application_fee = $request->application_fee;
        $course->tags = $request->tags;
        $course->requirement = $request->requirement;
        $course->college_id = $request->college_id;

        $course->created_by = Auth()->user()->id;
        $course->created_by_name = Auth()->user()->name;

        $course->save();

        Session::flash('success_message', 'Course has been successfully added');
        return redirect()->route('cors.index');
    }

    public function show(College $college)
    {
        abort(503);
    }


    public function edit($id)
    {
        $course = Course::find($id);
        $colleges = College::all();
        return view('recruiter.course.edit', compact('colleges', 'course'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => ['required',Rule::unique('courses')->ignore($request->name, 'name')],
            'intake' => 'required',
            'description' => 'nullable',
            'duration' => 'required',
            'tuition_fee' => 'required',
            'application_fee' => 'nullable',
            'tags' => 'nullable',
            'requirement' => 'required',
            'college_id' => 'required',
            'status' => 'nullable',
        ]);

        $course = Course::find($id);
        $course->name = ucfirst($request->name);
        $course->slug = Str::slug(ucfirst($request->name));
        $course->intake = $request->intake;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->tuition_fee = $request->tuition_fee;
        $course->application_fee = $request->application_fee;
        $course->tags = $request->tags;
        $course->requirement = $request->requirement;
        $course->college_id = $request->college_id;

        $course->created_by = Auth()->user()->id;
        $course->created_by_name = Auth()->user()->name;

        if(empty($request->status)){
            $course->status = 0;
        } else{
            $course->status = 1;
        }
        $course->update();

        Session::flash('success_message', 'Course has been successfully updated');
        return redirect()->route('cors.index');
    }

    public function destroy($id)
    {

        $course = Course::find($id);
        $course->delete();

        Session::flash('success_message', 'State Has Been deleted Successfully');
        return redirect()->back();

    }
    
     public function getDetail($id)
    {
        $course = Course::find($id);
        $college = College::find($course->college_id);
        return view('recruiter.course.view', compact('course','college'));
    }

    public function collegeDetail($id){
        $courses = Course::where('college_id', $id)->get();
        $course = Course::where('college_id', $id)->first();
        $college = College::join('countries', 'countries.id', '=', 'colleges.country_id')
        ->where('colleges.id', $id)
        ->select('colleges.name AS college_name', 'colleges.image AS image', 'countries.name AS country_name')
        ->first();
        $students = Student::all();
        return view ('recruiter.college-detail', compact('courses', 'college', 'course', 'students'));
    }

}

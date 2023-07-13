<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\College;
use App\Models\Country;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\CSVUpload;
use function Symfony\Component\String\ignoreCase;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $courses = Course::with('college')->Latest()->get();
        return view('admin.course.index', compact('courses'));
    }
    public function uploadexcel(Request $request)
    {
        return view('admin.course.uploadexcel');
    }

    public function uploadexcelcsv(Request $request)
    {

        $path= app_path();
        $filename= $path.'/course.csv';
        $row = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
                //   echo '<pre>';print_r($data);continue;
                $num = 4;
                $row++;
                if($row != 2 && $row < 2473)
                {
                    //  echo '<pre>';print_r($data);continue;
                    $Course  = new Course();
                    $Course->college_id=trim($data[0]);
                    $Course->slug=trim($data[1]);
                    $Course->name=trim($data[1]);
                    $Course->intake=$data[2];
                    $Course->description=trim($data[3]);
                    $Course->duration=trim($data[4]);
                    $Course->tuition_fee=trim($data[5]);
                    $Course->application_fee=trim($data[6]);
                    $Course->tags=trim($data[7]);
                    $Course->requirement=trim($data[8]);
                    $Course->created_by = Auth()->user()->id;
                    $Course->created_by_name = Auth()->user()->name;
                    $Course->save();

                }

            }
            $csvSave = new CSVUpload();
            if($request->hasFile('excel_course')){
                $file = $request->file('excel_course');
                $fileName = 'course' . rand(99,1000) . '-file.' . $file->getClientOriginalExtension();
                $csvSave->file = $request->file('excel_course')->move('uploads/CSVFiles/', $fileName);
                if($csvSave->file){
                    $csvSave->delete('uploads/CSVFiles/', $csvSave->photo);
                }
            }
            $csvSave->created_by = auth()->user()->id;
            $csvSave->created_name = auth()->user()->name;
            $csvSave->save();

            Session::flash('success_message', 'Course has been successfully added');
            return redirect()->route('course.index');
        }

    }


    public function create()
    {
        $colleges = College::all();
        $countries = Country::all();
        $categories = Category::all();
        $programs = Program::all();
        return view('admin.course.add', compact('colleges','countries', 'categories', 'programs'));
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
            'country' => 'required',
            'state_id' => 'nullable',
            'program' => 'required',
            'category' => 'nullable',
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
        $course->country_id = $request->country;
        $course->state_id = $request->state_id;
        $course->program_id = $request->program;
        $course->category_id = $request->category;

        $course->created_by = Auth()->user()->id;
        $course->created_by_name = Auth()->user()->name;

        $course->save();
        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'New Course is registered';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Course';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $course->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();

        Session::flash('success_message', 'Course has been successfully added');
        return redirect()->route('course.index');
    }

    public function getDetail($id)
    {
        $course = Course::find($id);
        $college = College::find($course->college_id);
        $program = Program::select('name')->where('id', $course->program_id)->first();
        $category = Category::select('name')->where('id', $course->category_id)->first();
        $country = Country::select('name')->where('id', $course->country_id)->first();
        return view('admin.course.view', compact('course','college', 'program', 'category', 'country'));
    }

    public function show(College $college)
    {
        abort(503);
    }


    public function edit($id)
    {
        $course = Course::find($id);
        $colleges = College::all();
        $countries = Country::all();
        $categories = Category::all();
        $programs = Program::all();
        return view('admin.course.edit', compact('colleges', 'course','countries', 'categories', 'programs'));
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
            'country' => 'required',
            'state_id' => 'nullable',
            'program' => 'required',
            'category' => 'nullable',
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
        $course->country_id = $request->country;
        $course->state_id = $request->state_id;
        $course->program_id = $request->program;
        $course->category_id = $request->category;

        $course->created_by = Auth()->user()->id;
        $course->created_by_name = Auth()->user()->name;

        if(empty($request->status)){
            $course->status = 0;
        } else{
            $course->status = 1;
        }
        $course->update();

        $notification =  new Notification();
        $notification->type ='Update';
        $notification->data = ' Course is updated';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Course';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $course->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();

        Session::flash('success_message', 'Course has been successfully updated');
        return redirect()->route('course.index');
    }

    public function destroy($id)
    {

        $course = Course::find($id);
        $course->delete();

        Session::flash('success_message', 'State Has Been deleted Successfully');
        return redirect()->back();

    }

    public function apply(Request $request)
    {
        return view('admin.course.applyCourses');
    }

}

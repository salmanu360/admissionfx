<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudentApplication;
use App\Models\StudentApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index(){
        $applies = StudentApply::join('students', 'students.id', 'student_applies.student_id')
        ->leftjoin('users', 'users.id', 'student_applies.recruiter_id')
        ->join('colleges', 'colleges.id', 'student_applies.college_id')
        ->join('courses', 'courses.id', 'student_applies.course_id')
        ->leftjoin('student_applications', 'student_applications.student_id', 'student_applies.student_id')
        ->select('student_applies.created_by AS NAME', 'student_applies.id AS id', 
        'student_applies.student_id AS stdid', 'student_applies.created_at AS date',
        'colleges.id AS clgid', 'colleges.name AS clgName', 'courses.id AS crid',
        'courses.name AS crName', 'courses.application_fee AS appFee',
        'courses.tuition_fee AS visaFee', 'users.name AS userName', 
        'student_applications.application_fee', 'student_applications.visa_fee',
        'student_applications.application_fee_status', 'student_applications.visa_fee_status', 
        'student_applications.pay_status', 'student_applications.payment_date',
        'student_applications.id AS stdAppId',
        'students.email AS stdEmail', 'students.emergency_contact_phone AS stdPhone',
        'students.id As STDID', 
        DB::raw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) AS stdName'))
        ->orderby('student_applications.id', 'ASC')->get();
        return view('admin.application.index', compact('applies'));
    }

    public function create(Request $request){
        // $request->validate([
        //     'paymentDate' => 'required'
        // ]);
        $studentApp = new StudentApplication ;
        $studentApp->student_id = $request->studentId;
        $studentApp->college_id = $request->collegeId;
        $studentApp->course_id = $request->courseId;
        $studentApp->application_fee = $request->appFee;
        $studentApp->visa_fee = $request->visaFee;
        $studentApp->payment_date = $request->paymentDate;
        if($request->appFee != ""){
            $studentApp->application_fee_status = 1;
            $studentApp->pay_status = 1;
        } elseif($request->visaFee != ""){
            $studentApp->visa_fee_status = 1;
            $studentApp->pay_status = 1;
        } if($request->appFee != "" && $request->visaFee != "") {
            $studentApp->application_fee_status = 1;
            $studentApp->visa_fee_status = 1;
            $studentApp->pay_status = 1;
        }
        $studentApp->save();
        return redirect()->back();
    }

    public function getCourses($college_id){
        $courses = Course::where('college_id', $college_id)->get();
        // return view('admin.application.index', compact('courses'));
        return response()->json($courses);
    }
    
    public function apply(Request $request){
        $request->validate([
            'student' => 'required',
            'college' => 'required',
            'course' => 'required',
            // 'paymentDate' => 'required',
        ]);

        $studentApp = new StudentApplication ;
        $studentApp->student_id = $request->student;
        $studentApp->college_id = $request->college;
        $studentApp->course_id = $request->course;
        $studentApp->application_fee = $request->appFee;
        $studentApp->visa_fee = $request->visaFee;
        $studentApp->payment_date = $request->paymentDate;
        if($request->appFee != ""){
            $studentApp->application_fee_status = 1;
            $studentApp->pay_status = 1;
        } elseif($request->visaFee != ""){
            $studentApp->visa_fee_status = 1;
            $studentApp->pay_status = 1;
        } if($request->appFee != "" && $request->visaFee != "") {
            $studentApp->application_fee_status = 1;
            $studentApp->visa_fee_status = 1;
            $studentApp->pay_status = 1;
        }
        $studentApp->save();

        $apply = new StudentApply();

        $apply->student_id = $request->student;
        $apply->created_by = auth()->user()->id;
        $apply->college_id =  $request->college;
        $apply->course_id = $request->course;

        $apply->save();

        return redirect()->back()->with('success', 'you Apply for Student Successfully');
    }
}

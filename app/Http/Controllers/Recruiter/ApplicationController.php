<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\Course;
use App\Models\StudentApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        'students.email AS stdEmail', 'students.emergency_contact_phone AS stdPhone', 
        DB::raw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) AS stdName'))
        ->orderby('student_applies.id', 'DESC')->get();
        return view('recruiter.application.index', compact('applies'));
    }
}

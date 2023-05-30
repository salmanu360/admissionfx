<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RecruiterMarketing;
use App\Models\Recruiter;
use App\Models\College;
use App\Models\Course;
use App\Models\Student;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\GradingScheme;
use App\Models\HighestLevelEducation;
use App\Models\StudentApply;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use App\Models\RecruiterPassword;
use Illuminate\Support\Str;
use Mail;
use App\Mail\demoMail;
use App\Mail\recruitermail;


class ApiRecruiterController extends Controller
{
    //
    use ApiResponser;

    
    public function getColleges(){
        try {
        $colleges = College::with('country')->select('colleges.slug as clgName','colleges.*')->Latest()->get();
        return $this->success([
            'colleges' => $colleges,
        ],'College List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getCourses(){
        try {
        $courses = Course::with('college')->select('courses.slug as clgName','courses.*')->Latest()->get();
        return $this->success([
            'courses' => $courses,
        ],'Courses List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getCountries(){
        try {
        $countries = Country::all();
        return $this->success([
            'countries' => $countries,
        ],'Countries List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getCities(){
        try {
        $cities = City::all();
        return $this->success([
            'cities' => $cities,
        ],'Cities List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getStates(){
        try {
        $states = State::all();
        return $this->success([
            'states' => $states,
        ],'States List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getLevels(){
        try {
        $levels = HighestLevelEducation::all();
        return $this->success([
            'levels' => $levels,
        ],'Levels List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getGradings(){
        try {
        $gradings = GradingScheme::all();
        return $this->success([
            'gradings' => $gradings,
        ],'Gradings List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getApplications(){
        try {
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
        return $this->success([
            'applications' => $applies,
        ],'Applications List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    public function getStudents(){
        try {
        $students = Student::where('created_by', auth()->user()->id)->Latest()->get();
        return $this->success([
            'students' => $students,
        ],'Students List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
        
    }
    
    
    public function filterColleges(Request $request){
        $course = $request->course;
        $college = $request->college;
        $colleges = Course::join('colleges' ,'colleges.id', '=', 'courses.college_id')
            ->join('countries', 'countries.id', 'colleges.country_id')
            ->where('colleges.id', $course)
            ->orwhere('courses.college_id', $college)
            ->select('colleges.*', 'colleges.name AS clgName', 'courses.*', 
            'courses.id AS courseID', 'countries.name AS country')
            ->get();
            
            try {
        return $this->success([
            'colleges' => $colleges,
        ],'College List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
    }
    
    public function filterCourses(Request $request){
        $course = $request->course;
        $college = $request->college;
        $country = $request->country;
        $intake = $request->intake_month;
        $courses = Course::join('colleges' ,'colleges.id', '=', 'courses.college_id')
            ->join('countries', 'countries.id', 'colleges.country_id')
            ->where('colleges.id', $course)
            ->orwhere('courses.college_id', $college)
            ->orwhere('colleges.country_id', $country)
            ->orwhereDate('colleges.intake', 'LIKE', "%$intake%")
            ->orwhereDate('courses.intake', 'LIKE', "%$intake%")
            ->select('colleges.*', 'colleges.name AS clgName', 'courses.*', 
            'courses.id AS courseID', 'countries.name AS country')
            ->get();
            
            try {
        return $this->success([
            'courses' => $courses,
        ],'Courses List Fetched Successfully.');
        } catch (\Exception $e){
            return $this->error(500,[
            'error' => $e->getMessage()
        ]);
        }
    }
    
    public function uploadImage(Request $request){
        $user = auth()->user();
        $image_base64 = base64_decode($request->img);
        $file =$request->imgName;
        if($request->has('tracker_id') && !empty($request->tracker_id)){
            $app_path = storage_path('uploads/traker_images/').$request->tracker_id.'/';
            if (!file_exists($app_path)) {
                mkdir($app_path, 0777, true);
            }

        }else{
            $app_path = storage_path('uploads/traker_images/');
            if (is_dir($app_path)) {
                mkdir($app_path, 0777, true);
            }
        }
        $file_name =  $app_path.$file;
        file_put_contents( $file_name, $image_base64);
        $new = new TrackPhoto();
        $new->track_id = $request->tracker_id;
        $new->user_id  = $user->id;
        $new->img_path  = 'uploads/traker_images/'.$request->tracker_id.'/'.$file;
        $new->time  = $request->time;
        $new->status  = 1;
        $new->save();
        return $this->success( [],'Uploaded successfully.');
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\LeadStatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentPassword;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\GradingScheme;
use App\Models\HighestLevelEducation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\StudentEductionHistory;
use Mail;
use App\Mail\demoMail;
use App\Mail\studentmail;
use App\Models\CSVUpload;
class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students = Student::Latest()->get();
        $users = User::where('role', 'application')->get();
        return view('admin.student.index', compact('students', 'users'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        $levels = HighestLevelEducation::all();
        $gradings = GradingScheme::all();
        $data = compact('countries', 'cities', 'states', 'levels', 'gradings');
        return view('admin.student.add')->with($data);
    }
    
    public function leadstudent(Request $request, $id)
    {
        
        $students = Student::where('lead_status',$id)->get();
        $student = Student::where('lead_status',$id)->first();
        $leadStatus = LeadStatus::all();
        $users = User::where('role', 'application')->get();
        return view('admin.student.leadstudent', compact('students', 'student','leadStatus','users'));
    }
    
    
    public function changeStatus(Request $request, $id,$status)
    {
        $statusupdate = Student::where('id', $id)->first();
        $student_password = StudentPassword::where('user_id', $statusupdate->user_id)->first();
        
        if(!empty($student_password)){
           $pass= $student_password->student_password;
        }else{
            $pass='';
        }
        
        Student::where('id', $id)->update(['status'=>$status]);
       
        if($status =1){
            $checkstatus='Approved';
        }else{
            $checkstatus='Disapprove';
        }

        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'Student is registered';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Student';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();


        /* ===mail to admin===*/
        $mailData = [
          'title' => 'Student Status '.$checkstatus.'',
          'body' => 'Hello University Bureau Team….!!!
          One Student ('.$statusupdate->first_name. ' '.$statusupdate->last_name.') has been '.$checkstatus.' by admin. Thanks',
          ];
       // Mail::to('salman.u360@gmail.com')->send(new studentmail($mailData));
         Mail::to('support@universitybureau.com')->send(new studentmail($mailData));
       /* ===mail to admin=== end*/
       
       /* ===mail to student===*/
       
       if($status ==1){
           
        $mailData = [
          'title' => 'congratulations ..!! your application status has been approved below is your login credentials and click below link to login application',
          'body' => '
          Email: '.$statusupdate->email.'
          Password: '.$pass.'</p>
          URL: https://admissionfx.com/login
          Thanks
          ',
          ];
        Mail::to($statusupdate->email)->send(new studentmail($mailData));
       }else{
           
           $mailData = [
          'title' => 'Sorry ..!! your application status has been rejected please contact support team for further procedure',
          'body' => 'Thanks',
          ];
        Mail::to($statusupdate->email)->send(new studentmail($mailData));
       }
       /* ===mail to student=== end*/
       
       Session::flash('success_message', 'Student has been successfully '.$checkstatus);
        
        return redirect()->back();
    }

    public function store(Request $request)
    {
       
       //echo '<pre>';print_r($_POST);die;
        
       
        $validateData = $request->validate([
            'passport_number' => 'required|unique:students',
            'passport_expiry_date' => 'required',
            'first_name' => 'required',
            
            'last_name' => 'required',
            'birth_date' => 'required',
            'first_language' => 'required',
            'country_citizenship' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postal_zip' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'emergency_contact_name' => 'nullable',
            'emergency_contact_relation' => 'nullable',
            'emergency_contact_email' => 'nullable',
            'emergency_contact_phone' => 'nullable',
            'country_edu' => 'required',
            'high_level_edu' => 'required',
            'grading_scheme' => 'required',
            // 'country_institute' => 'required',
            // 'institute_name' => 'required',
            // 'level_education' => 'required',
            // 'lan_institute' => 'required',
            // 'institute_from' => 'required',
            // 'institute_to' => 'required',
            // 'degree_name' => 'required',
            // 'graduation_date' => 'required',
            // 'institute_confirmation' => 'required',
            // 'physical_certificate' => 'required',
            'intake' => 'required',
            'visa_country_refusal' => 'nullable',
            'visa_country_refusal_detail' => 'nullable',
            'passport' => 'nullable',
            'ielts' => 'nullable',
            'grade_10' => 'nullable',
            'grade_12' => 'nullable',
            'bachelor_mark_sheet' => 'nullable',
            'bachelor_certificate' => 'nullable',
            'master_mark_sheet' => 'nullable',
            'master_certificate' => 'nullable',
            'lors' => 'nullable',
            'resume' => 'nullable',
            'work_experience' => 'nullable',
            'moi' => 'nullable',
            'personal_statement' => 'nullable',
            'diploma_mark_sheet' => 'nullable',
            'diploma_certificate' => 'nullable',
            'other_certificate' => 'nullable',
            'status' => 'nullable',
        ]);


        $student = new Student();
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->birth_date = $request->birth_date;
        $student->first_language = $request->first_language;
        $student->country_citizenship = $request->country_citizenship;
        $student->passport_number = $request->passport_number;
        $student->passport_expiry_date = $request->passport_expiry_date;
        $student->marital_status = $request->marital_status;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->country = $request->country;
        $student->postal_zip = $request->postal_zip;
        $student->email = $request->email;
        $student->contact_no = $request->contact_no;
        $student->emergency_contact_name = $request->emergency_contact_name;
        $student->emergency_contact_relation = $request->emergency_contact_relation;
        $student->emergency_contact_email = $request->emergency_contact_email;
        $student->emergency_contact_phone = $request->emergency_contact_phone;
        
        // $student->country_edu = $request->country_edu;
        // $student->high_level_edu = $request->high_level_edu;
        // $student->grading_scheme = $request->grading_scheme;
        
        $student->country_edu = implode(',', $request->country_edu);
        $student->high_level_edu = implode(',', $request->high_level_edu);
        $student->grading_scheme = implode(',', $request->grading_scheme);
        
        $student->country_institute = $request->country_institute;
        $student->institute_name = $request->institute_name;
        $student->level_education = $request->level_education;
        $student->lan_institute = $request->lan_institute;
        $student->institute_from = $request->institute_from;
        $student->institute_to = $request->institute_to;
        $student->degree_name = $request->degree_name;
        $student->graduation_date = $request->graduation_date;
        $student->institute_confirmation = $request->institute_confirmation;
        $student->physical_certificate = $request->physical_certificate;
        $student->visa_country_refusal = $request->visa_country_refusal;
        $student->visa_country_refusal_detail = $request->visa_country_refusal_detail;

        $student->intake = $request->intake;

        $random = Str::random(4);
        $currentDate = Carbon::now()->toDateString();

        $student->created_by = Auth()->user()->id;
        $student->created_by_name = Auth()->user()->name;
        
        $images = array();
        if ($files = $request->file('passport')) {
            foreach ($files as $file) {
                $passport_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $passportPath = 'uploads/student/passport/';
                $file->move($passportPath, $passport_file);
                $images[] = $passport_file;
            }
            $student->passport = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('ielts')) {
            foreach ($files as $file) {
                $ielts_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $ieltsPath = 'uploads/student/ielts/';
                $file->move($ieltsPath, $ielts_file);
                $images[] = $ielts_file;
            }
            $student->ielts = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('grade_10')) {
            foreach ($files as $file) {
                $grade_10_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $grade_10Path = 'uploads/student/grade_10/';
                $file->move($grade_10Path, $grade_10_file);
                $images[] = $grade_10_file;
            }
            $student->grade_10 = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('grade_12')) {
            foreach ($files as $file) {
                $grade_12_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $grade_12Path = 'uploads/student/grade_12/';
                $file->move($grade_12Path, $grade_12_file);
              $images[] = $grade_12_file;
            }
            $student->grade_12 = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('bachelor_mark_sheet')) {
            foreach ($files as $file) {
                $bachelor_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $bachelor_mark_sheetPath = 'uploads/student/bachelor_mark_sheet/';
                $file->move($bachelor_mark_sheetPath, $bachelor_mark_sheet_file);
               $images[] = $bachelor_mark_sheet_file;
            }
            $student->bachelor_mark_sheet = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('bachelor_certificate')) {
            foreach ($files as $file) {
                $bachelor_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $bachelor_certificatePath = 'uploads/student/bachelor_certificate/';
                $file->move($bachelor_certificatePath, $bachelor_certificate_file);
                $images[] = $bachelor_certificate_file;
            }
            $student->bachelor_certificate = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('master_mark_sheet')) {
            foreach ($files as $file) {
                $master_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $master_mark_sheetPath = 'uploads/student/master_mark_sheet/';
                $file->move($master_mark_sheetPath, $master_mark_sheet_file);
                $images[] = $master_mark_sheet_file;
            }
            $student->master_mark_sheet = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('master_certificate')) {
            foreach ($files as $file) {
                $master_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $master_certificatePath = 'uploads/student/master_certificate/';
                $file->move($master_certificatePath, $master_certificate_file);
                $images[] = $master_certificate_file;
            }
            $student->master_certificate = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('lors')) {
            foreach ($files as $file) {
                $lors_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $lorsPath = 'uploads/student/lors/';
                $file->move($lorsPath, $lors_file);
                $images[] = $lors_file;
            }
            $student->lors = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('resume')) {
            foreach ($files as $file) {
                $resume_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $resumePath = 'uploads/student/resume/';
                $file->move($resumePath, $resume_file);
                $images[] = $resume_file;
            }
            $student->resume = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('work_experience')) {
            foreach ($files as $file) {
                $work_experience_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $work_experiencePath = 'uploads/student/work_experience/';
                $file->move($work_experiencePath, $work_experience_file);
                $images[] = $work_experience_file;
            }
            $student->work_experience = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('moi')) {
            foreach ($files as $file) {
                $moi_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $moiPath = 'uploads/student/moi/';
                $file->move($moiPath, $moi_file);
                $images[] = $moi_file;
            }
            $student->moi = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('personal_statement')) {
            foreach ($files as $file) {
                $personal_statement_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $personal_statementPath = 'uploads/student/personal_statement/';
                $file->move($personal_statementPath, $personal_statement_file);
                $images[] = $personal_statement_file;
            }
            $student->personal_statement = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('diploma_mark_sheet')) {
            foreach ($files as $file) {
                $diploma_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $diploma_mark_sheetPath = 'uploads/student/diploma_mark_sheet/';
                $file->move($diploma_mark_sheetPath, $diploma_mark_sheet_file);
                $images[] = $diploma_mark_sheet_file;
            }
            $student->diploma_mark_sheet = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('diploma_certificate')) {
            foreach ($files as $file) {
                $diploma_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $diploma_certificatePath = 'uploads/student/diploma_certificate/';
                $file->move($diploma_certificatePath, $diploma_certificate_file);
                $images[] = $diploma_certificate_file;
            }
            $student->diploma_certificate = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('other_certificate')) {
            foreach ($files as $file) {
                $other_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $other_certificatePath = 'uploads/student/other_certificate/';
                $file->move($other_certificatePath, $other_certificate_file);
                $images[] = $other_certificate_file;
            }
            $student->other_certificate = implode(",", $images);
        }

        $student->save();

        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'Student is registered';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Student';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $student->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();
    
        //multiple education history 
        $countryEdus = $request->input('country_edu');
        $highLevelEdus = $request->input('high_level_edu');
        $gradingSchemes = $request->input('grading_scheme');
         foreach ($countryEdus as $key => $value) {
            $studentEductionHistory = new StudentEductionHistory();
            $studentEductionHistory->student_id = $student->id;
            $studentEductionHistory->country_education = $value;
            $studentEductionHistory->highest_level_edu = $highLevelEdus[$key];
            $studentEductionHistory->grading_scheme = $gradingSchemes[$key];
            $studentEductionHistory->created_by = auth()->user()->id;
            $studentEductionHistory->save();
        }
        
        
        // end of multiple
        $randomPassword = Str::random(10);

        $studentsUser = new User();
        $studentsUser->name = $request->email;
        $studentsUser->email = $request->email;
        $studentsUser->role = 'student';
        $studentsUser->password = $randomPassword;

        $studentsUser->save();

        $student->user_id = $studentsUser->id;
        $student->save();

        $studentpassword = new StudentPassword();

        $studentpassword->user_id = $studentsUser->id;
        $studentpassword->student_password = $randomPassword;

        $studentpassword->save();

        Session::flash('success_message', 'Student has been successfully added');
        return redirect()->route('student.index');
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ]);
        $student = Student::find($id);
        $student->password = Hash::make($request->newPassword);
        $student->update();

        $user = User::where('email', $student->email)->update([
            'password' => $student->password
        ]);

        Session::flash('success_message', 'Password has been successfully Change');
        return redirect()->route('student.index');
    }

    public function show(Student $student)
    {
        abort(503);
    }


    public function edit($id)
    {
        $student = Student::find($id);
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        $levels = HighestLevelEducation::all();
        $gradings = GradingScheme::all();
        $StudentEductionHistoryview = StudentEductionHistory::where('student_id', $id)->get();
        $data = compact('student', 'countries', 'cities', 'states', 'levels', 'gradings','StudentEductionHistoryview');
        return view('admin.student.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'passport_number' => ['required', Rule::unique('students')->ignore($request->passport_number, 'passport_number')],
            'passport_expiry_date' => 'required',
            'first_name' => 'required',
            
            'last_name' => 'required',
            'birth_date' => 'required',
            'first_language' => 'required',
            'country_citizenship' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postal_zip' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'emergency_contact_name' => 'nullable',
            'emergency_contact_relation' => 'nullable',
            'emergency_contact_email' => 'nullable',
            'emergency_contact_phone' => 'nullable',
            'country_edu' => 'required',
            'high_level_edu' => 'required',
            'grading_scheme' => 'required',
            // 'country_institute' => 'required',
            // 'institute_name' => 'required',
            // 'level_education' => 'required',
            // 'lan_institute' => 'required',
            // 'institute_from' => 'required',
            // 'institute_to' => 'required',
            // 'degree_name' => 'required',
            // 'graduation_date' => 'required',
            // 'institute_confirmation' => 'required',
            // 'physical_certificate' => 'required',
            'visa_country_refusal' => 'nullable',
            'visa_country_refusal_detail' => 'nullable',
            'passport' => 'nullable',
            'ielts' => 'nullable',
            'grade_10' => 'nullable',
            'grade_12' => 'nullable',
            'bachelor_mark_sheet' => 'nullable',
            'bachelor_certificate' => 'nullable',
            'master_mark_sheet' => 'nullable',
            'master_certificate' => 'nullable',
            'lors' => 'nullable',
            'resume' => 'nullable',
            'work_experience' => 'nullable',
            'moi' => 'nullable',
            'personal_statement' => 'nullable',
            'diploma_mark_sheet' => 'nullable',
            'diploma_certificate' => 'nullable',
            'other_certificate' => 'nullable',
            'status' => 'nullable',
        ]);
    
        $deleleeducation = $request->input('deleleeducation');
        foreach ($deleleeducation as $key => $deleleeducationvalue) {
            $studentecuationdelete = StudentEductionHistory::find($key);
            $studentecuationdelete->delete();
        }
    

        $student = Student::find($id);
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->birth_date = $request->birth_date;
        $student->lead_status = $request->lead_status;
        $student->first_language = $request->first_language;
        $student->country_citizenship = $request->country_citizenship;
        $student->passport_number = $request->passport_number;
        $student->passport_expiry_date = $request->passport_expiry_date;
        $student->marital_status = $request->marital_status;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->country = $request->country;
        $student->postal_zip = $request->postal_zip;
        $student->email = $request->email;
        $student->contact_no = $request->contact_no;
        $student->emergency_contact_name = $request->emergency_contact_name;
        $student->emergency_contact_relation = $request->emergency_contact_relation;
        $student->emergency_contact_email = $request->emergency_contact_email;
        $student->emergency_contact_phone = $request->emergency_contact_phone;
        
        // $student->country_edu = $request->country_edu;
        // $student->high_level_edu = $request->high_level_edu;
        // $student->grading_scheme = $request->grading_scheme;
        
         $student->country_edu = implode(',', $request->country_edu);
        $student->high_level_edu = implode(',', $request->high_level_edu);
        $student->grading_scheme = implode(',', $request->grading_scheme);
        
        $student->country_institute = $request->country_institute;
        $student->institute_name = $request->institute_name;
        $student->level_education = $request->level_education;
        $student->lan_institute = $request->lan_institute;
        $student->institute_from = $request->institute_from;
        $student->institute_to = $request->institute_to;
        $student->degree_name = $request->degree_name;
        $student->graduation_date = $request->graduation_date;
        $student->institute_confirmation = $request->institute_confirmation;
        $student->physical_certificate = $request->physical_certificate;
        $student->visa_country_refusal = $request->visa_country_refusal;
        $student->visa_country_refusal_detail = $request->visa_country_refusal_detail;

        $student->intake = $request->intake;

        $random = Str::random(4);
        $currentDate = Carbon::now()->toDateString();

        $student->created_by = Auth()->user()->id;
        $student->created_by_name = Auth()->user()->name;

        $images = array();
        if ($files = $request->file('passport')) {
                if (File::exists('uploads/student/passport/' . $student->passport)) {
                    File::delete('uploads/student/passport/' . $student->passport);
                }
            foreach ($files as $file) {
                $passport_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $passportPath = 'uploads/student/passport/';
                $file->move($passportPath, $passport_file);
                $images[] = $passport_file;
            }
            $student->passport = implode(",", $images);
        }

        $random = Str::random(10);
        $images = array();
        if ($files = $request->file('ielts')) {
                if (File::exists('uploads/student/ielts/' . $student->ielts)) {
                    File::delete('uploads/student/ielts/' . $student->ielts);
                }
            foreach ($files as $file) {
                $ielts_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $ieltsPath = 'uploads/student/ielts/';
                $file->move($ieltsPath, $ielts_file);
                $images[] = $ielts_file;
            }
            $student->ielts = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('grade_10')) {
                if (File::exists('uploads/student/grade_10/' . $student->grade_10)) {
                    File::delete('uploads/student/grade_10/' . $student->grade_10);
                }
            foreach ($files as $file) {
                $grade_10_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $grade_10Path = 'uploads/student/grade_10/';
                $file->move($grade_10Path, $grade_10_file);
                $images[] = $grade_10_file;
            }
            $student->grade_10 = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('grade_12')) {
                if (File::exists('uploads/student/grade_12/' . $student->grade_12)) {
                    File::delete('uploads/student/grade_12/' . $student->grade_12);
                }
            foreach ($files as $file) {
                $grade_12_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $grade_12Path = 'uploads/student/grade_12/';
                $file->move($grade_12Path, $grade_12_file);
                $images[] = $grade_12_file;
            }
            $student->grade_12 = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('bachelor_mark_sheet')) {
                if (File::exists('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet)) {
                    File::delete('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet);
                }
            foreach ($files as $file) {
                $bachelor_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $bachelor_mark_sheetPath = 'uploads/student/bachelor_mark_sheet/';
                $file->move($bachelor_mark_sheetPath, $bachelor_mark_sheet_file);
                $images[] = $bachelor_mark_sheet_file;
            }
            $student->bachelor_mark_sheet = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('bachelor_certificate')) {
                if (File::exists('uploads/student/bachelor_certificate/' . $student->bachelor_certificate)) {
                    File::delete('uploads/student/bachelor_certificate/' . $student->bachelor_certificate);
                }
            foreach ($files as $file) {
                $bachelor_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $bachelor_certificatePath = 'uploads/student/bachelor_certificate/';
                $file->move($bachelor_certificatePath, $bachelor_certificate_file);
                $images[] = $bachelor_certificate_file;
            }
            $student->bachelor_certificate = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('master_mark_sheet')) {
                if (File::exists('uploads/student/master_mark_sheet/' . $student->master_mark_sheet)) {
                    File::delete('uploads/student/master_mark_sheet/' . $student->master_mark_sheet);
                }
            foreach ($files as $file) {
                $master_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $master_mark_sheetPath = 'uploads/student/master_mark_sheet/';
                $file->move($master_mark_sheetPath, $master_mark_sheet_file);
                $images[] = $master_mark_sheet_file;
            }
            $student->master_mark_sheet = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('master_certificate')) {
                if (File::exists('uploads/student/master_certificate/' . $student->master_certificate)) {
                    File::delete('uploads/student/master_certificate/' . $student->master_certificate);
                }
            foreach ($files as $file) {
                $master_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $master_certificatePath = 'uploads/student/master_certificate/';
                $file->move($master_certificatePath, $master_certificate_file);
                $images[] = $master_certificate_file;
            }
            $student->master_certificate = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('lors')) {
                if (File::exists('uploads/student/lors/' . $student->lors)) {
                    File::delete('uploads/student/lors/' . $student->lors);
                }
            foreach ($files as $file) {
                $lors_file = $currentDate . '-' . $random . uniqid() . '.' . $files->getClientOriginalName();
                $lorsPath = 'uploads/student/lors/';
                $files->move($lorsPath, $lors_file);
                $images[] = $lors_file;
            }
            $student->lors = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('resume')) {
                if (File::exists('uploads/student/resume/' . $student->resume)) {
                    File::delete('uploads/student/resume/' . $student->resume);
                }
            foreach ($files as $file) {
                $resume_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $resumePath = 'uploads/student/resume/';
                $file->move($resumePath, $resume_file);
                $images[] = $resume_file;
            }
            $student->resume = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('work_experience')) {
            if (File::exists('uploads/student/work_experience/' . $student->work_experience)) {
                File::delete('uploads/student/work_experience/' . $student->work_experience);
            }
            foreach ($files as $file) {
                $work_experience_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $work_experiencePath = 'uploads/student/work_experience/';
                $file->move($work_experiencePath, $work_experience_file);
                $images[] = $work_experience_file;
            }
            $student->work_experience = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('moi')) {
                if (File::exists('uploads/student/moi/' . $student->moi)) {
                    File::delete('uploads/student/moi/' . $student->moi);
                }
                foreach ($files as $file) {
                $moi_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $moiPath = 'uploads/student/moi/';
                $file->move($moiPath, $moi_file);
                $images[] = $moi_file;
            }
            $student->moi = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('personal_statement')) {
                if (File::exists('uploads/student/personal_statement/' . $student->personal_statement)) {
                    File::delete('uploads/student/personal_statement/' . $student->personal_statement);
                }
                foreach ($files as $file) {
                $personal_statement_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $personal_statementPath = 'uploads/student/personal_statement/';
                $file->move($personal_statementPath, $personal_statement_file);
                $images[] = $personal_statement_file;
            }
            $student->personal_statement = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('diploma_mark_sheet')) {
                if (File::exists('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet)) {
                    File::delete('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet);
                }
                foreach ($files as $file) {
                $diploma_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $diploma_mark_sheetPath = 'uploads/student/diploma_mark_sheet/';
                $file->move($diploma_mark_sheetPath, $diploma_mark_sheet_file);
                $images[] = $diploma_mark_sheet_file;
            }
            $student->diploma_mark_sheet = implode(",", $images);
        }

        $images = array();
        if ($files = $request->file('diploma_certificate')) {
                if (File::exists('uploads/student/diploma_certificate/' . $student->diploma_certificate)) {
                    File::delete('uploads/student/diploma_certificate/' . $student->diploma_certificate);
                }
                foreach ($files as $file) {
                $diploma_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $diploma_certificatePath = 'uploads/student/diploma_certificate/';
                $file->move($diploma_certificatePath, $diploma_certificate_file);
                $images[] = $diploma_certificate_file;
            }
            $student->diploma_certificate = implode(",", $images);
        }
        $images = array();
        if ($files = $request->file('other_certificate')) {
            if (File::exists('uploads/student/other_certificate/' . $student->other_certificate)) {
                File::delete('uploads/student/other_certificate/' . $student->other_certificate);
            }
            foreach ($files as $file) {
                $other_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $file->getClientOriginalName();
                $other_certificatePath = 'uploads/student/other_certificate/';
                $file->move($other_certificatePath, $other_certificate_file);
                $images[] = $other_certificate_file;
            }
            $student->other_certificate = implode(",", $images);
        }

        $student->update();

        $notification =  new Notification();
        $notification->type ='Update';
        $notification->data = 'Student is updated';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Student';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $student->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();

        $countryEdus = $request->input('country_edu');
        $highLevelEdus = $request->input('high_level_edu');
        $gradingSchemes = $request->input('grading_scheme');
         foreach ($countryEdus as $key => $value) {
            $studentEductionHistory = new StudentEductionHistory();
            $studentEductionHistory->student_id = $student->id;
            $studentEductionHistory->country_education = $value;
            $studentEductionHistory->highest_level_edu = $highLevelEdus[$key];
            $studentEductionHistory->grading_scheme = $gradingSchemes[$key];
            $studentEductionHistory->created_by = auth()->user()->id;
            $studentEductionHistory->save();
        }
        Session::flash('success_message', 'Student has been successfully updated');
        return redirect()->route('student.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (File::exists('uploads/student/passport/' . $student->passport)) {
            File::delete('uploads/student/passport/' . $student->passport);
        }
        if (File::exists('uploads/student/ielts/' . $student->ielts)) {
            File::delete('uploads/student/ielts/' . $student->ielts);
        }
        if (File::exists('uploads/student/grade_10/' . $student->grade_10)) {
            File::delete('uploads/student/grade_10/' . $student->grade_10);
        }
        if (File::exists('uploads/student/grade_12/' . $student->grade_12)) {
            File::delete('uploads/student/grade_12/' . $student->grade_12);
        }
        if (File::exists('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet)) {
            File::delete('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet);
        }
        if (File::exists('uploads/student/bachelor_certificate/' . $student->bachelor_certificate)) {
            File::delete('uploads/student/bachelor_certificate/' . $student->bachelor_certificate);
        }
        if (File::exists('uploads/student/master_mark_sheet/' . $student->master_mark_sheet)) {
            File::delete('uploads/student/master_mark_sheet/' . $student->master_mark_sheet);
        }
        if (File::exists('uploads/student/master_certificate/' . $student->master_certificate)) {
            File::delete('uploads/student/master_certificate/' . $student->master_certificate);
        }
        if (File::exists('uploads/student/master_certificate/' . $student->master_certificate)) {
            File::delete('uploads/student/master_certificate/' . $student->master_certificate);
        }
        if (File::exists('uploads/student/lors/' . $student->lors)) {
            File::delete('uploads/student/lors/' . $student->lors);
        }
        if (File::exists('uploads/student/resume/' . $student->resume)) {
            File::delete('uploads/student/resume/' . $student->resume);
        }
        if (File::exists('uploads/student/work_experience/' . $student->work_experience)) {
            File::delete('uploads/student/work_experience/' . $student->work_experience);
        }

        if (File::exists('uploads/student/moi/' . $student->moi)) {
            File::delete('uploads/student/moi/' . $student->moi);
        }
        if (File::exists('uploads/student/personal_statement/' . $student->personal_statement)) {
            File::delete('uploads/student/personal_statement/' . $student->personal_statement);
        }

        if (File::exists('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet)) {
            File::delete('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet);
        }

        if (File::exists('uploads/student/diploma_certificate/' . $student->diploma_certificate)) {
            File::delete('uploads/student/diploma_certificate/' . $student->diploma_certificate);
        }

        if (File::exists('uploads/student/other_certificate/' . $student->other_certificate)) {
            File::delete('uploads/student/other_certificate/' . $student->other_certificate);
        }

        $student->delete();
    }

    public function getDetail($id)
    {
        $student = Student::find($id);
        $StudentEductionHistoryview = StudentEductionHistory::where('student_id', $id)->get();
        // echo '<pre>';print_r($StudentEductionHistoryview);die;
        return view('admin.student.view', compact('student','StudentEductionHistoryview'));
        //return view('admin.student.modal.studentDetailModal', compact('student'));
    }

    public function getDocument($id)
    {
        $student = Student::find($id);

        return view('admin.student.modal.studentDocumentModal', compact('student'));
    }



    public function downloadFile($file, $type)
    {
        $file_path = public_path('uploads/student/' . $type . '/' . $file);
        return response()->download($file_path);
    }


    public function applicationTeam(Request $request, $id)
    {
        
        $request->validate([
            'team_assign' => 'required'
        ]);
        $team = Student::find($id);
        $explode = explode(":", $request->team_assign);
        $user = User::where('id', $explode[0])->first();
        $team->application_team = $explode[0];
        $team->application_team_name = $explode[1];
        $team->update();
        /* ===mail to admin===*/
        $mailData = [
          'title' => 'Student '.$team->first_name.' '.$team->last_name .' Assign to Application team ('.$explode[1].')',
          'body' => 'Hello University Bureau Team….!!!
          One Student ('.$team->first_name. ' '.$team->last_name.') has been assign to application team ('.$explode[1].') by admin. Thanks',
          ];
        //Mail::to('salman.u360@gmail.com')->send(new studentmail($mailData));
        Mail::to('support@universitybureau.com')->send(new studentmail($mailData));
       /*mail to student*/
        $mailData = [
          'title' => 'Hello '.$team->first_name.' '.$team->last_name .' you have been Assign to Application team ('.$explode[1].')',
          'body' => 'Thanks',
          ];
        Mail::to($team->email)->send(new studentmail($mailData));
        /*mail to application team*/
        $mailData = [
          'title' => 'Hello '.$explode[1] .' one student ('.$team->first_name.' '.$team->last_name .') has been Assign to you',
          'body' => 'Thanks',
          ];
        Mail::to($user->email)->send(new studentmail($mailData));
        Session::flash('success_message', 'Student assign to Application Team Successfully');
        
        return redirect()->route('student.index');
    }
    
    public function uploadexcel(Request $request)
    {
        return view('admin.student.uploadexcel');
    }
    
    public function uploadexcelcsv(Request $request)
    {
        
        $path= app_path();
        $filename= $path.'/student.csv';
        $row = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
                while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
                    //   echo '<pre>';print_r($data);continue;
                    $num = 4;
                    $row++;
                   if($row != 2 && $row < 2473)
                    { 
                    //  echo '<pre>';print_r($data);continue;
                        $student  = new Student();

                        $student->first_name = trim($data[0]);
                        $student->middle_name = trim($data[1]);
                        $student->last_name = trim($data[2]);
                        $student->birth_date = trim($data[3]);
                        $student->first_language = trim($data[4]);
                        $student->country_citizenship = trim($data[5]);
                        $student->passport_number = trim($data[6]);
                        $student->passport_expiry_date = trim($data[7]);
                        $student->marital_status = trim($data[8]);
                        $student->gender = trim($data[9]);
                        $student->address = trim($data[10]);
                        $student->city = trim($data[11]);
                        $student->state = trim($data[12]);
                        $student->country = trim($data[13]);
                        $student->postal_zip = trim($data[14]);
                        $student->email = trim($data[15]);
                        $student->contact_no = trim($data[16]);
                        $student->emergency_contact_name = trim($data[17]);
                        $student->emergency_contact_relation = trim($data[18]);
                        $student->emergency_contact_email = trim($data[19]);
                        $student->emergency_contact_phone = trim($data[20]);
                        $student->country_edu = trim($data[21]);
                        $student->high_level_edu = trim($data[22]);
                        $student->grading_scheme = trim($data[23]);
                        $student->country_institute = trim($data[24]);
                        $student->institute_name = trim($data[25]);
                        $student->level_education = trim($data[26]);
                        $student->lan_institute = trim($data[27]);
                        $student->institute_from = trim($data[28]);
                        $student->institute_to = trim($data[29]);
                        $student->degree_name = trim($data[30]);
                        $student->graduation_date = trim($data[31]);
                        $student->institute_confirmation = trim($data[32]);
                        $student->physical_certificate = trim($data[33]);
                        $student->visa_country_refusal = trim($data[34]);
                        $student->visa_country_refusal_detail = trim($data[35]);
                        $student->intake = trim($data[36]);
                       $student->password = Hash::make(trim($data[37]));
                        $student->created_by = Auth()->user()->id;
                        $student->created_by_name = Auth()->user()->name;

                        $studentsUser = new User();
                        $studentsUser->name = trim($data[15]);
                        $studentsUser->email = trim($data[15]);
                        $studentsUser->role = 'student';
                        $studentsUser->password = trim($data[37]);
                        $studentsUser->save();
                
                        $student->user_id = $studentsUser->id;

                        $student->save();
                
                        $studentpassword = new StudentPassword();
                
                        $studentpassword->user_id = $studentsUser->id;
                        $studentpassword->student_password = trim($data[37]);
    
                        $studentpassword->save();
        
                    }
    
                }
                
                while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
                        //   echo '<pre>';print_r($data);continue;
                        $num = 4;
                        $row++;
                       if($row != 2 && $row < 2473)
                        { 
                    $countryEdus = explode(',', $row[21]);
                            $highLevelEdus = explode(',', $row[22]);
                            $gradingSchemes = explode(',', $row[23]);
            
                        foreach ($countryEdus as $key => $value) {
                            $studentEductionHistory = new StudentEductionHistory();
                            $studentEductionHistory->student_id = $student->id;
                            $studentEductionHistory->country_education = $value;
                            $studentEductionHistory->highest_level_edu = $highLevelEdus[$key];
                            $studentEductionHistory->grading_scheme = $gradingSchemes[$key];
                            $studentEductionHistory->created_by = auth()->user()->id;
                            $studentEductionHistory->save();
                    
                        }
                    }
                }
                
                $csvSave = new CSVUpload();
                if($request->hasFile('excel_student')){
                    $file = $request->file('excel_student');
                    $fileName = 'student' . rand(99,1000) . '-file.' . $file->getClientOriginalExtension();
                    $csvSave->file = $request->file('excel_student')->move('uploads/CSVFiles/', $fileName);
                    if($csvSave->file){
                        $csvSave->delete('uploads/CSVFiles/', $csvSave->photo);
                    }
                }
                $csvSave->created_by = auth()->user()->id;
                $csvSave->created_name = auth()->user()->name;
                $csvSave->save();
                
                Session::flash('success_message', 'Student has been successfully added');
                        return redirect()->route('student.index');
            }
        }
}

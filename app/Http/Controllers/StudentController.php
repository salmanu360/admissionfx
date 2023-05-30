<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\GradingScheme;
use App\Models\HighestLevelEducation;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\demoMail;
use App\Mail\studentmail;
class StudentController extends Controller
{
    public function index(){
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        $levels = HighestLevelEducation::all();
        $gradings = GradingScheme::all();
        $data = compact('countries', 'cities', 'states', 'levels', 'gradings');
        return view('frontend.student.addStudents')->with($data);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'passport_number' => 'required|unique:students',
            'passport_expiry_date' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
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
            'country_institute' => 'required',
            'institute_name' => 'required',
            'level_education' => 'required',
            'lan_institute' => 'required',
            'institute_from' => 'required',
            'institute_to' => 'required',
            'degree_name' => 'required',
            'graduation_date' => 'required',
            'institute_confirmation' => 'required',
            'physical_certificate' => 'required',
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
        $student->country_edu = $request->country_edu;
        $student->high_level_edu = $request->high_level_edu;
        $student->grading_scheme = $request->grading_scheme;
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
        if(Auth()->user() == "")
        {
            $student->created_by = $student->id;
            $student->created_by_name = $student->first_name;
        }
        else
        {
            $student->created_by = Auth()->user()->id;
            $student->created_by_name = Auth()->user()->name;
        }

        if ($request->hasFile('passport')) {
            $passport_image = $request->file('passport');
            if ($passport_image->isValid()) {
                $passport_file = $currentDate . '-' . $random . uniqid() . '.' . $passport_image->getClientOriginalName();
                $passportPath = 'uploads/student/passport/';
                $passport_image->move($passportPath, $passport_file);
                $student->passport = $passport_file;
            }
        }

        if ($request->hasFile('ielts')) {
            $ielts_image = $request->file('ielts');
            if ($ielts_image->isValid()) {
                $ielts_file = $currentDate . '-' . $random . uniqid() . '.' . $ielts_image->getClientOriginalName();
                $ieltsPath = 'uploads/student/ielts/';
                $ielts_image->move($ieltsPath, $ielts_file);
                $student->ielts = $ielts_file;
            }
        }

        if ($request->hasFile('grade_10')) {
            $grade_10_image = $request->file('grade_10');
            if ($grade_10_image->isValid()) {
                $grade_10_file = $currentDate . '-' . $random . uniqid() . '.' . $grade_10_image->getClientOriginalName();
                $grade_10Path = 'uploads/student/grade_10/';
                $grade_10_image->move($grade_10Path, $grade_10_file);
                $student->grade_10 = $grade_10_file;
            }
        }

        if ($request->hasFile('grade_12')) {
            $grade_12_image = $request->file('grade_12');
            if ($grade_12_image->isValid()) {
                $grade_12_file = $currentDate . '-' . $random . uniqid() . '.' . $grade_12_image->getClientOriginalName();
                $grade_12Path = 'uploads/student/grade_12/';
                $grade_12_image->move($grade_12Path, $grade_12_file);
                $student->grade_12 = $grade_12_file;
            }
        }

        if ($request->hasFile('bachelor_mark_sheet')) {
            $bachelor_mark_sheet_image = $request->file('bachelor_mark_sheet');
            if ($bachelor_mark_sheet_image->isValid()) {
                $bachelor_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $bachelor_mark_sheet_image->getClientOriginalName();
                $bachelor_mark_sheetPath = 'uploads/student/bachelor_mark_sheet/';
                $bachelor_mark_sheet_image->move($bachelor_mark_sheetPath, $bachelor_mark_sheet_file);
                $student->bachelor_mark_sheet = $bachelor_mark_sheet_file;
            }
        }

        if ($request->hasFile('bachelor_certificate')) {
            $bachelor_certificate_image = $request->file('bachelor_certificate');
            if ($bachelor_certificate_image->isValid()) {
                $bachelor_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $bachelor_certificate_image->getClientOriginalName();
                $bachelor_certificatePath = 'uploads/student/bachelor_certificate/';
                $bachelor_certificate_image->move($bachelor_certificatePath, $bachelor_certificate_file);
                $student->bachelor_certificate = $bachelor_certificate_file;
            }
        }

        if ($request->hasFile('master_mark_sheet')) {
            $master_mark_sheet_image = $request->file('master_mark_sheet');
            if ($master_mark_sheet_image->isValid()) {
                $master_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $master_mark_sheet_image->getClientOriginalName();
                $master_mark_sheetPath = 'uploads/student/master_mark_sheet/';
                $master_mark_sheet_image->move($master_mark_sheetPath, $master_mark_sheet_file);
                $student->master_mark_sheet = $master_mark_sheet_file;
            }
        }

        if ($request->hasFile('master_certificate')) {
            $master_certificate_image = $request->file('master_certificate');
            if ($master_certificate_image->isValid()) {
                $master_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $master_certificate_image->getClientOriginalName();
                $master_certificatePath = 'uploads/student/master_certificate/';
                $master_certificate_image->move($master_certificatePath, $master_certificate_file);
                $student->master_certificate = $master_certificate_file;
            }
        }

        if ($request->hasFile('lors')) {
            $lors_image = $request->file('lors');
            if ($lors_image->isValid()) {
                $lors_file = $currentDate . '-' . $random . uniqid() . '.' . $lors_image->getClientOriginalName();
                $lorsPath = 'uploads/student/lors/';
                $lors_image->move($lorsPath, $lors_file);
                $student->lors = $lors_file;
            }
        }

        if ($request->hasFile('resume')) {
            $resume_image = $request->file('resume');
            if ($resume_image->isValid()) {
                $resume_file = $currentDate . '-' . $random . uniqid() . '.' . $resume_image->getClientOriginalName();
                $resumePath = 'uploads/student/resume/';
                $resume_image->move($resumePath, $resume_file);
                $student->resume = $resume_file;
            }
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

        if ($request->hasFile('moi')) {
            $moi_image = $request->file('moi');
            if ($moi_image->isValid()) {
                $moi_file = $currentDate . '-' . $random . uniqid() . '.' . $moi_image->getClientOriginalName();
                $moiPath = 'uploads/student/moi/';
                $moi_image->move($moiPath, $moi_file);
                $student->moi = $moi_file;
            }
        }

        if ($request->hasFile('personal_statement')) {
            $personal_statement_image = $request->file('personal_statement');
            if ($personal_statement_image->isValid()) {
                $personal_statement_file = $currentDate . '-' . $random . uniqid() . '.' . $personal_statement_image->getClientOriginalName();
                $personal_statementPath = 'uploads/student/personal_statement/';
                $personal_statement_image->move($personal_statementPath, $personal_statement_file);
                $student->personal_statement = $personal_statement_file;
            }
        }

        if ($request->hasFile('diploma_mark_sheet')) {
            $diploma_mark_sheet_image = $request->file('diploma_mark_sheet');
            if ($diploma_mark_sheet_image->isValid()) {
                $diploma_mark_sheet_file = $currentDate . '-' . $random . uniqid() . '.' . $diploma_mark_sheet_image->getClientOriginalName();
                $diploma_mark_sheetPath = 'uploads/student/diploma_mark_sheet/';
                $diploma_mark_sheet_image->move($diploma_mark_sheetPath, $diploma_mark_sheet_file);
                $student->diploma_mark_sheet = $diploma_mark_sheet_file;
            }
        }

        if ($request->hasFile('diploma_certificate')) {
            $diploma_certificate_image = $request->file('diploma_certificate');
            if ($diploma_certificate_image->isValid()) {

                $diploma_certificate_file = $currentDate . '-' . $random . uniqid() . '.' . $diploma_certificate_image->getClientOriginalName();
                $diploma_certificatePath = 'uploads/student/diploma_certificate/';
                $diploma_certificate_image->move($diploma_certificatePath, $diploma_certificate_file);
                $student->diploma_certificate = $diploma_certificate_image;
            }
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
        
        /* ===mail to admin===*/
        $mailData = [
          'title' => 'New Student Registeration',
          'body' => 'Congratulations University Bureau Team….!!! <br>
          One Student ('.$student->first_name. ' '.$student->last_name.') has filled the form for becoming our partner.<br>
          Kindly review its application and in case if you accept his/her request kindly send him/her acceptance email. <br>
          And if in case an Recruiter  does not fulfil our criteria send him/her the rejection request.<br>Thanks',
          ];
          
        //Mail::to('salman.u360@gmail.com')->send(new recruitermail($mailData));
         Mail::to('support@universitybureau.com')->send(new studentmail($mailData));
       /* ===mail to admin=== end*/
       
       /* ===mail to student===*/
       
        $mailData = [
          'title' => 'New Student Registeration',
          'body' => '
          Name: '.$student->first_name.''.$student->last_name . '
          Email: '.$student->email. '
          Passport No: '.$student->passport_number. '
          Passport Expiry Date: '.$student->passport_expiry_date. '
          address: '.$student->address. '
          postal_zip: '.$student->postal_zip. '
          contact_no: '.$student->contact_no. '
          emergency_contact_name: '.$student->emergency_contact_name.'
          Thanks for registeration we will soon review your information and will send login credentials through email
          ',
          ];
        Mail::to($student->email)->send(new studentmail($mailData));
       /* ===mail to student=== end*/

        Session::flash('success_message', 'Student has been successfully added');
        return redirect()->back()->with('success','Your request has been send please check your email');
    }
}

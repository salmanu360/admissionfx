<?php

namespace App\Http\Controllers\Recruiter;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
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
use App\Notifications\Recruiter\LeadNotification;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::where('created_by', auth()->user()->id)->Latest()->get();
        $users = User::where('role','application')->get();
        return view('recruiter.student.index', compact('students', 'users'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        $levels = HighestLevelEducation::all();
        $gradings = GradingScheme::all();
        $data = compact('countries', 'cities', 'states', 'levels', 'gradings');
        return view('recruiter.student.add')->with($data);
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

        $randomPassword = Str::random(10);

        $studentsUser = new User();
        $studentsUser->name = $request->email;
        $studentsUser->email = $request->email;
        $studentsUser->role = 'student';
        $studentsUser->password = $randomPassword;

        $studentsUser->save();
        $studentsUser->action = "Add Lead";
        $admin = Admin::first();
        Notification::send($admin, new LeadNotification($studentsUser));
        
        $rm = User::where('role', 'rm')->get();
        Notification::send($rm, new LeadNotification($studentsUser));
        
        $student->user_id = $studentsUser->id;
        $student->save();

        $studentpassword = new StudentPassword();

        $studentpassword->user_id = $studentsUser->id;
        $studentpassword->student_password = $randomPassword;

        $studentpassword->save();

        Session::flash('success_message', 'Student has been successfully added');
        return redirect('/student');
    }

    public function changePassword(Request $request, $id){
        $request->validate([
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ]);
        $student = Student::find($id);
        $student->password = Hash::make( $request->newPassword);
        $student->update();

        $user = User::where('email', $student->email)->update([
            'password' => $student->password
        ]);

        Session::flash('change', 'Password has been successfully Change');
        return redirect()->route('std.index');

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
        $data = compact('countries', 'cities', 'states', 'levels', 'gradings', 'student');
        return view('recruiter.student.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'passport_number' => ['required',Rule::unique('students')->ignore($request->passport_number, 'passport_number')],
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


        $student = Student::find($id);
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
        Session::flash('success_message', 'Student has been successfully updated');
        return redirect()->route('std.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (File::exists('uploads/student/passport/'.$student->passport)){
            File::delete('uploads/student/passport/'.$student->passport);
        }
        if (File::exists('uploads/student/ielts/'.$student->ielts)){
            File::delete('uploads/student/ielts/'.$student->ielts);
        }
        if (File::exists('uploads/student/grade_10/'.$student->grade_10)){
            File::delete('uploads/student/grade_10/'.$student->grade_10);
        }
        if (File::exists('uploads/student/grade_12/'.$student->grade_12)){
            File::delete('uploads/student/grade_12/'.$student->grade_12);
        }
        if (File::exists('uploads/student/bachelor_mark_sheet/'.$student->bachelor_mark_sheet)){
            File::delete('uploads/student/bachelor_mark_sheet/'.$student->bachelor_mark_sheet);
        }
        if (File::exists('uploads/student/bachelor_certificate/'.$student->bachelor_certificate)){
            File::delete('uploads/student/bachelor_certificate/'.$student->bachelor_certificate);
        }
        if (File::exists('uploads/student/master_mark_sheet/'.$student->master_mark_sheet)){
            File::delete('uploads/student/master_mark_sheet/'.$student->master_mark_sheet);
        }
        if (File::exists('uploads/student/master_certificate/'.$student->master_certificate)){
            File::delete('uploads/student/master_certificate/'.$student->master_certificate);
        }
        if (File::exists('uploads/student/master_certificate/'.$student->master_certificate)){
            File::delete('uploads/student/master_certificate/'.$student->master_certificate);
        }
        if (File::exists('uploads/student/lors/'.$student->lors)){
            File::delete('uploads/student/lors/'.$student->lors);
        }
        if (File::exists('uploads/student/resume/'.$student->resume)){
            File::delete('uploads/student/resume/'.$student->resume);
        }
        if (File::exists('uploads/student/work_experience/'.$student->work_experience)){
            File::delete('uploads/student/work_experience/'.$student->work_experience);
        }

        if (File::exists('uploads/student/moi/'.$student->moi)){
            File::delete('uploads/student/moi/'.$student->moi);
        }
        if (File::exists('uploads/student/personal_statement/'.$student->personal_statement)){
            File::delete('uploads/student/personal_statement/'.$student->personal_statement);
        }

        if (File::exists('uploads/student/diploma_mark_sheet/'.$student->diploma_mark_sheet)){
            File::delete('uploads/student/diploma_mark_sheet/'.$student->diploma_mark_sheet);
        }

        if (File::exists('uploads/student/diploma_certificate/'.$student->diploma_certificate)){
            File::delete('uploads/student/diploma_certificate/'.$student->diploma_certificate);
        }

        if (File::exists('uploads/student/other_certificate/'.$student->other_certificate)){
            File::delete('uploads/student/other_certificate/'.$student->other_certificate);
        }

        $student->delete();
    }

    public function getDetail($id)
    {
        $student = Student::find($id);
        return view('recruiter.student.view', compact('student'));
        //return view('recruiter.student.modal.studentDetailModal', compact('student'));
    }

    public function getDocument($id)
    {
        $student = Student::find($id);

        return view('recruiter.student.modal.studentDocumentModal', compact('student'));
    }



    public function downloadFile($file, $type)
    {
        $file_path = public_path('uploads/student/'.$type.'/'.$file);
        return response()->download( $file_path);
    }


    public function applicationTeam(Request $request, $id){
        $request->validate([
            'team_assign' => 'required'
        ]);
        $team = Student::find($id);
        $explode = explode(":", $request->team_assign); 
        $team->application_team = $explode[0];
        $team->application_team_name = $explode[1];
        $team->update();
        return redirect()->route('std.index')->with('assign', 'lable assign to Application Team Successfully');
    }

}

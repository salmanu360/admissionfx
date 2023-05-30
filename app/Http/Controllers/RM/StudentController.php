<?php

namespace App\Http\Controllers\RM;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\CSVUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentPassword;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\RM\LeadAssignNotification;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students = Student::Latest()->get();
        $users = User::where('role','application')->get();
        return view('rmanager.student.index', compact('students', 'users'));
    }

    public function create()
    {
        return view('rmanager.student.add');
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

        $random = Str::random(4);
        $currentDate = Carbon::now()->toDateString();

        $student->created_by = Auth()->user()->id;
        $student->created_by_name = Auth()->user()->name;

        if($request->hasFile('passport'))
        {
            $passport_image = $request->file('passport');
            if($passport_image->isValid())
            {
                $passport_file =$currentDate . '-' .$random. uniqid() . '.' . $passport_image->getClientOriginalName();
                $passportPath = 'uploads/student/passport/';
                $passport_image->move($passportPath,$passport_file );
                $student->passport = $passport_file;
            }
        }

        if($request->hasFile('ielts'))
        {
            $ielts_image = $request->file('ielts');
            if($ielts_image->isValid())
            {
                $ielts_file =$currentDate . '-' .$random. uniqid() . '.' . $ielts_image->getClientOriginalName();
                $ieltsPath = 'uploads/student/ielts/';
                $ielts_image->move($ieltsPath,$ielts_file );
                $student->ielts = $ielts_file;
            }
        }

        if($request->hasFile('grade_10'))
        {
            $grade_10_image = $request->file('grade_10');
            if($grade_10_image->isValid())
            {
                $grade_10_file =$currentDate . '-' .$random. uniqid() . '.' . $grade_10_image->getClientOriginalName();
                $grade_10Path = 'uploads/student/grade_10/';
                $grade_10_image->move($grade_10Path,$grade_10_file );
                $student->grade_10 = $grade_10_file;
            }
        }

        if($request->hasFile('grade_12'))
        {
            $grade_12_image = $request->file('grade_12');
            if($grade_12_image->isValid())
            {
                $grade_12_file =$currentDate . '-' .$random. uniqid() . '.' . $grade_12_image->getClientOriginalName();
                $grade_12Path = 'uploads/student/grade_12/';
                $grade_12_image->move($grade_12Path, $grade_12_file);
                $student->grade_12 = $grade_12_file;
            }
        }

        if($request->hasFile('bachelor_mark_sheet'))
        {
            $bachelor_mark_sheet_image = $request->file('bachelor_mark_sheet');
            if($bachelor_mark_sheet_image->isValid())
            {
                $bachelor_mark_sheet_file =$currentDate . '-' .$random. uniqid() . '.' . $bachelor_mark_sheet_image->getClientOriginalName();
                $bachelor_mark_sheetPath = 'uploads/student/bachelor_mark_sheet/';
                $bachelor_mark_sheet_image->move($bachelor_mark_sheetPath, $bachelor_mark_sheet_file);
                $student->bachelor_mark_sheet = $bachelor_mark_sheet_file;
            }
        }

        if($request->hasFile('bachelor_certificate'))
        {
            $bachelor_certificate_image = $request->file('bachelor_certificate');
            if($bachelor_certificate_image->isValid())
            {
                $bachelor_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $bachelor_certificate_image->getClientOriginalName();
                $bachelor_certificatePath = 'uploads/student/bachelor_certificate/';
                $bachelor_certificate_image->move($bachelor_certificatePath, $bachelor_certificate_file);
                $student->bachelor_certificate = $bachelor_certificate_file;

            }
        }

        if($request->hasFile('master_mark_sheet'))
        {
            $master_mark_sheet_image = $request->file('master_mark_sheet');
            if($master_mark_sheet_image->isValid())
            {
                $master_mark_sheet_file =$currentDate . '-' .$random. uniqid() . '.' . $master_mark_sheet_image->getClientOriginalName();
                $master_mark_sheetPath = 'uploads/student/master_mark_sheet/';
                $master_mark_sheet_image->move($master_mark_sheetPath, $master_mark_sheet_file);
                $student->master_mark_sheet = $master_mark_sheet_file;
            }
        }

        if($request->hasFile('master_certificate'))
        {
            $master_certificate_image = $request->file('master_certificate');
            if($master_certificate_image->isValid())
            {
                $master_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $master_certificate_image->getClientOriginalName();
                $master_certificatePath = 'uploads/student/master_certificate/';
                $master_certificate_image->move($master_certificatePath, $master_certificate_file);
                $student->master_certificate = $master_certificate_file;
            }
        }

        if($request->hasFile('lors'))
        {
            $lors_image = $request->file('lors');
            if($lors_image->isValid())
            {
                $lors_file =$currentDate . '-' .$random. uniqid() . '.' . $lors_image->getClientOriginalName();
                $lorsPath = 'uploads/student/lors/';
                $lors_image->move($lorsPath, $lors_file);
                $student->lors = $lors_file;
            }
        }

        if($request->hasFile('resume'))
        {
            $resume_image = $request->file('resume');
            if($resume_image->isValid())
            {
                $resume_file =$currentDate . '-' .$random. uniqid() . '.' . $resume_image->getClientOriginalName();
                $resumePath = 'uploads/student/resume/';
                $resume_image->move($resumePath, $resume_file);
                $student->resume = $resume_file;
            }
        }


        if($request->hasFile('work_experience'))
        {
            $work_experience_image = $request->file('work_experience');
            if($work_experience_image->isValid())
            {
                $work_experience_file =$currentDate . '-' .$random. uniqid() . '.' . $work_experience_image->getClientOriginalName();
                $work_experiencePath = 'uploads/student/work_experience/';
                $work_experience_image->move($work_experiencePath, $work_experience_file);
                $student->work_experience = $work_experience_file;
            }
        }

        if($request->hasFile('moi'))
        {
            $moi_image = $request->file('moi');
            if($moi_image->isValid())
            {
                $moi_file =$currentDate . '-' .$random. uniqid() . '.' . $moi_image->getClientOriginalName();
                $moiPath = 'uploads/student/moi/';
                $moi_image->move($moiPath, $moi_file);
                $student->moi = $moi_file;
            }
        }

        if($request->hasFile('personal_statement'))
        {
            $personal_statement_image = $request->file('personal_statement');
            if($personal_statement_image->isValid())
            {
                $personal_statement_file =$currentDate . '-' .$random. uniqid() . '.' . $personal_statement_image->getClientOriginalName();
                $personal_statementPath = 'uploads/student/personal_statement/';
                $personal_statement_image->move($personal_statementPath, $personal_statement_file);
                $student->personal_statement = $personal_statement_file;
            }
        }

        if($request->hasFile('diploma_mark_sheet'))
        {
            $diploma_mark_sheet_image = $request->file('diploma_mark_sheet');
            if($diploma_mark_sheet_image->isValid())
            {
                $diploma_mark_sheet_file =$currentDate . '-' .$random. uniqid() . '.' . $diploma_mark_sheet_image->getClientOriginalName();
                $diploma_mark_sheetPath = 'uploads/student/diploma_mark_sheet/';
                $diploma_mark_sheet_image->move($diploma_mark_sheetPath, $diploma_mark_sheet_file);
                $student->diploma_mark_sheet = $diploma_mark_sheet_file;
            }
        }

        if($request->hasFile('diploma_certificate'))
        {
            $diploma_certificate_image = $request->file('diploma_certificate');
            if($diploma_certificate_image->isValid())
            {

                $diploma_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $diploma_certificate_image->getClientOriginalName();
                $diploma_certificatePath = 'uploads/student/diploma_certificate/';
                $diploma_certificate_image->move($diploma_certificatePath, $diploma_certificate_file);
                $student->diploma_certificate = $diploma_certificate_image;
            }
        }

        if($request->hasFile('other_certificate'))
        {
            $other_certificate_image = $request->file('other_certificate');
            if($other_certificate_image->isValid())
            {
                $other_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $other_certificate_image->getClientOriginalName();
                $other_certificatePath = 'uploads/student/other_certificate/';
                $other_certificate_image->move($other_certificatePath, $other_certificate_file);
                $student->other_certificate = $other_certificate_file;
            }
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

        Session::flash('success_message', 'Student has been successfully added');
        return redirect()->route('students.index');
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
        return redirect()->route('students.index');

    }

    public function show(Student $student)
    {
        abort(503);
    }


    public function edit($id)
    {
        $student = Student::find($id);
        return view('rmanager.student.edit', compact('student'));
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

        $random = Str::random(4);
        $currentDate = Carbon::now()->toDateString();

        $student->created_by = Auth()->user()->id;
        $student->created_by_name = Auth()->user()->name;

        if($request->hasFile('passport'))
        {
            $passport_image = $request->file('passport');
            if($passport_image->isValid())
            {
                if (File::exists('uploads/student/passport/'.$student->passport)){
                    File::delete('uploads/student/passport/'.$student->passport);
                }

                $passport_file =$currentDate . '-' .$random. uniqid() . '.' . $passport_image->getClientOriginalName();
                $passportPath = 'uploads/student/passport/';
                $passport_image->move($passportPath,$passport_file );
                $student->passport = $passport_file;
            }
        }

        $random = Str::random(10);
        if($request->hasFile('ielts'))
        {
            $ielts_image = $request->file('ielts');
            if($ielts_image->isValid())
            {
                if (File::exists('uploads/student/ielts/'.$student->ielts)){
                    File::delete('uploads/student/ielts/'.$student->ielts);
                }

                $ielts_file =$currentDate . '-' .$random. uniqid() . '.' . $ielts_image->getClientOriginalName();
                $ieltsPath = 'uploads/student/ielts/';
                $ielts_image->move($ieltsPath,$ielts_file );
                $student->ielts = $ielts_file;
            }
        }

        if($request->hasFile('grade_10'))
        {
            $grade_10_image = $request->file('grade_10');
            if($grade_10_image->isValid())
            {
                if (File::exists('uploads/student/grade_10/'.$student->grade_10)){
                    File::delete('uploads/student/grade_10/'.$student->grade_10);
                }

                $grade_10_file =$currentDate . '-' .$random. uniqid() . '.' . $grade_10_image->getClientOriginalName();
                $grade_10Path = 'uploads/student/grade_10/';
                $grade_10_image->move($grade_10Path,$grade_10_file );
                $student->grade_10 = $grade_10_file;
            }
        }

        if($request->hasFile('grade_12'))
        {
            $grade_12_image = $request->file('grade_12');
            if($grade_12_image->isValid())
            {
                if (File::exists('uploads/student/grade_12/'.$student->grade_12)){
                    File::delete('uploads/student/grade_12/'.$student->grade_12);
                }
                $grade_12_file =$currentDate . '-' .$random. uniqid() . '.' . $grade_12_image->getClientOriginalName();
                $grade_12Path = 'uploads/student/grade_12/';
                $grade_12_image->move($grade_12Path, $grade_12_file);
                $student->grade_12 = $grade_12_file;
            }
        }

        if($request->hasFile('bachelor_mark_sheet'))
        {
            $bachelor_mark_sheet_image = $request->file('bachelor_mark_sheet');
            if($bachelor_mark_sheet_image->isValid())
            {
                if (File::exists('uploads/student/bachelor_mark_sheet/'.$student->bachelor_mark_sheet)){
                    File::delete('uploads/student/bachelor_mark_sheet/'.$student->bachelor_mark_sheet);
                }
                $bachelor_mark_sheet_file =$currentDate . '-' .$random. uniqid() . '.' . $bachelor_mark_sheet_image->getClientOriginalName();
                $bachelor_mark_sheetPath = 'uploads/student/bachelor_mark_sheet/';
                $bachelor_mark_sheet_image->move($bachelor_mark_sheetPath, $bachelor_mark_sheet_file);
                $student->bachelor_mark_sheet = $bachelor_mark_sheet_file;
            }
        }

        if($request->hasFile('bachelor_certificate'))
        {
            $bachelor_certificate_image = $request->file('bachelor_certificate');
            if($bachelor_certificate_image->isValid())
            {
                if (File::exists('uploads/student/bachelor_certificate/'.$student->bachelor_certificate)){
                    File::delete('uploads/student/bachelor_certificate/'.$student->bachelor_certificate);
                }
                $bachelor_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $bachelor_certificate_image->getClientOriginalName();
                $bachelor_certificatePath = 'uploads/student/bachelor_certificate/';
                $bachelor_certificate_image->move($bachelor_certificatePath, $bachelor_certificate_file);
                $student->bachelor_certificate = $bachelor_certificate_file;

            }
        }

        if($request->hasFile('master_mark_sheet'))
        {
            $master_mark_sheet_image = $request->file('master_mark_sheet');
            if($master_mark_sheet_image->isValid())
            {
                if (File::exists('uploads/student/master_mark_sheet/'.$student->master_mark_sheet)){
                    File::delete('uploads/student/master_mark_sheet/'.$student->master_mark_sheet);
                }
                $master_mark_sheet_file =$currentDate . '-' .$random. uniqid() . '.' . $master_mark_sheet_image->getClientOriginalName();
                $master_mark_sheetPath = 'uploads/student/master_mark_sheet/';
                $master_mark_sheet_image->move($master_mark_sheetPath, $master_mark_sheet_file);
                $student->master_mark_sheet = $master_mark_sheet_file;
            }
        }

        if($request->hasFile('master_certificate'))
        {
            $master_certificate_image = $request->file('master_certificate');
            if($master_certificate_image->isValid())
            {
                if (File::exists('uploads/student/master_certificate/'.$student->master_certificate)){
                    File::delete('uploads/student/master_certificate/'.$student->master_certificate);
                }
                $master_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $master_certificate_image->getClientOriginalName();
                $master_certificatePath = 'uploads/student/master_certificate/';
                $master_certificate_image->move($master_certificatePath, $master_certificate_file);
                $student->master_certificate = $master_certificate_file;
            }
        }

        if($request->hasFile('lors'))
        {
            $lors_image = $request->file('lors');
            if($lors_image->isValid())
            {
                if (File::exists('uploads/student/lors/'.$student->lors)){
                    File::delete('uploads/student/lors/'.$student->lors);
                }
                $lors_file =$currentDate . '-' .$random. uniqid() . '.' . $lors_image->getClientOriginalName();
                $lorsPath = 'uploads/student/lors/';
                $lors_image->move($lorsPath, $lors_file);
                $student->lors = $lors_file;
            }
        }

        if($request->hasFile('resume'))
        {
            $resume_image = $request->file('resume');
            if($resume_image->isValid())
            {
                if (File::exists('uploads/student/resume/'.$student->resume)){
                    File::delete('uploads/student/resume/'.$student->resume);
                }
                $resume_file =$currentDate . '-' .$random. uniqid() . '.' . $resume_image->getClientOriginalName();
                $resumePath = 'uploads/student/resume/';
                $resume_image->move($resumePath, $resume_file);
                $student->resume = $resume_file;
            }
        }


        if($request->hasFile('work_experience'))
        {
            $work_experience_image = $request->file('work_experience');
            if($work_experience_image->isValid())
            {
                if (File::exists('uploads/student/work_experience/'.$student->work_experience)){
                    File::delete('uploads/student/work_experience/'.$student->work_experience);
                }
                $work_experience_file =$currentDate . '-' .$random. uniqid() . '.' . $work_experience_image->getClientOriginalName();
                $work_experiencePath = 'uploads/student/work_experience/';
                $work_experience_image->move($work_experiencePath, $work_experience_file);
                $student->work_experience = $work_experience_file;
            }
        }

        if($request->hasFile('moi'))
        {
            $moi_image = $request->file('moi');
            if($moi_image->isValid())
            {
                if (File::exists('uploads/student/moi/'.$student->moi)){
                    File::delete('uploads/student/moi/'.$student->moi);
                }
                $moi_file =$currentDate . '-' .$random. uniqid() . '.' . $moi_image->getClientOriginalName();
                $moiPath = 'uploads/student/moi/';
                $moi_image->move($moiPath, $moi_file);
                $student->moi = $moi_file;
            }
        }

        if($request->hasFile('personal_statement'))
        {
            $personal_statement_image = $request->file('personal_statement');
            if($personal_statement_image->isValid())
            {
                if (File::exists('uploads/student/personal_statement/'.$student->personal_statement)){
                    File::delete('uploads/student/personal_statement/'.$student->personal_statement);
                }
                $personal_statement_file =$currentDate . '-' .$random. uniqid() . '.' . $personal_statement_image->getClientOriginalName();
                $personal_statementPath = 'uploads/student/personal_statement/';
                $personal_statement_image->move($personal_statementPath, $personal_statement_file);
                $student->personal_statement = $personal_statement_file;
            }
        }

        if($request->hasFile('diploma_mark_sheet'))
        {
            $diploma_mark_sheet_image = $request->file('diploma_mark_sheet');
            if($diploma_mark_sheet_image->isValid())
            {
                if (File::exists('uploads/student/diploma_mark_sheet/'.$student->diploma_mark_sheet)){
                    File::delete('uploads/student/diploma_mark_sheet/'.$student->diploma_mark_sheet);
                }
                $diploma_mark_sheet_file =$currentDate . '-' .$random. uniqid() . '.' . $diploma_mark_sheet_image->getClientOriginalName();
                $diploma_mark_sheetPath = 'uploads/student/diploma_mark_sheet/';
                $diploma_mark_sheet_image->move($diploma_mark_sheetPath, $diploma_mark_sheet_file);
                $student->diploma_mark_sheet = $diploma_mark_sheet_file;
            }
        }

        if($request->hasFile('diploma_certificate'))
        {
            $diploma_certificate_image = $request->file('diploma_certificate');
            if($diploma_certificate_image->isValid())
            {
                if (File::exists('uploads/student/diploma_certificate/'.$student->diploma_certificate)){
                    File::delete('uploads/student/diploma_certificate/'.$student->diploma_certificate);
                }
                $diploma_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $diploma_certificate_image->getClientOriginalName();
                $diploma_certificatePath = 'uploads/student/diploma_certificate/';
                $diploma_certificate_image->move($diploma_certificatePath, $diploma_certificate_file);
                $student->diploma_certificate = $diploma_certificate_file;
            }
        }

        if($request->hasFile('other_certificate'))
        {
            $other_certificate_image = $request->file('other_certificate');
            if($other_certificate_image->isValid())
            {
                if (File::exists('uploads/student/other_certificate/'.$student->other_certificate)){
                    File::delete('uploads/student/other_certificate/'.$student->other_certificate);
                }
                $other_certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $other_certificate_image->getClientOriginalName();
                $other_certificatePath = 'uploads/student/other_certificate/';
                $other_certificate_image->move($other_certificatePath, $other_certificate_file);
                $student->other_certificate = $other_certificate_file;
            }
        }

        $student->update();
        Session::flash('success_message', 'Student has been successfully updated');
        return redirect()->route('students.index');
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
        return view('rmanager.student.view', compact('student'));
        //return view('admin.student.modal.studentDetailModal', compact('student'));
    }

    public function getDocument($id)
    {
        $student = Student::find($id);

        return view('rmanager.student.modal.studentDocumentModal', compact('student'));
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
       $studentsUser = User::where('id', $team->user_id)->first();
        $applicationteam = User::where('id', $explode[0])->first();
        Notification::send($applicationteam, new LeadAssignNotification($studentsUser));
        return redirect()->route('students.index')->with('assign', 'lable assign to Application Team Successfully');
    }
    
    
    public function uploadexcel(Request $request)
    {
        return view('rmanager.student.uploadexcel');
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
                        return redirect()->route('students.index');
            }
        }


}

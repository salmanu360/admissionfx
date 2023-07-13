<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\College;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentApplication;
use App\Models\Recruiter;
use Illuminate\Support\Str;
use App\Models\RecruiterMarketing;
use App\Models\RecruiterPassword;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class RecruiterController extends Controller
{
    public function RecruiterDashboard()
    {
            $totalCollege = College::count();
            $totalStdApplication = StudentApplication::count();
            $totalStudent = Student::where('created_by', auth()->user()->id)->count();
            $totalRecruiter = Recruiter::where('created_by', auth()->user()->id)->count();
            $totalCourse = Course::count();
            $colleges = College::all();
        return view('recruiter.dashboard',compact('totalCollege', 'totalCourse', 'totalStudent', 'totalRecruiter', 'colleges', 'totalStdApplication'));
    }

    public function index(Request $request)
    {                              
        // join('users', 'recruiters.email', '=', 'users.email')
        //     ->join('recruiter_passwords', 'users.id', '=', 'recruiter_passwords.user_id')
        //     ->orderBy('recruiters.id', 'DESC')->get();
        $recruiters = Recruiter::where('created_by', auth()->user()->id)->latest()->get();
        return view('recruiter.recruiter.index', compact('recruiters'));
    }
    
     public function mou()
    {
        $row = DB::table('signatures')->orderByDesc('id')->first();
        $recruiter = DB::table('recruiters')->where('user_id', auth()->user()->id)->first();
        return view('recruiter.recruiter.mou',compact('row','recruiter'));
    }

    public function create()
    {
        return view('recruiter.recruiter.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'student_source' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postal_zip' => 'required',
            'phone' => 'required',
            'declare_confirm' => 'required',
            'terms_conditions' => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'linkedIn' => 'nullable',
            'mobile' => 'nullable',
            'skype' => 'nullable',
            'whatsapp' => 'nullable',
            'referred' => 'nullable',
            'recruiting_from_date' => 'nullable',
            'services' => 'nullable',
            'students_from' => 'nullable',
            'institute' => 'nullable',
            'associations' => 'nullable',
            'recruiting_from_country' => 'nullable',
            'students_per_year' => 'nullable',
            'service_fee' => 'nullable',
            'refer_student_bureau' => 'nullable',
            'comments' => 'nullable',
            'reference_name' => 'nullable',
            'reference_institution' => 'nullable',
            'reference_institution_email' => 'nullable',
            'reference_institution_contact' => 'nullable',
            'reference_institution_website' => 'nullable',
            'company_logo' => 'nullable',
            'business_certificate' => 'nullable',
            'status' => 'nullable',
        ]);

        $Recruiter = new Recruiter();
        $Recruiter->company_name = $request->company_name;
        $Recruiter->email = $request->email;
        $Recruiter->website = $request->website;
        $Recruiter->facebook = $request->facebook;
        $Recruiter->instagram = $request->instagram;
        $Recruiter->twitter = $request->twitter;
        $Recruiter->linkedIn = $request->linkedIn;
        $Recruiter->student_source = $request->student_source;
        $Recruiter->first_name = $request->first_name;
        $Recruiter->last_name = $request->last_name;
        $Recruiter->address = $request->address;
        $Recruiter->city = $request->city;
        $Recruiter->state = $request->state;
        $Recruiter->country = $request->country;
        $Recruiter->postal_zip = $request->postal_zip;
        $Recruiter->phone = $request->phone;
        $Recruiter->mobile = $request->mobile;
        $Recruiter->skype = $request->skype;
        $Recruiter->whatsapp = $request->whatsapp;
        $Recruiter->referred = $request->referred;
        $Recruiter->recruiting_from_date = $request->recruiting_from_date;
        $Recruiter->services = $request->services;
        $Recruiter->students_from = implode(" ", $request->students_from);
        $Recruiter->institute = $request->institute;
        $Recruiter->associations = $request->associations;
        $Recruiter->recruiting_from_country = $request->recruiting_from_country;
        $Recruiter->students_per_year = $request->students_per_year;
        $Recruiter->service_fee = $request->service_fee;
        $Recruiter->refer_student_bureau = $request->refer_student_bureau;
        $Recruiter->comments = $request->comments;
        $Recruiter->reference_name = $request->reference_name;
        $Recruiter->reference_institution = $request->reference_institution;
        $Recruiter->reference_institution_email = $request->reference_institution_email;
        $Recruiter->reference_institution_contact = $request->reference_institution_contact;
        $Recruiter->reference_institution_website = $request->reference_institution_website;
        $Recruiter->declare_confirm = $request->declare_confirm;
        $Recruiter->terms_conditions = $request->terms_conditions;
        $random = Str::random(4);

        $currentDate = Carbon::now()->toDateString();

        $Recruiter->created_by = Auth()->user()->id;
        $Recruiter->created_by_name = Auth()->user()->name;

        if($request->hasFile('company_logo'))
        {
            $company_logo = $request->file('company_logo');
            if($company_logo->isValid())
            {
                $logo_file =$currentDate . '-' .$random. uniqid() . '.' . $company_logo->getClientOriginalName();
                $passportPath = 'uploads/recruiter/logo/';
                $company_logo->move($passportPath,$logo_file );
                $Recruiter->company_logo = $logo_file;
            }
        }

        if($request->hasFile('business_certificate'))
        {
            $business_certificate = $request->file('business_certificate');
            if($business_certificate->isValid())
            {
                $certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $business_certificate->getClientOriginalName();
                $ieltsPath = 'uploads/recruiter/certificate/';
                $business_certificate->move($ieltsPath,$certificate_file);
                $Recruiter->business_certificate = $certificate_file;
            }
        }

        $Recruiter->save();
        if ($request->has('marketing')) {
            
            foreach ($request->marketing as $marketings) {
                $marketing = new RecruiterMarketing();
                $marketing->name = $marketings;
                $marketing->recruiter_id = $Recruiter->id;
                $marketing->save();
            }
        }

        $randomPassword = Str::random(10);

        $recruitersUser = new User();
        $recruitersUser->name = $request->email;
        $recruitersUser->email = $request->email;
        $recruitersUser->role = 'recruiter';
        $recruitersUser->password = $randomPassword;

        $recruitersUser->save();

        $Recruiter->user_id = $recruitersUser->id;
        $Recruiter->save();

        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'Recruiter is registered';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Recruiter';
        $notification->notifiable_type = 'App\Models\Recruiter';
        $notification->causer_type = 'App\Models\User';
        $notification->notifiable_id = $Recruiter->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();

        $recruiterpassword = new RecruiterPassword();

        $recruiterpassword->user_id = $recruitersUser->id;
        $recruiterpassword->recruiter_password = $randomPassword;

        $recruiterpassword->save();

        Session::flash('success_message', 'Recruiter has been successfully added');
        return redirect()->route('rec.index');
    }

    public function changePassword(Request $request, $id){
        $request->validate([
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ]);
        $recruiter = Recruiter::find($id);
        $recruiter->password = Hash::make( $request->newPassword);
        $recruiter->update();

        $user = User::where('email', $recruiter->email)->update([
            'password' => $recruiter->password
        ]);

        Session::flash('change', 'Password has been successfully Change');
        return redirect()->route('rec.index');

    }

    public function show(Recruiter $recruiter)
    {
        abort(503);
    }


    public function edit($id)
    {
        $recruiter = Recruiter::find($id);
        $recruiterMarketings = RecruiterMarketing::where('recruiter_id', $recruiter->id)->pluck('name')->toArray();
        return view('recruiter.recruiter.edit', compact('recruiter', 'recruiterMarketings'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'student_source' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postal_zip' => 'required',
            'phone' => 'required',
            'declare_confirm' => 'required',
            'terms_conditions' => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'linkedIn' => 'nullable',
            'mobile' => 'nullable',
            'skype' => 'nullable',
            'whatsapp' => 'nullable',
            'referred' => 'nullable',
            'recruiting_from_date' => 'nullable',
            'services' => 'nullable',
            'students_from' => 'nullable',
            'institute' => 'nullable',
            'associations' => 'nullable',
            'recruiting_from_country' => 'nullable',
            'students_per_year' => 'nullable',
            'service_fee' => 'nullable',
            'refer_student_bureau' => 'nullable',
            'comments' => 'nullable',
            'reference_name' => 'nullable',
            'reference_institution' => 'nullable',
            'reference_institution_email' => 'nullable',
            'reference_institution_contact' => 'nullable',
            'reference_institution_website' => 'nullable',
            'company_logo' => 'nullable',
            'business_certificate' => 'nullable',
            'status' => 'nullable',
        ]);

        $Recruiter = Recruiter::find($id);
        $Recruiter->company_name = $request->company_name;
        $Recruiter->email = $request->email;
        $Recruiter->website = $request->website;
        $Recruiter->facebook = $request->facebook;
        $Recruiter->instagram = $request->instagram;
        $Recruiter->twitter = $request->twitter;
        $Recruiter->linkedIn = $request->linkedIn;
        $Recruiter->student_source = $request->student_source;
        $Recruiter->first_name = $request->first_name;
        $Recruiter->last_name = $request->last_name;
        $Recruiter->address = $request->address;
        $Recruiter->city = $request->city;
        $Recruiter->state = $request->state;
        $Recruiter->country = $request->country;
        $Recruiter->postal_zip = $request->postal_zip;
        $Recruiter->phone = $request->phone;
        $Recruiter->mobile = $request->mobile;
        $Recruiter->skype = $request->skype;
        $Recruiter->whatsapp = $request->whatsapp;
        $Recruiter->referred = $request->referred;
        $Recruiter->recruiting_from_date = $request->recruiting_from_date;
        $Recruiter->services = $request->services;
        $Recruiter->students_from =  implode(" ", $request->students_from);
        $Recruiter->institute = $request->institute;
        $Recruiter->associations = $request->associations;
        $Recruiter->recruiting_from_country = $request->recruiting_from_country;
        $Recruiter->students_per_year = $request->students_per_year;
        $Recruiter->service_fee = $request->service_fee;
        $Recruiter->refer_student_bureau = $request->refer_student_bureau;
        $Recruiter->comments = $request->comments;
        $Recruiter->reference_name = $request->reference_name;
        $Recruiter->reference_institution = $request->reference_institution;
        $Recruiter->reference_institution_email = $request->reference_institution_email;
        $Recruiter->reference_institution_contact = $request->reference_institution_contact;
        $Recruiter->reference_institution_website = $request->reference_institution_website;
        $Recruiter->declare_confirm = $request->declare_confirm;
        $Recruiter->terms_conditions = $request->terms_conditions;
        $random = Str::random(4);
        $currentDate = Carbon::now()->toDateString();

        $Recruiter->created_by = Auth()->user()->id;
        $Recruiter->created_by_name = Auth()->user()->name;

        if($request->hasFile('company_logo'))
        {
            $company_logo = $request->file('company_logo');
            if($company_logo->isValid())
            {
                if (File::exists('uploads/recruiter/logo/'.$Recruiter->company_logo)){
                    File::delete('uploads/recruiter/logo/'.$Recruiter->company_logo);
                }
                $logo_file =$currentDate . '-' .$random. uniqid() . '.' . $company_logo->getClientOriginalName();
                $passportPath = 'uploads/recruiter/logo/';
                $company_logo->move($passportPath,$logo_file );
                $Recruiter->company_logo = $logo_file;
            }
        }

        if($request->hasFile('business_certificate'))
        {
            $business_certificate = $request->file('business_certificate');
            if($business_certificate->isValid())
            {
                if (File::exists('uploads/Recruiter/certificate/'.$Recruiter->business_certificate)){
                    File::delete('uploads/Recruiter/certificate/'.$Recruiter->business_certificate);
                }
                $certificate_file =$currentDate . '-' .$random. uniqid() . '.' . $business_certificate->getClientOriginalName();
                $ieltsPath = 'uploads/recruiter/certificate/';
                $business_certificate->move($ieltsPath,$certificate_file);
                $Recruiter->business_certificate = $certificate_file;
            }
        }
        $Recruiter->update();

        $notification =  new Notification();
        $notification->type ='Update';
        $notification->data = 'Recruiter is updated';
        $notification->created_by = auth()->user()->name;
        $notification->causer_type = 'App\Models\User';
        $notification->causer_id = auth()->user()->id;
        $notification->role ='';
        $notification->notifiable_type = 'App\Models\Recruiter';
        $notification->notifiable_id = $Recruiter->id;
        $notification->save();
        
        if ($request->has('marketing')) {
            RecruiterMarketing::where('recruiter_id', $Recruiter->id)->delete();
            foreach ($request->marketing as $marketings) {
                $marketing = new RecruiterMarketing();
                $marketing->name = $marketings;
                $marketing->recruiter_id = $Recruiter->id;
                $marketing->save();
            }
        }
        Session::flash('success_message', 'Recruiter has been successfully updated');
        return redirect()->route('rec.index');
    }

    public function destroy($id)
    {
        $Recruiter = Recruiter::find($id);

        if (File::exists('uploads/recruiter/logo/'.$Recruiter->company_logo)){
            File::delete('uploads/recruiter/logo/'.$Recruiter->company_logo);
        }

        if (File::exists('uploads/recruiter/certificate/'.$Recruiter->business_certificate)){
            File::delete('uploads/recruiter/certificate/'.$Recruiter->business_certificate);
        }

        $Recruiter->delete();

        Session::flash('success_message', 'Recruiter Has Been deleted Successfully');
        return redirect()->back();
    }

    public function getDetail($id)
    {
        $recruiter = Recruiter::find($id);
        return view('recruiter.recruiter.view', compact('recruiter'));
       // return view('recruiter.recruiter.modal.recruiterDetailModal', compact('recruiter'));
    }

    public function getDocument($id)
    {
        $recruiter = Recruiter::find($id);

        return view('recruiter.recruiter.modal.recruiterDocumentModal', compact('recruiter'));
    }

    public function downloadFile($file, $type)
    {
        $file_path = public_path('uploads/recruiter/'.$type.'/'.$file);
        return response()->download( $file_path);
    }
    
     public function profile(){
        return view('recruiter.profile');
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'newPassword' => '',
            'confrimPassword' => 'same:newPassword'
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-img.' . $file->getClientOriginalExtension();
            $filePath = $file->move('uploads/recruiters/profile', $fileName);
            if (auth()->user()->photo) {
                Storage::delete(auth()->user()->photo);
            }
            auth()->user()->photo = $filePath;
            auth()->user()->save();
        }
        User::where('id', $id)->update([
            'password' => Hash::make($request['newPassword']),
        ]);

        if(auth()->user()->role == 'recruiter'){
            RecruiterPassword::where('user_id',$id)->update([
                'recruiter_password' => $request->newPassword,
            ]);
        }

        return redirect('/recruiter/profile');
    }
}

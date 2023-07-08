<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use App\Models\RecruiterMarketing;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RecruiterPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\demoMail;
use App\Mail\recruitermail;
class RecruiterController extends Controller
{
    public function index(){
        return view('frontend.recruiter.addRecruiters');
    }
    public function store(Request $request)
    {
        
        
        $validateData = $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'website' => 'required',
            
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

        if(Auth()->user() == "")
        {
            $Recruiter->created_by = $Recruiter->id;
            $Recruiter->created_by_name = $Recruiter->company_name;
        }
        else
        {
            $Recruiter->created_by = Auth()->user()->id;
            $Recruiter->created_by_name = Auth()->user()->name;
        }

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

        $recruiterpassword = new RecruiterPassword();

        $recruiterpassword->user_id = $recruitersUser->id;
        $recruiterpassword->recruiter_password = $randomPassword;

        $recruiterpassword->save();
        
        
        /* ===mail to admin===*/
        $mailData = [
          'title' => 'New Recruiter Registration',
          'body' => 'Congratulations University Bureau Team….!!! <br>
          One Recruiter ('.$Recruiter->first_name. ' '.$Recruiter->last_name.') has filled the form for becoming our partner.<br>
          Kindly review its application and in case if you accept his/her request kindly send him/her acceptance email. <br>
          And if in case an Recruiter  does not fulfil our criteria send him/her the rejection request.<br>Thanks',
          ];
          
        //Mail::to('salman.u360@gmail.com')->send(new recruitermail($mailData));
         Mail::to('support@universitybureau.com')->send(new recruitermail($mailData));
       /* ===mail to admin=== end*/
       
       /* ===mail to recruiter===*/
        $mailData = [
          'title' => 'New Recruiter Registration',
          'body' => '
          <p>Name: '.$Recruiter->first_name.''.$Recruiter->last_name .'</p>
          <p>Email: '.$Recruiter->email.'</p>
          <p>address: '.$Recruiter->address.'</p>
          <p>phone: '.$Recruiter->phone.'</p>
          <p>mobile: '.$Recruiter->mobile.'</p>
          <p>skype: '.$Recruiter->skype.'</p>
          <p>whatsapp: '.$Recruiter->whatsapp.'</p>
          <p>Thanks for registration we will soon review your information and will send login credentials through email</p>
          ',
          ];
        Mail::to($Recruiter->email)->send(new recruitermail($mailData));
       /* ===mail to recruiter=== end*/

        Session::flash('success_message', 'Recruiter has been successfully added');
        return redirect()->back()->with('success','Your request has been send please check your email');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RecruiterMarketing;
use App\Models\Recruiter;
use App\Models\College;
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


class ApiController extends Controller
{
    //
    use ApiResponser;

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt(['email' => $attr['email'], 'password' => $attr['password'], 'role' => "student"])) {
            if (!Auth::attempt(['email' => $attr['email'], 'password' => $attr['password'], 'role' => "recruiter"])) {
            return $this->error('Credentials not match', 401);
            }
        }
        
        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'user'=>auth()->user(),
        ],'Login successfully.');
    }
    public function logout()
    {
        try {
        auth()->user()->tokens()->delete();
        return $this->success([],'Tokens Revoked');
        }
        catch (\Exception $e) {
    return $this->error(500,[
            'error' => $e->getMessage()
        ]);
            }
    }
    
    public function register(Request $request)
    {
        try {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
     
        return $this->success([
            'email' => $request->email,
            'password'=>$request->password,
        ],'Registered successfully as Student.');
            } catch (\Exception $e) {
    return $this->error(500,[
            'error' => $e->getMessage()
        ]);
            }
    
    }
    
    public function registerRecruiter(Request $request){
        
        try {
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
          'title' => 'New Recruiter Registeration',
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
          'title' => 'New Recruiter Registeration',
          'body' => '
          <p>Name: '.$Recruiter->first_name.''.$Recruiter->last_name .'</p>
          <p>Email: '.$Recruiter->email.'</p>
          <p>address: '.$Recruiter->address.'</p>
          <p>phone: '.$Recruiter->phone.'</p>
          <p>mobile: '.$Recruiter->mobile.'</p>
          <p>skype: '.$Recruiter->skype.'</p>
          <p>whatsapp: '.$Recruiter->whatsapp.'</p>
          <p>Thanks for registeration we will soon review your information and will send login credentials through email</p>
          ',
          ];
        Mail::to($Recruiter->email)->send(new recruitermail($mailData));
        return $this->success([
            'email' => $request->email,
            'password'=>$request->password,
        ],'Registered successfully as Recruiter.');
    } catch (\Exception $e) {
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
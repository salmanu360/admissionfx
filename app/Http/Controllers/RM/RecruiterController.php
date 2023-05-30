<?php

namespace App\Http\Controllers\RM;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Recruiter;
use App\Models\CSVUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RecruiterMarketing;
use App\Http\Controllers\Controller;
use App\Models\RecruiterPassword;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RecruiterController extends Controller
{
    
    public function index(Request $request)
    {                              
        // join('users', 'recruiters.email', '=', 'users.email')
        //     ->join('recruiter_passwords', 'users.id', '=', 'recruiter_passwords.user_id')
        //     ->orderBy('recruiters.id', 'DESC')->get();
        $recruiters = Recruiter::latest()->get();
        return view('rmanager.recruiter.index', compact('recruiters'));
    }

    public function create()
    {
        return view('rmanager.recruiter.add');
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

        $recruiterpassword = new RecruiterPassword();

        $recruiterpassword->user_id = $recruitersUser->id;
        $recruiterpassword->recruiter_password = $randomPassword;

        $recruiterpassword->save();

        Session::flash('success_message', 'Recruiter has been successfully added');
        return redirect()->route('recruiters.index');
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
        return redirect()->route('recruiters.index');

    }

    public function show(Recruiter $recruiter)
    {
        abort(503);
    }


    public function edit($id)
    {
        $recruiter = Recruiter::find($id);
        $recruiterMarketings = RecruiterMarketing::where('recruiter_id', $recruiter->id)->pluck('name')->toArray();
        return view('rmanager.recruiter.edit', compact('recruiter', 'recruiterMarketings'));
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
        return redirect()->route('recruiters.index');
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

        $user = User::where('email', $Recruiter->email);
        $user->delete();

        Session::flash('success_message', 'Recruiter Has Been deleted Successfully');
        return redirect()->back();
    }

    public function getDetail($id)
    {
        $recruiter = Recruiter::find($id);
        return view('rmanager.recruiter.view', compact('recruiter'));
       // return view('admin.recruiter.modal.recruiterDetailModal', compact('recruiter'));
    }

    public function getDocument($id)
    {
        $recruiter = Recruiter::find($id);

        return view('rmanager.recruiter.modal.recruiterDocumentModal', compact('recruiter'));
    }

    public function downloadFile($file, $type)
    {
        $file_path = public_path('uploads/recruiter/'.$type.'/'.$file);
        return response()->download( $file_path);
    }
    
    
    public function uploadexcel(Request $request)
    {
        return view('rmanager.recruiter.uploadexcel');
    }
    
    public function uploadexcelcsv(Request $request)
    {
        
        $path= app_path();
        $filename= $path.'/recruiter.csv';
        $row = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
                while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
                    //   echo '<pre>';print_r($data);continue;
                    $num = 4;
                    $row++;
                   if($row != 2 && $row < 2473)
                    { 
                    //  echo '<pre>';print_r($data);continue;
                        $Recruiter  = new Recruiter();
                        $Recruiter->company_name = trim($data[0]);
                        $Recruiter->email = trim($data[1]);
                        $Recruiter->website = trim($data[2]);
                        $Recruiter->facebook = trim($data[3]);
                        $Recruiter->instagram = trim($data[4]);
                        $Recruiter->twitter = trim($data[5]);
                        $Recruiter->linkedIn = trim($data[6]);
                        $Recruiter->student_source = trim($data[7]);
                        $Recruiter->first_name =trim($data[8]);
                        $Recruiter->last_name = trim($data[9]);
                        $Recruiter->address = trim($data[10]);
                        $Recruiter->city = trim($data[11]);
                        $Recruiter->state = trim($data[12]);
                        $Recruiter->country = trim($data[13]);
                        $Recruiter->postal_zip = trim($data[14]);
                        $Recruiter->phone = trim($data[15]);
                        $Recruiter->mobile = trim($data[16]);
                        $Recruiter->skype = trim($data[17]);
                        $Recruiter->whatsapp = trim($data[18]);
                        $Recruiter->referred = trim($data[19]);
                        $Recruiter->recruiting_from_date = trim($data[20]);
                        $Recruiter->services = trim($data[21]);
                        $Recruiter->students_from = trim($data[22]);
                        $Recruiter->institute = trim($data[23]);
                        $Recruiter->associations = trim($data[24]);
                        $Recruiter->recruiting_from_country = trim($data[25]);
                        $Recruiter->students_per_year = trim($data[26]);
                        $Recruiter->service_fee = trim($data[27]);
                        $Recruiter->refer_student_bureau = trim($data[28]);
                        $Recruiter->comments = trim($data[29]);
                        $Recruiter->reference_name = trim($data[30]);
                        $Recruiter->reference_institution = trim($data[31]);
                        $Recruiter->reference_institution_email = trim($data[32]);
                        $Recruiter->reference_institution_contact = trim($data[33]);
                        $Recruiter->reference_institution_website = trim($data[34]);
                        $Recruiter->password = Hash::make(trim($data[35]));
                        $Recruiter->created_by = Auth()->user()->id;
                        $Recruiter->created_by_name = Auth()->user()->name;

                        $recruitersUser = new User();
                        $recruitersUser->name = trim($data[1]);
                        $recruitersUser->email = trim($data[1]);
                        $recruitersUser->role = 'recruiter';
                        $recruitersUser->password = trim($data[35]);
                
                        $recruitersUser->save();
                
                        $Recruiter->user_id = $recruitersUser->id;
                        $Recruiter->save();
                
                        $recruiterpassword = new RecruiterPassword();
                
                        $recruiterpassword->user_id = $recruitersUser->id;
                        $recruiterpassword->recruiter_password = trim($data[35]);
                
                        $recruiterpassword->save();
        
                    }
    
                }
                $csvSave = new CSVUpload();
                if($request->hasFile('excel_recruiter')){
                    $file = $request->file('excel_recruiter');
                    $fileName = 'recruiter' . rand(99,1000) . '-file.' . $file->getClientOriginalExtension();
                    $csvSave->file = $request->file('excel_recruiter')->move('uploads/CSVFiles/', $fileName);
                    if($csvSave->file){
                        $csvSave->delete('uploads/CSVFiles/', $csvSave->photo);
                    }
                }
                $csvSave->created_by = auth()->user()->id;
                $csvSave->created_name = auth()->user()->name;
                $csvSave->save();
                
                Session::flash('success_message', 'Recruiter has been successfully added');
                        return redirect()->route('recruiters.index');
            }
        }

}

<?php

namespace App\Http\Controllers\RM;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Country;
use App\Models\CSVUpload;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class CollegeController extends Controller
{
    public function index(Request $request)
    {
        $colleges = College::with('country')->Latest()->get();
        return view('rmanager.college.index', compact('colleges'));
    }

    public function create()
    {
        
        $countries = Country::where('status', 1)->get();
        $countries_dropdown = "<option value='' selected disabled>Select Country </option>";
        foreach($countries as $country)
        {
            $countries_dropdown .= "<option value='". $country->id ."'> ". $country->name. " </option>";
           
        }
        
        
        // dd($countries);
        return view('rmanager.college.add',compact('countries'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required'
        ]);
        
        $college = new College();
        $college->name = ucwords(strtolower($data['name']));
    	$college->slug =  Str::slug($data['name']);
        $college->country_id = $data['country_id'];
        $college->city_id = $data['city_id'];
        $college->state_id = $data['state_id'];
        $college->campus = $data['campus'];
        $college->intake = $data['intake'];
        $college->level_of_edu = $data['level_of_edu'];
        $college->application_fee = $data['application_fee'];
        
        $college->created_by = Auth()->user()->id;
        $college->created_by_name = Auth()->user()->name;
        
        
        if(empty($data['description'])){
    		$college->description = "";
    	} else{
    		$college->description = $data['description'];
    	}
        
        if(empty($data['status'])){
    		$college->status = 0;
    	} else{
    		$college->status = 1;
    	}
    	
    	if (empty($data['is_featured'])){
            $college->is_featured = 0;
        } else {
            $college->is_featured = 1;
        }

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time() . '-img.' . $file->getClientOriginalExtension();
            $college->image = $request->file('photo')->move('uploads/college/', $fileName);
            if($college->photo){
                $college->delete('uploads/college/', $college->photo);
            }
        }
        $college->save();

        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'College is registered';
        $notification->created_by = auth()->user()->name;
        $notification->causer_type = 'App\Models\User';
        $notification->causer_id = auth()->user()->id;
        $notification->role ='RM';
        $notification->notifiable_type = 'App\Models\College';
        $notification->notifiable_id = $college->id;
        $notification->save();
        
    	Session::flash('success_message', 'College has been successfully added');
    	return redirect()->back();
    }
    
    
    public function editCollege($id)
    {
        $myCollege = College::findOrFail($id);
        $countries = Country::where('status', 1)->get();
        return view('rm.college.edit', compact('countries','myCollege'));
    }
    
    public function updateCollege(Request $request, $id)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required'
        ]);

        $college = College::findOrFail($id);
        $college->name = ucwords(strtolower($data['name']));
    	$college->slug =  Str::slug($data['name']);
        $college->country_id = $data['country_id'];
        $college->city_id = $data['city_id'];
        $college->state_id = $data['state_id'];
        $college->campus = $data['campus'];
        $college->intake = $data['intake'];
        $college->level_of_edu = $data['level_of_edu'];
        $college->application_fee = $data['application_fee'];
        
        $college->created_by = Auth()->user()->id;
        $college->created_by_name = Auth()->user()->name;
        
        
        if(empty($data['description'])){
    		$college->description = "";
    	} else{
    		$college->description = $data['description'];
    	}
        
        if(empty($data['status'])){
    		$college->status = 0;
    	} else{
    		$college->status = 1;
    	}
    	
    	if (empty($data['is_featured'])){
            $college->is_featured = 0;
        } else {
            $college->is_featured = 1;
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time() . '-img.' . $file->getClientOriginalExtension();
            $college->image = $request->file('photo')->move('uploads/college/', $fileName);
            if($college->photo){
                $college->delete('uploads/college/', $college->photo);
            }
        }

        $college->save();

        $notification =  new Notification();
        $notification->type ='Update';
        $notification->data = 'College is updated';
        $notification->created_by = auth()->user()->name;
        $notification->causer_type = 'App\Models\User';
        $notification->causer_id = auth()->user()->id;
        $notification->role ='RM';
        $notification->notifiable_type = 'App\Models\College';
        $notification->notifiable_id = $college->id;
        $notification->save();

        Session::flash('success_message', 'College Has Been Updated Successfully');
        return redirect()->back();

    }

    // public function show(College $college)
    // {
    //     abort(503);
    // }

    public function deleteCollege($id)
    {
        $college = College::findOrFail($id);
        $college->delete();
        
        Session::flash('success_message', 'College Has Been deleted Successfully');
        return redirect()->back();
    }
    
    public function getDetail($id)
    {
        $college = College::find($id);
        return view('rmanager.college.view', compact('college'));
    }
    
     public function uploadexcel(Request $request)
    {
        return view('rmanager.college.uploadexcel');
    }

    public function uploadexcelcsv(Request $request)
    {
        
        $path= app_path();
        $filename= $path.'/college.csv';
        $row = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
                while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
                    //   echo '<pre>';print_r($data);continue;
                    $num = 4;
                    $row++;
                   if($row != 2 && $row < 2473)
                    { 
                    //  echo '<pre>';print_r($data);continue;
                        $College  = new College();
                        $College->name=trim($data[0]); 
                        $College->slug=trim($data[0]); 
                        $College->country_id=trim($data[1]);
                        $College->state_id=trim($data[2]);
                        $College->city_id=trim($data[3]);
                        $College->campus=trim($data[4]); 
                        $College->intake=$data[5];
                        $College->level_of_edu=trim($data[6]);
                        $College->application_fee=trim($data[7]);
                        $College->description=trim($data[8]);
                        $College->created_by = Auth()->user()->id;
                        $College->created_by_name = Auth()->user()->name;
                        $College->save();
        
                    }
    
                }
                $csvSave = new CSVUpload();
                if($request->hasFile('excel_college')){
                    $file = $request->file('excel_college');
                    $fileName = 'college' . rand(99,1000) . '-file.' . $file->getClientOriginalExtension();
                    $csvSave->file = $request->file('excel_college')->move('uploads/CSVFiles/', $fileName);
                    if($csvSave->file){
                        $csvSave->delete('uploads/CSVFiles/', $csvSave->photo);
                    }
                }
                $csvSave->created_by = auth()->user()->id;
                $csvSave->created_name = auth()->user()->name;
                $csvSave->save();
                
                Session::flash('success_message', 'College has been successfully added');
                        return redirect()->route('colleges.index');
            }
        }
}

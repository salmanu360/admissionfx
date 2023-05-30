<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CollegeController extends Controller
{
    public function index(Request $request)
    {
        //$colleges = College::where('created_by', auth()->user()->id)->with('country')->Latest()->get();
        $colleges = College::with('country')->Latest()->get();
        return view('recruiter.college.index', compact('colleges'));
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
        return view('recruiter.college.add',compact('countries'));
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
        
        // dd($college);
        $college->save();
    	Session::flash('success_message', 'College has been successfully added');
    	return redirect()->back();
    }
    
    
    public function editCollege($id)
    {
        $myCollege = College::findOrFail($id);
        $countries = Country::where('status', 1)->get();
        return view('recruiter.college.edit', compact('countries','myCollege'));
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
        return view('recruiter.college.view', compact('college'));
    }
}

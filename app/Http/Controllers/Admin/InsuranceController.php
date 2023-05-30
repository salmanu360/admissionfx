<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Package;
use App\Models\Insurance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class InsuranceController extends Controller
{
    public function Insurance()
    {
        $insurances = Insurance::all();
        // dd($categories);
        return view('admin.Insurance.index',compact('insurances'));
    }

    //add package
    public function addInsurance()
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.Insurance.add', compact('countries'));
        
    }

    //add package
    public function storeInsurance(Request $request)
    {
        
        
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
            'plan_name' => 'required|max:255',
            'coverage' => 'required',
            'destination' => 'required'
        ]);
        



        $insurance = new Insurance();
        $insurance->plan_name = $data['plan_name'];
        $insurance->coverage = $data['coverage'];
        $insurance->age_range1 = $data['age_range1'];
        $insurance->age_range2 = $data['age_range2'];
        $insurance->age_range3 = $data['age_range3'];
        $insurance->price1 = $data['price1'];
        $insurance->price2 = $data['price2'];
        $insurance->price3 = $data['price3'];
        $insurance->destination = $data['destination'];

        // if(empty($data['description'])){
        //     $insurance->description = "";
        // } else {
        //     $insurance->description = $data['description'];
        // }

        // if (empty($data['status'])){
        //     $insurance->status = 0;
        // } else {
        //     $insurance->status = 1;
        // }
        // if (empty($data['is_featured'])){
        //     $insurance->is_featured = 0;
        // } else {
        //     $insurance->is_featured = 1;
        // }
        $insurance->save();

        $lastid = $insurance->id;

        Session::flash('success_message', 'Insurance Has Been Added Successfully');
        return redirect()->back();

    }
    
    // edit packages
    
    public function editInsurance($id)
    {
        $countries = Country::where('status', 1)->get();
        $myPackage = Insurance::findOrFail($id);
        return view('admin.Insurance.edit', compact('myPackage','countries'));
    }
    
    //update package
    
    public function updateInsurance(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $insurance = Insurance::findOrFail($id);
        
        $insurance->plan_name = $data['plan_name'];
        $insurance->coverage = $data['coverage'];
        $insurance->age_range1 = $data['age_range1'];
        $insurance->age_range2 = $data['age_range2'];
        $insurance->age_range3 = $data['age_range3'];
        $insurance->price1 = $data['price1'];
        $insurance->price2 = $data['price2'];
        $insurance->price3 = $data['price3'];
        $insurance->destination = $data['destination'];

        $insurance->save();

        $lastid = $insurance->id;

        Session::flash('success_message', 'Package Has Been Update Successfully');
        return redirect()->back();
      
    }
    
    //delete packages
    

    
    public function deleteInsurance($id)
    {
        $package = Insurance::findOrFail($id);
        $package->delete();
        
        Session::flash('success_message', 'Package Has Been deleted Successfully');
        return redirect()->back();
    }

    
}

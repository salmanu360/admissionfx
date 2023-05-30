<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Package;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class PackageController extends Controller
{
    public function package()
    {
        $packages = Package::with('category')->get();
        // dd($categories);
        return view('admin.package.index',compact('packages'));
    }

    //add package
    public function addPackage()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('parent_id', 0)->where('status', 1)->get();
        $categories_dropdown = "<option value='' selected disabled>Select Category </option>";
        foreach($categories as $cat)
        {
            $categories_dropdown .= "<option value='". $cat->id ."'> ". $cat->name. " </option>";
            
        }
        return view('admin.package.add', compact('categories_dropdown','countries'));
        
    }

    //add package
    public function storePackage(Request $request)
    {
        
        
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
            'plan_type' => 'required|max:255',
            'category_id' => 'required'
        ]);
        
       $country_to = explode(",", $data['country_to']);


        $package = new Package();
        $package->user_id = auth()->user()->id;
        $package->p_name = $data['p_name'];
        $package->plan_type = $data['plan_type'];
        $package->slug = $country_to[0];
        $package->country_to = $country_to[1];
        // $package->country_from = $data['country_from'];
        $package->insurance = $data['insurance'];
        $package->price = $data['price'];
        $package->validity = $data['validity'];
        $package->visa_type = $data['visa_type'];
        $package->processing_time = $data['processing_time'];
        $package->entry_type = $data['entry_type'];
        $package->no_of_days = $data['no_of_days'];
        $package->stay = $data['stay'];
        $package->category_id = $data['category_id'];

        if(empty($data['description'])){
            $package->description = "";
        } else {
            $package->description = $data['description'];
        }

        if (empty($data['status'])){
            $package->status = 0;
        } else {
            $package->status = 1;
        }
        if (empty($data['is_featured'])){
            $package->is_featured = 0;
        } else {
            $package->is_featured = 1;
        }
        $package->save();

        $lastid = $package->id;

        Session::flash('success_message', 'Package Has Been Added Successfully');
        return redirect()->back();

    }
    
    // edit packages
    
    public function editPackage($id)
    {
        $myPackage = Package::findOrFail($id);
        // dd($myPlan);
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('parent_id', 0)->where('status', 1)->get();
        $categories_dropdown = "<option value='' selected disabled>Select Category </option>";
        
        foreach($categories as $cat)
        {
            if($cat->id == $myPackage->category_id){
                $selected = "selected";
            } else {
                $selected = "";
            }
            $categories_dropdown .= "<option value='". $cat->id ."' ". $selected .">".$cat->name."</option>";
            
        }
        return view('admin.package.edit', compact('countries', 'categories', 'categories_dropdown', 'myPackage'));
    }
    
    //update package
    
    public function updatePackage(Request $request, $id)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'plan_type' => 'required|max:255',    
        ]);
        $country_to = explode(",", $data['country_to']);
        $package = Package::findOrFail($id);
        
        $package->p_name = $data['p_name'];
        $package->plan_type = $data['plan_type'];
        $package->slug = $country_to[0];
        $package->country_to = $country_to[1];
        // $package->country_from = $data['country_from'];
        $package->insurance = $data['insurance'];
        $package->price = $data['price'];
        $package->validity = $data['validity'];
        $package->visa_type = $data['visa_type'];
        $package->processing_time = $data['processing_time'];
        $package->entry_type = $data['entry_type'];
        $package->no_of_days = $data['no_of_days'];
        $package->stay = $data['stay'];
        $package->category_id = $data['category_id'];

        if(empty($data['description'])){
            $package->description = "";
        } else {
            $package->description = $data['description'];
        }

        if (empty($data['status'])){
            $package->status = 0;
        } else {
            $package->status = 1;
        }
        if (empty($data['is_featured'])){
            $package->is_featured = 0;
        } else {
            $package->is_featured = 1;
        }
        $package->save();

        $lastid = $package->id;

        Session::flash('success_message', 'Package Has Been Update Successfully');
        return redirect()->back();
      
    }
    
    //delete packages
    

    
    public function deletePackage($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        
        Session::flash('success_message', 'Package Has Been deleted Successfully');
        return redirect()->back();
    }
    
}

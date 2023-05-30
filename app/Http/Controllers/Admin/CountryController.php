<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    // category index
    public function country()
    {
        $countries = Country::latest()->get();
    	return view('admin.country.index', compact('countries'));
    }

    //category add
    public function addCountry()
    {
        
        // dd($categories);
        return view('admin.country.add');
    }

    public function storeCountry(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
    		'name' => 'required|unique:countries',
    	]);
        $country = new Country();
    	$country->name = ucfirst($data['name']);
    	$country->slug =  Str::slug(ucfirst($data['name']));

    
    	if(empty($data['status'])){
    		$country->status = 0;
    	} else{
    		$country->status = 1;
    	}

    	$country->save();
    	Session::flash('success_message', 'Country has been successfully added');
    	return redirect()->route('country.index');
    }

    //edit Category
    public function editCountry($id)
    {
        $myCountry = Country::findOrFail($id);

        $countries = Country::orderBy('name', 'DESC')->get();
        return view('admin.country.edit', compact('countries', 'myCountry'));
    }

    //update Category

	public function updateCountry(Request $request, $id)
    {
    	$data = $request->all();
    	$validateData = $request->validate([
    		'name' => 'required|max:255',

    	]);
    	$country = Country::findOrFail($id);
    	$country->name = ucfirst($data['name']);
    	$country->slug =  Str::slug(ucfirst($data['name']));

    	if(empty($data['status'])){
    		$country->status = 0;
    	} else{
    		$country->status = 1;
    	}

    	$country->save();
    	Session::flash('success_message', 'Country has been successfully Updated');
    	return redirect()->route('country.index');
    }

	//delete category

	public function deleteCountry($id){
		$country = Country::findOrFail($id);
		$country->delete();
		
	    Session::flash('success_message', 'Country Has Been deleted Successfully');
	    return redirect()->back();
   }

}

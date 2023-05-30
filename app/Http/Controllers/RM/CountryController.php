<?php

namespace App\Http\Controllers\RM;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    // category index
    public function country()
    {
        $countries = Country::latest()->get();
    	return view('rmanager.country.index', compact('countries'));
    }

    //category add
    public function addCountry()
    {
        
        // dd($categories);
        return view('rmanager.country.add');
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
    	return redirect()->route('countries.index');
    }

    //edit Category
    public function editCountry($id)
    {
        $myCountry = Country::findOrFail($id);

        $countries = Country::orderBy('name', 'DESC')->get();
        return view('rmanager.country.edit', compact('countries', 'myCountry'));
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
    	return redirect()->route('countries.index');
    }

	//delete category

	public function deleteCountry($id){
		$country = Country::findOrFail($id);
		$country->delete();
		
	    Session::flash('success_message', 'Country Has Been deleted Successfully');
	    return redirect()->back();
   }
}

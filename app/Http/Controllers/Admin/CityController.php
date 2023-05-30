<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CityController extends Controller
{

    public function index(Request $request)
    {
        $cities = City::with('state')->latest()->get();
        return view('admin.city.index', compact('cities'));
    }

    public function create()
    {

        $states = State::all();
        return view('admin.city.create', compact('states'));
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->name = ucfirst($request->name);
        $city->slug = Str::slug(ucfirst($request->name));
        $city->state_id = $request->state_id;
        
        if (empty($request->status)) {
            $city->status = 0;
        } else {
            $city->status = 1;
        }
        
        $city->save();

        Session::flash('success_message', 'City has been successfully added');
        return redirect()->route('cities.index');
    }

    public function show(City $city)
    {
        abort(503);
    }


    public function edit($id)
    {
        $city = City::find($id);
        $states = State::all();
        return view('admin.city.update', compact('states', 'city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->name = ucfirst($request->name);
        $city->slug = Str::slug(ucfirst($request->name));
        $city->state_id = $request->state_id;
        
        if (empty($request->status)) {
            $city->status = 0;
        } else {
            $city->status = 1;
        }

        $city->update();

        Session::flash('success_message', 'City has been successfully updated');
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $City = City::findOrFail($id);
        $City->delete();
        Session::flash('success_message', 'City Has Been deleted Successfully');
        return redirect()->back();
    }

}

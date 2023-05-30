<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HighestLevelEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HighestLevelEducationController extends Controller
{
    public function index()
    {
        $eduactionlevels = HighestLevelEducation::latest()->get();
        return view('admin.highestleveleducation.index', compact('eduactionlevels'));
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $eduactionlevel = new HighestLevelEducation();
        $eduactionlevel->name = $request->name;
        $eduactionlevel->create_date = $request->date;
        $eduactionlevel->created_by = Auth()->user()->id;
        $eduactionlevel->save();
        Session::flash('success_message', 'Eduaction level created successfully');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $eduactionlevel = HighestLevelEducation::find($id);
        
        $eduactionlevel->name = $request->name;
        $eduactionlevel->create_date = $request->date;
        $eduactionlevel->created_by = Auth()->user()->id;
        $eduactionlevel->save();
        Session::flash('success_message', 'Eduaction level updated successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $eduactionlevel = HighestLevelEducation::find($id);
    
        $eduactionlevel->delete();
    
        return redirect()->back();
    }
}

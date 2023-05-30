<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradingScheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GradingSchemeController extends Controller
{
    public function index()
    {
        $gradings = GradingScheme::latest()->get();
        return view('admin.gradingscheme.index', compact('gradings'));
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $grading = new GradingScheme();
        $grading->name = $request->name;
        $grading->create_date = $request->date;
        $grading->created_by = Auth()->user()->id;
        $grading->save();
        Session::flash('success_message', 'Grading Scheme created successfully');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $grading = GradingScheme::find($id);
        
        $grading->name = $request->name;
        $grading->create_date = $request->date;
        $grading->created_by = Auth()->user()->id;
        $grading->save();
        Session::flash('success_message', 'Grading Scheme updated successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $grading = GradingScheme::find($id);
    
        $grading->delete();
    
        return redirect()->back();
    }
}

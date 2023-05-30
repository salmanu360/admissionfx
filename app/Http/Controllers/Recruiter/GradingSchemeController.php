<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\GradingScheme;
use Illuminate\Http\Request;

class GradingSchemeController extends Controller
{
    public function index()
    {
        $gradings = GradingScheme::where('created_by', auth()->user()->id)->latest()->get();
        return view('recruiter.gradingscheme.index', compact('gradings'));
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
        return redirect()->back()->with('success', 'Grading Scheme created successfully');
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
        
        return redirect()->back()->with('update', 'Grading Scheme updated successfully');
    }
    public function destroy($id)
    {
        $grading = GradingScheme::find($id);
    
        $grading->delete();
    
        return redirect()->back();
    }
}

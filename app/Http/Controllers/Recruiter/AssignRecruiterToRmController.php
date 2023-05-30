<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\AssignRecruiterToRm;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;

class AssignRecruiterToRmController extends Controller
{
    public function index()
    {
        $assigns = AssignRecruiterToRm::latest()->get();
        $recruiters = Recruiter::all();
        $rms = User::where('role', 'rm')->get();
        return view('admin.assignRecruiuterToRm.index', compact('assigns', 'recruiters', 'rms'));
    }
    
    public function recruiterrm()
    {
        
        $get_recruiter_id = Recruiter::where('user_id',auth()->user()->id)->first();
        $assigns = AssignRecruiterToRm::where('recruiter_id', $get_recruiter_id->id)->Latest()->get();
        $recruiters = Recruiter::all();
        $rms = User::where('role', 'rm')->get();
        return view('recruiter.assignRecruiuterToRm.recruiterrm', compact('assigns', 'recruiters', 'rms'));
    }
    
    
    public function create(Request $request){
        $request->validate([
            'recruiter' => 'required|unique:assign_recruiter_to_rms,recruiter_id',
            'rm' => 'required',
        ]);
        $assign = new AssignRecruiterToRm();
        $recruiterExplode = explode(':', $request->recruiter);
        $rmExplode = explode(':', $request->rm);

        $assign->recruiter_id = $recruiterExplode[0];
        $assign->recruiter_name = $recruiterExplode[1];
        $assign->rm_id = $rmExplode[0];
        $assign->rm_name = $rmExplode[1];
        $assign->created_by = Auth()->user()->id;
        $assign->created_by_name = Auth()->user()->name;
        $assign->save();
        return redirect()->back()->with('success', 'Assign Recruiter to rm successfully');
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'recruiter' => 'required',
            'rm' => 'required',
        ]);
        $assign = AssignRecruiterToRm::find($id);

        $recruiterExplode = explode(':', $request->recruiter);
        $rmExplode = explode(':', $request->rm);

        $assign->recruiter_id = $recruiterExplode[0];
        $assign->recruiter_name = $recruiterExplode[1];
        $assign->rm_id = $rmExplode[0];
        $assign->rm_name = $rmExplode[1];
        $assign->created_by = Auth()->user()->id;
        $assign->created_by_name = Auth()->user()->name;
        $assign->save();
        return redirect()->back()->with('update', 'Assign Recruiter to rm updated Successfully');
    }
    public function destroy($id)
    {
        $assign = AssignRecruiterToRm::find($id);
    
        $assign->delete();
    
        return redirect()->back();
    }
}

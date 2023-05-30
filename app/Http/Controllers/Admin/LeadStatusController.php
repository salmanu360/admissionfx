<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeadStatusController extends Controller
{
    public function index()
    {
        $leadStatus = LeadStatus::latest()->get();
        return view('admin.leadStatus.index', compact('leadStatus'));
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $leadStatus = new LeadStatus();
        $leadStatus->name = $request->name;
        $leadStatus->created_date = $request->date;
        $leadStatus->created_by = Auth()->user()->id;
        $leadStatus->created_by_name = Auth()->user()->name;
        $leadStatus->save();
        Session::flash('success_message', 'lead Status created successfully');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $leadStatus = LeadStatus::find($id);
        
        $leadStatus->name = $request->name;
        $leadStatus->created_date = $request->date;
        $leadStatus->created_by = Auth()->user()->id;
        $leadStatus->created_by_name = Auth()->user()->name;
        $leadStatus->save();
        Session::flash('success_message', 'lead Status updated successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $leadStatus = LeadStatus::find($id);
    
        $leadStatus->delete();
    
        return redirect()->back();
    }
}

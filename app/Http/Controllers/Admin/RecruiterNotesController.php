<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecruiterNotes;
use Illuminate\Http\Request;

class RecruiterNotesController extends Controller
{
    public function addNotes(Request $request){
        $request->validate([
            'notes' => 'required'
        ]);

        if($request->notes == ""){
            return redirect()->back()->with('empty', 'Notes Field are required');
        }

        $addNotes = new RecruiterNotes();
        $addNotes->recruiter_id = $request->id;
        $addNotes->notes = $request->notes;
        $addNotes->created_by = auth()->user()->id;
        $addNotes->created_by_name = auth()->user()->name;
        $addNotes->save();

        return redirect()->back()->with('add','Add Notes For Recruiter Successfully');

    }
}

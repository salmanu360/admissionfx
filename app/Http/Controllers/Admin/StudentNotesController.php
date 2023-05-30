<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentNotes;
use Illuminate\Http\Request;

class StudentNotesController extends Controller
{
    public function addNotes(Request $request){
        $request->validate([
            'notes' => 'required'
        ]);

        if($request->notes == ""){
            return redirect()->back()->with('empty', 'Notes Field are required');
        }

        $addNotes = new StudentNotes();
        $addNotes->student_id = $request->id;
        $addNotes->notes = $request->notes;
        $addNotes->created_by = auth()->user()->id;
        $addNotes->created_by_name = auth()->user()->name;
        $addNotes->status = 1;
        $addNotes->save();

        return redirect()->back()->with('add','Add Notes For Student Successfully');

    }

    public function notStudentNotes(Request $request){
        $request->validate([
            'notes' => 'required'
        ]);

        if($request->notes == ""){
            return redirect()->back()->with('empty', 'Notes Field are required');
        }

        $addNotes = new StudentNotes();
        $addNotes->student_id = $request->id;
        $addNotes->notes = $request->notes;
        $addNotes->created_by = auth()->user()->id;
        $addNotes->created_by_name = auth()->user()->name;
        $addNotes->status = 0;
        $addNotes->save();

        return redirect()->back()->with('add','Add Notes For Student Successfully');

    }
}

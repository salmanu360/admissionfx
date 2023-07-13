<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
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

        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'Student Eligible notes added';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Student';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $request->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();

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

        $notification =  new Notification();
        $notification->type ='Add';
        $notification->data = 'Student Not Eligible notes added';
        $notification->created_by = auth()->user()->name;
        $notification->role ='Admin';
        $notification->notifiable_type = 'App\Models\Student';
        $notification->causer_type = 'App\Models\Admin';
        $notification->notifiable_id = $request->id;
        $notification->causer_id = auth()->user()->id;
        $notification->save();
        return redirect()->back()->with('add','Add Notes For Student Successfully');

    }
}

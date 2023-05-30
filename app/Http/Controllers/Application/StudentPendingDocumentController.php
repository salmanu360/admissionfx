<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentPendingDocument;
use Illuminate\Http\Request;

class StudentPendingDocumentController extends Controller
{
    public function studentDocument(Request $request){
        $request->validate([
            'leadStatus'=>'required',
            'document'=>'required'
        ]);

        $documentPending = new StudentPendingDocument();

        $documentPending->student_id = $request->studentId;
        $documentPending->lead_status = $request->leadStatus;
        $documentPending->pending_document = $request->document;
        $documentPending->comment = $request->comment;
        $documentPending->created_by = auth()->user()->id;
        $documentPending->created_by_name = auth()->user()->name;

        $documentPending->save();

        Student::where('id', $documentPending->student_id)->update([
            'application_team_comment' => $documentPending->comment,
            'lead_status' => $documentPending->lead_status
        ]);

        return redirect()->back()->with('success', 'your responce is send');
    }

    public function leadStatusChange(Request $request){
        Student::where('id', $request->studentId)->update([
            'lead_status' => $request->leadStatus
        ]);
        return redirect()->back()->with('success', 'change the lead status');
    }
}

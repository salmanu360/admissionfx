<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudentApply;
use Illuminate\Http\Request;

class StudentApplyController extends Controller
{
    public function studentApply(Request $request, $id)
    {
        $request->validate([
            'student' => 'required',
            'course' => 'required',
        ]);

        $college = Course::find($id);
        $apply = new StudentApply();

        $apply->student_id = $request->student;
        $apply->created_by = auth()->user()->id;
        $apply->college_id =  $college->id;
        $apply->course_id = $request->course;

        $apply->save();

        return redirect()->back()->with('success', 'Apply to course successfully');

    }
}

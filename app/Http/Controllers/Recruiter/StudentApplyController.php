<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\StudentApply;
use Illuminate\Http\Request;
use App\Models\Course;

class StudentApplyController extends Controller
{
    public function studentApply(Request $request, $id)
    {
        $request->validate([
            'student' => 'required',
        ]);

        $course = Course::find($id);
        $apply = new StudentApply();

        $apply->student_id = $request->student;
        $apply->recruiter_id = auth()->user()->id;
        $apply->course_id = $course->id;
        $apply->college_id =  $course->college_id;

        $apply->save();

        return redirect()->back()->with('success', 'Apply to course successfully');

    }
}

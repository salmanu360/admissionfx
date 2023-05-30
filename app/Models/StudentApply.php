<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApply extends Model
{
    use HasFactory;
    protected $table = 'student_applies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'recruiter_id',
        'course_id',
        'college_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentApply extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'student_applies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'recruiter_id',
        'course_id',
        'college_id',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

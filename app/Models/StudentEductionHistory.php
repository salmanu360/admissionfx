<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentEductionHistory extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'student_eduction_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'country_education',
        'highest_level_edu',
        'grading_scheme',
        'created_by',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

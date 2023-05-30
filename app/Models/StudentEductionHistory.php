<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEductionHistory extends Model
{
    use HasFactory;
    protected $table = 'student_eduction_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'country_education',
        'highest_level_edu',
        'grading_scheme',
        'created_by',
    ];
}

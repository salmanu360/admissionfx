<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignRecruiterToRm extends Model
{
    use HasFactory;
    protected $table = 'assign_recruiter_to_rms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'recruiter_id',
        'recruiter_name',
        'rm_id',
        'rm_name',
        'created_by',
        'created_by_name',
    ];
}

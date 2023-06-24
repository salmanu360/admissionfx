<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'created_by', 'student_id', 'date_created'
    ];
}

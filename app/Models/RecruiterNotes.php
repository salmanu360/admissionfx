<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterNotes extends Model
{
    use HasFactory;
    protected $table = 'recruiter_notes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'recruiter_id',
        'notes',
        'created_by',
        'created_by_name',
    ];
}

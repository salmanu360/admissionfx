<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterPassword extends Model
{
    use HasFactory;
    protected $table = 'recruiter_passwords';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'recruiter_password'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPassword extends Model
{
    use HasFactory;
    protected $table = 'student_passwords';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'student_password'
    ];
}

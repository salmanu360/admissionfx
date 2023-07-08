<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentPassword extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'student_passwords';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'student_password'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

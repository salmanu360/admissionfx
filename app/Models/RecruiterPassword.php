<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class RecruiterPassword extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'recruiter_passwords';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'recruiter_password'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

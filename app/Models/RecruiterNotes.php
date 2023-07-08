<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class RecruiterNotes extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'recruiter_notes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'recruiter_id',
        'notes',
        'created_by',
        'created_by_name',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

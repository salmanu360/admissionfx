<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class RmUnlockHistory extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = false;
    protected $fillable = [
        'rm_id', 'lock_user', 'created_by', 'date_created'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

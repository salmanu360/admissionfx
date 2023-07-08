<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class LeadStatus extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'lead_statuses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'ctreatd_date',
        'created_by',
        'created_by_name'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

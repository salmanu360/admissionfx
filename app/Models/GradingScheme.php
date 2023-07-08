<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class GradingScheme extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'grading_schemes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'create_date',
        'created_by'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CSVUpload extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'c_s_v_uploads';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file',
        'created_by',
        'created_name',
        'created_date',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

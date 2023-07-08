<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Signature extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'signatures';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image',
        'file'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

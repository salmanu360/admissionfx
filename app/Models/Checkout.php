<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Checkout extends Model
{
    use HasFactory, LogsActivity;
    
    protected $fillable = [
        'package_id',
        'user_id',
        'date_travel',
        'primary_traveler',
        'mobile_number',
        'email',
        'gst_number',
        'state',
    ];
    
    protected $table = 'checkout';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }


    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function travelers()
    {
        return $this->hasMany(Travelers::class);
    }
}
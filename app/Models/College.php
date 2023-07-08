<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class College extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    
    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
    
    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }
}

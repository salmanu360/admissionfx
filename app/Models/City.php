<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'state_id', 'name', 'slug', 'status'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
    
    
    public function country()
    {
        return $this->hasMany(Country::class, 'country_id', 'id');
    }
}
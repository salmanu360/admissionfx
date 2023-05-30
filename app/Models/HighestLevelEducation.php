<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighestLevelEducation extends Model
{
    use HasFactory;
    protected $table = 'highest_level_education';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'create_date',
        'created_by'
    ];
}

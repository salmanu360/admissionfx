<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingScheme extends Model
{
    use HasFactory;
    protected $table = 'grading_schemes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'create_date',
        'created_by'
    ];
}

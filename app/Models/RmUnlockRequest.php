<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmUnlockRequest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'rm_id','status', 'date_created'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmUnlockHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'rm_id', 'lock_user', 'created_by', 'date_created'
    ];
}

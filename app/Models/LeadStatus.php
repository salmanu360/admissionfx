<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{
    use HasFactory;
    protected $table = 'lead_statuses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'ctreatd_date',
        'created_by',
        'created_by_name'
    ];
}

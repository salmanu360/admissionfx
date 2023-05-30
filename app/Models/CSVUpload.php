<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSVUpload extends Model
{
    use HasFactory;
    protected $table = 'c_s_v_uploads';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file',
        'created_by',
        'created_name',
        'created_date',
    ];
}

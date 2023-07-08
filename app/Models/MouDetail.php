<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class MouDetail extends Model
{
    use HasFactory, LogsActivity;
   protected $table = 'mou_detail';
   protected $primaryKey = 'id';
   protected $fillable = [
        'recruiter_id',
        'reference_id',
        'signature_image',
        'mou_agreement_file',
        'created_by'
   ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

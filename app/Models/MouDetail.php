<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouDetail extends Model
{
    use HasFactory;
   protected $table = 'mou_detail';
   protected $primaryKey = 'id';
   protected $fillable = [
        'recruiter_id',
        'reference_id',
        'signature_image',
        'mou_agreement_file',
        'created_by'
   ];
}

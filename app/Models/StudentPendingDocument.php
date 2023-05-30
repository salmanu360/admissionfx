<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPendingDocument extends Model
{
    use HasFactory;
    protected $table = 'student_pending_documents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'pending_document',
        'lead_status',
        'comment',
        'created_by',
        'created_by_name',
        'created_date'
    ];
}

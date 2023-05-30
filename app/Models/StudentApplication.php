<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    use HasFactory;
    
    protected $table = 'student_applications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'college_id',
        'course_id',
        'application_fee',
        'application_fee_status',
        'visa_fee',
        'visa_fee_status',
        'payment_date',
        'pay_status'
    ];
}

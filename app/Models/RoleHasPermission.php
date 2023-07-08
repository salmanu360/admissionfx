<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class RoleHasPermission extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'role_has_permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_id',
        'role_name',
        'permission_id',
        'permission_name',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_id',
        'role_name',
        'permission_id',
        'permission_name',
    ];
}

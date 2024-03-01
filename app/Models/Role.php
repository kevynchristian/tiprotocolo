<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [];

    public function userRole()
    {
        return $this->hasMany(\App\Models\RoleUser::class, 'role_id', 'id');
    }
}

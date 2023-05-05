<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $guarded = [];
    
    public function roleModel(){
        return $this->hasOne(Role::class,'id','role_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'roles_user';
    protected $fillable = [
        'user_id',
        'role_id',
    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function roleModel()
    {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }
}

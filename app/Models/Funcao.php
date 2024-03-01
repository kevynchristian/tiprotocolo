<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    protected $table = 'funcao';
    protected $fillable = [];

    public function funcionario()
    {
        return $this->belongsTo(\App\Models\Funcionario::class,'funcao', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';

    public function diretoriaModel(){
        return $this->hasMany(Diretoria::class,'diretoria_id','id');
    }
}

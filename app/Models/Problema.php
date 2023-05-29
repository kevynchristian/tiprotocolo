<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    protected $table = 'problemas';
    protected $guarded = [];
    public function escolaModel(){
        return $this->hasOne(AtendimentoEscola::class, 'id', 'evento_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = 'escola';
    protected $guarded = [];
    public $timestamps = false;
    
    public function atendimentoEscolaModel(){
        return $this->hasMany(AtendimentoEscola::class, 'escola', 'id');
    }
}

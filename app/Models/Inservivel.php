<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inservivel extends Model
{
    protected $table = 'inservivel';
    protected $guarded = [];

    public function equipamentoModel(){
        return $this->hasOne(ProtocoloTombamento::class,'id','id_protocolo_tombamento');
    }

    public function diretoriaModel(){
        return $this->hasOne(Diretoria::class, 'id' , 'diretoria_id');
    }

    public function setorModel(){
        return $this->hasOne(Setor::class , 'id_setor' , 'setor_id' );
    }
    public function acessoriosModel(){
         return $this->belongsTo(Equipamentos::class, 'id_equipamento', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProtocoloTombamento extends Model
{
    protected $table = 'protocolo_tombamento';
    protected $guarded = [];

    public $rules = [
        'id_protocolo'  => 'required|numeric',
        'tipo'          => 'required|numeric|min:1',
        'local'         => 'required|numeric|min:1',
        'prioridade'    => 'required|numeric',
        'desc'          => 'required|max:100'
    ];

    public function funcionarioModel(){
        return $this->hasOne(Funcionario::class,'id','id_responsavel');
    }

    public function statusModel(){
        return $this->hasOne(Status::class,'id','status');
    }

    public function protocoloModel(){
        return $this->belongsTo(Protocolo::class,'id_protocolo','id');
    }

    public function tipoModel(){
        return $this->hasOne(TipoDeEquipamento::class,'id','tipo');
    }

    public function localModel(){
        return $this->hasOne(Local::class,'id','local');
    }
}

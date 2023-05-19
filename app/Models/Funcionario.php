<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AtendimentoInterno;
use Illuminate\Support\Facades\DB;
use App\Models\AtendimentoEscola;

class Funcionario extends Model {

    protected $table = 'funcionario';
    protected $guarded = [];

    public function funcaoModel() {
        return $this->hasOne(Funcao::class, 'id', 'funcao');
    }
    public function protocoloTombamentoModel() {
        return $this->hasMany(ProtocoloTombamento::class, 'id_responsavel', 'id');
    }
    public function atendimentosInternosModel(){
        return $this->hasMany(AtendimentoInterno::class, 'funcionario', 'id');
    }
    public function atendimentosEscolasModel(){
        return $this->hasMany(AtendimentoEscola::class, 'funcionario_fez', 'id');
    }
    public function atendimentosInternos($ano = 0) {
        if( $ano == 0 ){
            return AtendimentoInterno::where('funcionario' , '=' , $this->id)
                ->count();
        }
        return AtendimentoInterno::where('data' , 'like' , $ano.'-%' )
                ->where('funcionario' , '=' , $this->id)
                ->count();
    }

    public function atendimentosEscolas($ano = 0) {
        if( $ano == 0 ){
            return AtendimentoEscola::where('funcionario_fez' , '=' , $this->id)
                ->count();
        }
        return AtendimentoEscola::where('inicio' , 'like' , $ano.'-%' )
                ->where('funcionario_fez' , '=' , $this->id)
                ->count();
    }

    public function consertosEmMaquinas($ano = 0) {
        if( $ano == 0 ){
            return DB::table('protocolo_tombamento')
                ->where('protocolo_tombamento.id_responsavel' , '=' , $this->id)
                ->join('protocolo' , 'protocolo_tombamento.id_protocolo' , '=' , 'protocolo.id')
                ->count();
        }
        return DB::table('protocolo_tombamento')
                ->where('protocolo_tombamento.id_responsavel' , '=' , $this->id)
                ->join('protocolo' , 'protocolo_tombamento.id_protocolo' , '=' , 'protocolo.id')
                ->where('protocolo.data' , 'like' , $ano.'-%' )
                ->count();
    }

}

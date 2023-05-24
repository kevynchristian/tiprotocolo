<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoInterno extends Model
{
    protected $table = 'atendimento_interno';
    protected $guarded = [];
    
    public $rules = [
        'funcionario'   => 'required|numeric|min:1',
        'data'          => 'required',
        'setor'         => 'required|numeric|min:1',
        'problema'      => 'required|min:5|max:255',
        'solucao'       => 'required|min:5|max:255'
    ];
    
    public $messages = [
        'funcionario.required'      => 'É obrigatório informar o funcionário!',
        'data.required'             => 'É obrigatório informar a data!',
        'setor.required'            => 'É obrigatório informar o setor!',
        'problema.required'         => 'É obrigatório informar o problema!',
        'problema.min'         => 'Problema com menos de 5 caracteres! Informe um pouco mais...',
        'solucao.min'          => 'Solução com menos de 5 caracteres! Informe um pouco mais...'
    ];
    
    public function setorModel(){
        return $this->hasOne(Setor::class,'id_setor','setor');
    }
    public function funcionarioModel(){
        return $this->belongsTo(Funcionario::class,'funcionario','id');
    }
    
    public function dataFormatada(){
        $data = $this->data;
        $ano = substr($data,0,4);
        $mes = substr($data,5,2);
        $dia = substr($data,8,2);
        return $dia.'/'.$mes.'/'.$ano;
    }
}

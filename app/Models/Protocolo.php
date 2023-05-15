<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProtocoloTombamento;

class Protocolo extends Model {

    protected $table = 'protocolo';
    protected $guarded = [];
    public $rules = [
        'escola' => 'required|numeric|min:1',
        'setor_interno' => 'required|numeric|min:0',
        'data' => 'required',
    ];

    public function escolaModel() {
        return $this->belongsTo(Escola::class, 'escola', 'id');
    }

    public function setor(){
        return $this->hasOne(Setor::class,'id_setor','setor_interno');
    }

    public function dataFormatada() {
        $data = $this->data;
        $ano = substr($data, 0, 4);
        $mes = substr($data, 5, 2);
        $dia = substr($data, 8, 2);
        return $dia . '/' . $mes . '/' . $ano;
    }

    public function equipamentos() {
        return ProtocoloTombamento::where('id_protocolo','=', $this->id)->get();
    }

    public function getDia(){
        $data = $this->data;
        $dia = substr($data, 8, 2);
        return $dia;
    }

    public function getMes(){
        $data = $this->data;
        $mes = substr($data, 5, 2);
        return $mes;
    }

    public function getAno(){
        $data = $this->data;
        $ano = substr($data, 2, 2);
        return $ano;
    }
    public function protocoloTombamentoModel()
    {
        return $this->hasMany(ProtocoloTombamento::class, 'id_protocolo', 'id');
    }
}

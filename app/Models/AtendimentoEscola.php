<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Problema;

class AtendimentoEscola extends Model
{
    protected $table = 'atendimento_escola';
    protected $guarded = [];
    
    public function countProblemasResolvidos(){
        return Problema::where('evento_id', '=', $this->id)
                ->where('feito','=',1)->count();
    }
    
    public function countProblemas(){
        return Problema::where('evento_id', '=', $this->id)->count();
    }
    public function problemaModel(){
        return $this->hasMany(Problema::class, 'evento_id', 'id');
    }
    public function userModel(){
        return $this->hasOne(User::class, 'id', 'funcionario_abriu');
    }
    public function escolaModel(){
        return $this->hasOne(Escola::class, 'id', 'escola');
    }
    public function funcionarioModel(){
        return $this->hasMany(Funcionario::class, 'id', 'funcionario_fez');
    }
    
}

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
    
}

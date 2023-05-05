<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diretoria extends Model
{
    protected $table = 'diretorias';
    protected $fillable = [];
    
    public function setorModel(){
        return $this->belongsTo(Setor::class,'id','diretoria_id');
    }
}

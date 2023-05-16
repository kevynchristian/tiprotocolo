<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['equipamento'];

    public function inservivelModel(){
        return $this->hasMany(Inservivel::class, 'id_equipamento', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor_ht extends Model
{
    protected $fillable = ['professor_cpf','professor_nome','professor_email','professor_senha'];

    //relacionando com a tabela unidades
    public function unidades(){

        return $this->hasMany('App\Unidade_ht');
    }
}

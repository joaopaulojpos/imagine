<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado_ht extends Model
{
    protected $fillable = ['estado_nome','estado_sigla','pais_id'];

    //relacionando com a tabela pais
    public function pais(){

        return $this->belongsTo('App\Pais_ht');
    }

    //relacionando com a tabela cidades
    public function cidades(){

        return $this->hasMany('App\Cidade_ht');
    }    
}

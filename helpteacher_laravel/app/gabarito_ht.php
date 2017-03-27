<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gabarito_ht extends Model
{
    protected $fillable = ['prova_id','gabarito_codigo','gabarito_data','gabarito_status'];

    //relacionando com a tabela questão
    public function questoes(){

        return $this->hasMany('App\Questao_ht');
    }

    //relacionando com a tabela prova
    public function prova(){

    	return $this->belongsTo('App\Prova_ht');
    }

}

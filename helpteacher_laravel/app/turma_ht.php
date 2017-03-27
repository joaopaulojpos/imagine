<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turma_ht extends Model
{
    protected $fillable = ['unidade_id','turma_codigo','turma_nome'];


    public function unidade(){

    	return $this->belongsTo('App\Unidade_ht');
    }

     public function disciplinas(){

        return $this->hasMany('App\Disciplina_ht');
    }
}

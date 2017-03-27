<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unidade_ht extends Model
{
    protected $fillable = ['instituicao_id','cidade_id','unidade_nome','unidade_endereco','unidade_telefone','unidade_email','unidade_senha'];

    public function instituicao(){

    	return $this->belongsTo('App\Instituicao_ht');
    }

    //relacionando com a tabela professores
    public function professores(){

        return $this->hasMany('App\Professor_ht');
    }
    //relacionando com a tabela turmas
    public function turmas(){

    	return $this->hasMany('App\Turma_ht');
    }

}

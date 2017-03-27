<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disciplina_ht extends Model
{
    protected $fillable = ['disciplina_codigo','disciplina_nome','turma_id'];

    public $rules = [

    	'disciplina_codigo' => 'required',
    	'disciplina_nome'   => 'required|min:5|max:60',
    	'turma_id'          => 'required',

    ];

    //relacionando com a tabela turmas
     public function turma(){

        return $this->belongsTo('App\Turma_ht');
    }
    //relacionando com a tabela assuntos
    public function assuntos(){

        return $this->hasMany('App\Assunto_ht');
    }
}

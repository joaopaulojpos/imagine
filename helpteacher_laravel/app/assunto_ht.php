<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assunto_ht extends Model
{
    protected $fillable = ['assunto_nome','disciplina_id'];

    public $rules = [

    	'assunto_nome'  => 'required|min:5|max:60',
    	'disciplina_id' => 'required',

    ];

    //relacionando com a tabela disciplinas
    public function disciplina(){

        return $this->belongsTo('App\Disciplina_ht');
    }

    //relacionando com a tabela provas
    public function provas(){

        return $this->hasMany('App\Prova_ht');
    }
}

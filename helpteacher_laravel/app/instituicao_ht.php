<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instituicao_ht extends Model
{
    protected $fillable = ['instituicao_cnpj','instituicao_nome'];

    //relacionando com a tabela unidade
    public function unidades(){

    	return $this->hasMany('App\Unidade_ht');
    }
}

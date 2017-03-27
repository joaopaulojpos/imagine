<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class correcao_ht extends Model
{
    protected $fillable = ['questao_id','correcao_numero','correcao_resposta']; 

    //relacionando com a tabela questoes
    public function questao()
    {
    	return $this->belongsTo('App\Questao_ht');
    }
}

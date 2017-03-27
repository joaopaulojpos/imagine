<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questao_ht extends Model
{
    protected $fillable = ['gabarito_id','questao_numero','questao_resposta','questao_nota'];

    //relacionando com a tabela correcoes
    public function correcao()
    {
    	return $this->hasOne('App\Correcao_ht');
    }

    //relacionando com a tabela gabaritos
    public function gabarito()
    {
    	return $this->belongsTo('App\Gabarito_ht');
    }

}

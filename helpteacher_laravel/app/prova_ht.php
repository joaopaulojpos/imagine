<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prova_ht extends Model
{
    protected $fillable = ['assunto_id','prova_status','prova_data'];    

    //relacionando com a tabela gabaritos
    public function gabarito(){

    	return $this->hasOne('App\Gabarito_ht');
    }

    //relacionando com a tabela assuntos
    public function assunto(){

        return $this->belongsTo('App\Assunto_ht');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pais_ht extends Model
{
    protected $fillable = ['pais_nome'];

    //relacionando com a tabela estados
    public function estados(){

        return $this->hasMany('App\Estado_ht');
    }    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cidade_ht extends Model
{
    protected $fillable = ['cidade_nome','estado_id'];

    //relacionando com a tabela estados
    public function estados(){

        return $this->belongsTo('App\Estado_ht');
    }
}

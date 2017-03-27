<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\questao_ht;
use App\gabarito_ht;
use App\correcao_ht;

class QuestoesController extends Controller
{    
    //cadastrando uma nova questão no banco de dados
    public function store(Request $request){

    	  $questao = new Questao_ht();
      	$insert = $questao -> create($request -> all());


            return redirect()->route('professor.gabarito.createGabarito');

    }

    //listando as questões cadastradas
    public function index(){    

      $questoes = Questao_ht::join('gabarito_hts', 'questao_hts.gabarito_id', '=', 'gabarito_hts.id')
      ->select('questao_hts.id as questaoId', 'questao_hts.gabarito_id as gabaritoIdFore','questao_hts.questao_numero as questaoNumero','questao_hts.questao_resposta as questaoResposta','questao_hts.questao_nota as questaoNota', 'gabarito_HTS.id as gabaritoId', 'gabarito_hts.gabarito_status as gabaritoStatus')
      ->get();
        

        return view('professor.questao.questoes',[

             'questoes' => $questoes,

             ]);

    }
   
}

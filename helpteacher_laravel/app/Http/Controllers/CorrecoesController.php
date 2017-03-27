<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\correcao_ht;
use App\questao_ht;
use App\gabarito_ht;
use App\prova_ht;

class CorrecoesController extends Controller
{	

     public function create(){
        
        $questoes = Questao_ht::join('gabarito_hts','gabarito_hts.id', '=', 'questao_hts.gabarito_id')
        ->select('questao_hts.id as questaoId','questao_hts.questao_numero as questaoNumero','questao_hts.questao_nota as questaoNota','questao_hts.gabarito_id as gabaritoIdFore','gabarito_hts.id as gabaritoId','gabarito_hts.gabarito_codigo as gabaritoCodigo')
        ->get();

        return view('professor.correcao.createCorrecao',[

            'questoes' => $questoes,

            ])->with('gabaritos',Gabarito_ht::all())->with('correcoes',Correcao_ht::all());
        
    }
    

    public function store(Request $request){

    	$correcao = new Correcao_ht();
      	$correcao -> create($request -> all());

    	return redirect()->route('professor.correcao.create');
    } 

    public function list(){



    }
 
}

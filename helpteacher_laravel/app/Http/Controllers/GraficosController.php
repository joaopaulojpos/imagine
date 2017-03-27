<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\turma_ht;
use App\disciplina_ht;
use App\assunto_ht;
use App\prova_ht;
use App\gabarito_ht;
use App\questao_ht;
use App\correcao_ht;

class GraficosController extends Controller
{

    public function mostrarGraficoAssuntos(){
        
        $assuntos = Assunto_ht::join('prova_hts', 'prova_hts.assunto_id', '=', 'assunto_hts.id')
                               ->join('gabarito_hts','gabarito_hts.prova_id', '=', 'prova_hts.id')
                               ->join('questao_hts','questao_hts.gabarito_id', '=', 'gabarito_hts.id')
                               ->join('correcao_hts','correcao_hts.questao_id', '=', 'questao_hts.id')
        ->selectRaw('assunto_hts.*, count(questao_hts.questao_numero) as total_acertos')
        ->groupBy('assunto_hts.id')
        ->get();
        return view('unidade.graficos.graficoAssuntos',[

            'assuntos' => $assuntos
            ]);
    }

    public function mostrarGraficoTurmas(){
        
        $turmas = Turma_ht::join('disciplina_hts', 'disciplina_hts.turma_id', '=', 'turma_hts.id')
                               ->join('assunto_hts','assunto_hts.disciplina_id', '=', 'disciplina_hts.id')
                               ->join('prova_hts','prova_hts.assunto_id', '=', 'assunto_hts.id')
                               ->join('gabarito_hts','gabarito_hts.prova_id', '=', 'prova_hts.id')
                               ->join('questao_hts','questao_hts.gabarito_id', '=', 'gabarito_hts.id')
                               ->join('correcao_hts','correcao_hts.questao_id', '=', 'questao_hts.id') 
        ->selectRaw('turma_hts.*, count(questao_hts.questao_numero) as total_acertos')        
        ->groupBy('turma_hts.id')
        ->get();
        return view('unidade.graficos.graficoTurmas',[

            'turmas' => $turmas
            ]);
    }
   
}

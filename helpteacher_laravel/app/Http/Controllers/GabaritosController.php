<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\gabarito_ht;
use App\prova_ht;
use Carbon\Carbon;

class GabaritosController extends Controller
{
    //redirecionando para a view de cadastro do gabarito
    public function create(){

    	return view('professor.gabarito.createGabarito')->with('provas', Prova_ht::all());
    }

    //cadastrando um novo gabarito no banco de dados
    public function store(Request $request){

        //validação dos campos do formulário de cadastro
        $this->validate($request, [

               'gabarito_codigo'           => 'required|unique:gabarito_hts,gabarito_codigo',

            ],[

               'gabarito_codigo.required'  => 'O campo código é de preenchimento obrigatório.',
               'gabarito_codigo.unique'    => 'Já existe um gabarito cadastrado com o código informado.',

            ]);

    	$gabarito = $request->all();
        $gabarito['gabarito_data'] = Carbon::createFromFormat('d/m/Y', $request->gabarito_data)->format('Y/m/d');
        $insert = Gabarito_ht::create($gabarito);

         if(!$insert)

            return redirect()->route('professor.gabarito.create');

        else

            return redirect()->route('professor.gabarito.index')->with('success_message', 'Gabarito cadastrado com sucesso.');

    }

    //listando os gabaritos cadastrados
    public function index(){


        $gabaritos = Gabarito_ht::join('prova_hts','gabarito_hts.prova_id', '=', 'prova_hts.id')
        ->select('gabarito_hts.id as gabaritoId', 'gabarito_hts.prova_id as provaIdFore', 'gabarito_hts.gabarito_codigo as gabaritoCodigo', 'gabarito_hts.gabarito_data as gabaritoData','gabarito_hts.gabarito_status as gabaritoStatus','prova_hts.id as provaId','prova_hts.prova_status as provaStatus', 'prova_hts.prova_data as provaData')
        ->get();

        return view('professor.gabarito.gabaritos',[

            'gabaritos' => $gabaritos

            ]);
    }

    //editando uma prova escolhida por id
    public function edit($id){

        //recuperando o gabarito pelo id para edição
        $gabarito = Gabarito_ht::find($id);

        return view('professor.gabarito.editGabarito')->with('provas',Prova_ht::all())->with('gabarito',$gabarito);


    }
    //atualizando os dados de um gabarito no banco de dados
    public function update(Request $request, $id){

        //retorna todos os dados do formulário
        $gabaritoDados = $request->all();
        $gabaritoDados["gabarito_status"] = (!isset($gabaritoDados['gabarito_status'])) ? 'inativo' : 'ativo';
        $gabaritoDados['gabarito_data'] = Carbon::createFromFormat('d/m/Y', $request->gabarito_data)->format('Y/m/d');
        $gabarito = Gabarito_ht::find($id);
        $update = $gabarito -> update($gabaritoDados);

        if(!$update)

            return redirect()->route('professor.gabarito.edit', $id)->with(['erros'=>'Falha ao atualizar.']);

        else

            return redirect()->route('professor.gabarito.index')->with('success_message', 'Gabarito atualizado com sucesso.');

    }

    public function remove(){

    }

}

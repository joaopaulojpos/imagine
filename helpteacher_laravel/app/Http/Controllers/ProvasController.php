<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\prova_ht;
use App\assunto_ht;
use Carbon\Carbon;

class ProvasController extends Controller
{
    //redirecionando para a view de cadastro da prova
    public function create(){

    	return view('professor.prova.createProva')->with('assuntos', Assunto_ht::all());
    }

    //cadastrando uma nova prova no banco de dados
    public function store(Request $request){

        $prova = $request->all();
        $prova['prova_data'] = Carbon::createFromFormat('d/m/Y', $request->prova_data)->format('Y/m/d');
        $insert = Prova_ht::create($prova);

         if(!$insert)

            return redirect()->route('professor.prova.create');

        else

            return redirect()->route('professor.prova.index')->with('success_message', 'Prova cadastrada com sucesso.');
    
    }

    //listando as provas cadastradas
    public function index(){

        $provas = Prova_ht::join('assunto_hts','assunto_hts.id','=','prova_hts.assunto_id')
            ->select('prova_hts.*', 'assunto_hts.assunto_nome')
            ->get();

        return view('professor.prova.provas',[

            'provas' => $provas
            ]);
    }
    
    //editando uma prova escolhida por id
    public function edit($id){

        $prova = Prova_ht::find($id);

        return view('professor.prova.editProva')->with('assuntos',Assunto_ht::all())->with('prova',$prova);

    }
    //atualizando os dados de uma prova no banco de dados
    public function update(Request $request, $id){

        //retornando todos os dados do formulário
        $provaDados = $request->all();
        //verificação de status checked
        $provaDados['prova_status'] = (!isset($provaDados['prova_status'])) ? 'inativo' : 'ativo';
        //Convertendo o formato da data
        $provaDados['prova_data'] = Carbon::createFromFormat('d/m/Y', $request->prova_data)->format('Y/m/d');
        //encontrando a prova pelo id
        $prova = Prova_ht::find($id);
        //atualizando os dados no banco de dados
        $update = $prova->update($provaDados);

        //verificando se houve a atualização e definindo rota de retorno
        if (!$update)
            
            return redirect()->route('professor.prova.edit');
        
        else

            return redirect()->route('professor.prova.index')->with('success_message', 'Prova atualizada com sucesso.');

    }

    public function remove(){

    }
}

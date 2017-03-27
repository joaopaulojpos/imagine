<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\assunto_ht;
use App\disciplina_ht;

class AssuntosController extends Controller
{
    //redirecionando para a view de cadastro do assunto
    public function create(){

    	return view('administrador.assunto.createAssunto')->with('disciplinas', Disciplina_ht::all());
    }

    //cadastrando um novo assunto no banco de dados
    public function store(Request $request){

        //Validando os dados antes de cadastrar
        $this->validate($request, [

               'assunto_nome'            => 'required|unique:assunto_hts,assunto_nome|min:5|max:60',                

            ],[

               'assunto_nome.required'   => 'O campo nome é de preenchimento obrigatório.', 
               'assunto_nome.unique'     => 'O assunto já encontra-se cadastrado.',
               'assunto_nome.min'        => 'Nome: Mínimo de 5 caracteres.',
               'assunto_nome.max'        => 'Nome: Máximo de 60 caracteres.',
            ]);

    	$assunto = new Assunto_ht();        
        $insert = $assunto -> create($request->all());

        if(!$insert)

            return redirect()->route('admins.assunto.create');

        else

            return redirect()->route('admins.assunto.index')->with('success_message', 'Assunto cadastrado com sucesso.');

    }

    //listando os assuntos cadastrados
    public function index(){

        $assuntos = Assunto_ht::join('disciplina_hts','disciplina_hts.id','=','assunto_hts.disciplina_id')
            ->select('assunto_hts.*','disciplina_hts.disciplina_nome')
            ->get();
        return view('administrador.assunto.assuntos',[

            'assuntos' => $assuntos
            
            ]);

    }

    public function edit(){

    }

    public function remove(){

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\professor_ht;

class ProfessoresController extends Controller
{
    private $totalRegistros = 5;

    //redirecionando para a view de cadastro do professor
    public function create(){

    	return view('administrador.professor.createProfessor');
    }


    //cadastrando um novo professor no banco de dados
    public function store(Request $request){

        //validação dos campos do formulário de cadastro
        $this->validate($request, [

               'professor_cpf'               => ['required','regex:/^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}/'],
               'professor_nome'              => 'required|min:3|max:70',
               'professor_email'             => 'required|email|max:60',
               'professor_senha'             => 'required|min:6|max:60',

            ],[

               'professor_cpf.required'      => 'O campo cpf é de preenchimento obrigatório.',
               'professor_cpf.regex'         => 'CPF inválido.',
               'professor_nome.required'     => 'O campo nome é de preenchimento obrigatório.',
               'professor_nome.min'          => 'Nome: Mínimo de 5 caracteres.',
               'professor_nome.max'          => 'Nome: Máximo de 60 caracteres.',
               'professor_email.required'    => 'O campo email é de preenchimento obrigatório.',
               'professor_email.email'       => 'Informe um e-mail válido.',
               'professor_email.max'         => 'E-mail: Máximo de 60 caracteres.',
               'professor_senha.required'    => 'O campo senha é de preenchimento obrigatório.',
               'professor_senha.min'         => 'Senha: Mínimo de 6 digitos.',
               'professor_senha.max'         => 'Senha: Máximo de 60 digitos.',

            ]);

    	  $professor = new Professor_ht();

        $insert = $professor -> create($request->all());

        if(!$insert)

            return redirect()->route('admins.professor.create');

        else

            return redirect() -> route('admins.professor.index')->with('success_message', 'Professor cadastrado com sucesso.');

    }


    //listando os professores cadastrados
    public function index(){

        $professores = Professor_ht::paginate($this->totalRegistros);

        return view('administrador.professor.professores',[

             'professores' => $professores
         ]);
    }

    /*public function editar(){

    }*/

    /*public function remover(){
    	
    }*/
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\unidade_ht;
use App\instituicao_ht;
use App\cidade_ht;

class UnidadesController extends Controller
{
   private $totalRegistros = 5;

   //redirecionando para a view para cadastro da unidade
   public function create(){

   	return view('administrador.unidade.createUnidade')->with('instituicoes', Instituicao_ht::all())->with('cidades',Cidade_ht::all());
   }

   //cadastrando uma novo unidade no banco de dados
   public function store(Request $request){

      //Validando os dados antes de cadastrar
      $this->validate($request, [

               'unidade_nome'                 => 'required|min:5|max:60',
               'unidade_endereco'             => 'required|min:10|max:100',
               'unidade_telefone'             => ['required','regex:/^(\(11\) [9][0-9]{4}-[0-9]{4})|(\(1[2-9]\) [5-9][0-9]{3}-[0-9]{4})|(\([2-9][1-9]\) [1-9][0-9]{3}-[0-9]{4})$/'],
               'unidade_email'                => 'required|email|max:60',
               'unidade_senha'                => 'required|min:6|max:60',

            ],[

               'unidade_nome.required'        => 'O campo nome é de preenchimento obrigatório.',
               'unidade_nome.min'             => 'Nome: Mínimo de 5 caracteres.',
               'unidade_nome.max'             => 'Nome: Máximo de 60 caracteres.',
               'unidade_endereco.required'    => 'O campo endereco é de preenchimento obrigatório.',
               'unidade_endereco.min'         => 'Endereço: Mínimo de 10 caracteres.',
               'unidade_endereco.max'         => 'Endereço: Máximo de 100 caracteres.',
               'unidade_telefone.required'    => 'O campo telefone é de preenchimento obrigatório.',
               'unidade_telefone.regex'       => 'Telefone inválido.',
               'unidade_email.required'       => 'O campo e-mail é de preenchimento obrigatório.',
               'unidade_email.email'          => 'Informe um e-mail válido',
               'unidade_email.max'            => 'Senha: Máximo de 60 caracteres.',
               'unidade_senha.min'            => 'Senha: Mínimo de 6 digitos.',
               'unidade_senha.max'            => 'Senha: Mínimo de 60 digitos.',
               

            ]);


   	$unidade = new Unidade_ht();
      $insert = $unidade -> create($request -> all());

       if(!$insert)

            return redirect()->route('admins.unidade.create');

        else

            return redirect()->route('admins.unidade.index')->with('success_message', 'Unidade cadastrada com sucesso.');

   }

   //listando as unidades cadastradas
   public function index(){

      $unidades = Unidade_ht::paginate($this->totalRegistros);

      return view('administrador.unidade.unidades',[

             'unidades' => $unidades
         ]);

   }

   public function edit(){
   	
   }

   public function remove(){

   }
}

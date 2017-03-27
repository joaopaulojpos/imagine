<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\instituicao_ht;

class InstituicoesController extends Controller
{

  private $totalRegistros = 5;
    //redirecionando para a view de cadastro da instituição
    public function create()
    {

    	return view('administrador.instituicao.createInstituicao');
    }

    //cadastrando uma nova instituição no banco de dados
    public function store(Request $request)
    {        
        //validação dos campos do formulário de cadastro
        $this->validate($request, [

               'instituicao_cnpj'           => ['required','regex:/^(\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2})$/'],
               'instituicao_nome'           => 'required|min:5|max:45',

            ],[

               'instituicao_cnpj.required'  => 'O campo cnpj é de preenchimento obrigatório.',
               'instituicao_cnpj.regex'     => 'CNPJ inválido.',
               'instituicao_nome.required'  => 'Informe o nome da Instituição.',
               'instituicao_nome.min'       => 'Nome: Mínimo de 5 caracteres.',
               'instituicao_nome.max'       => 'Nome: Máximo de 45 caracteres.',
            ]);

        $instituicao = new Instituicao_ht();
        
        $insert = $instituicao->create($request->all());

        if(!$insert)

            return redirect()->route('admins.instituicao.create');

        else

            return redirect()->route('admins.instituicao.index')->with('success_message', 'Instituição cadastrada com sucesso.');
        
    }

    //listando as instituições cadastradas
    public function index()
    {
        //definindo quantos registros devem ser listados por paginação
        $instituicoes = Instituicao_ht::paginate($this->totalRegistros);

        return view('administrador.instituicao.instituicoes',[

                'instituicoes' => $instituicoes
            ]);        
    }

}

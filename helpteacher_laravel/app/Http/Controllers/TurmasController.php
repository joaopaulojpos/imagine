<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\turma_ht;
use App\unidade_ht;

class TurmasController extends Controller
{
    private $totalRegistros = 5;

    //redirecionando para a view de cadastro da turma
    public function create(){

    	return view('administrador.turma.createTurmas')->with('unidades',Unidade_ht::all());
    }

    //cadastrando uma nova turma no banco de dados
    public function store(Request $request){

        //Validando os dados antes de cadastrar
        $this->validate($request, [

               'turma_codigo'           => 'required|numeric',

            ],[

               'turma_codigo.required'  => 'O campo codigo é de preenchimento obrigatório.',
            ]);

    	  $turma = new Turma_ht();
          $insert = $turma -> create($request->all());

         if(!$insert)

            return redirect()->route('admins.turma.create');

        else

            return redirect()->route('admins.turma.index')->with('success_message', 'Turma cadastrada com sucesso.');
    }

    //listando as turmas cadastradas
    public function index(){

        $turmas = Turma_ht::paginate($this->totalRegistros);

        return view('administrador.turma.turmas',[

                'turmas' => $turmas
            ]);

    }

    public function edita(){

    }

    public function remove(){

    }
}

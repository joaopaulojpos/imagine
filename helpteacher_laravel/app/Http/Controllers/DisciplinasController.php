<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\disciplina_ht;
use App\turma_ht;

class DisciplinasController extends Controller
{
    //redirecionando para a view de cadastro da disciplina
    public function create(){

    	return view('administrador.disciplina.createDisciplina')->with('turmas',Turma_ht::all());
    }

    //cadastrando uma nova disciplina no banco de dados
    public function store(Request $request){



        //validação dos campos do formulário de cadastro
        $this->validate($request, [

               'disciplina_codigo'           => 'required|unique:disciplina_hts,disciplina_codigo',
               'disciplina_nome'             => 'required|unique:disciplina_hts,disciplina_nome|min:5|max:60',

            ],[

               'disciplina_codigo.required'  => 'O campo código é de preenchimento obrigatório.',
               'disciplina_codigo.unique'    => 'Já existe uma disciplina cadastrada com o código informado.',
               'disciplina_nome.required'    => 'O campo nome é de preenchimento obrigatório.',
               'disciplina_nome.unique'      => 'A disciplina já encontra-se cadastrada.',
               'disciplina_nome.min'         => 'Nome: Mínimo de 5 caracteres.',
               'disciplina_nome.max'         => 'Nome: Máximo de 60 caracteres.',
               
            ]);

    	$disciplina = new Disciplina_ht();

        $insert = $disciplina -> create($request->all());

        if(!$insert)

            return redirect()->route('inst.disciplina.create');

        else

            return redirect()->route('inst.disciplina.index')->with('success_message', 'Disciplina cadastrada com sucesso.');

    }

    //listando as disciplinas cadastradas
    public function index(){

        $disciplinas = Disciplina_ht::join('turma_hts','turma_hts.id','=','disciplina_hts.turma_id')
            ->select('disciplina_hts.*','turma_hts.turma_nome')
            ->get();
        return view('administrador.disciplina.disciplinas',[

            'disciplinas' => $disciplinas
            ]);
    }

    public function editar(){

    }

    public function remover(){

    }
}

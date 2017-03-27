    @extends('layouts.layoutDisciplina')
    @section('container')

    <!--Mensagem de validação dos campos-->
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif 
    
    <!--cadastrando a disciplina no banco de dados-->             
    <form method="post" action="{{route('admins.disciplina.store')}}"> 
        <div class="row">      
        <div class="page-header">
            <h1>Cadastrar Disciplinas</h1>
            <div class="btn-lateral"> 
                <button  type="submit" class="btn btn-primary btn-md"  name="salvar">
                Salvar  
                </button>                           
            </div>           
        </div>
        </div>   
        {{csrf_field()}}
        <div class="form-group row">
            <div class="col-md-4">
                <label for="disciplina_codigo">Disciplina:</label>
                <input type="number" min="1" class="form-control" id="disciplina_codigo" name="disciplina_codigo" value="{{old('disciplina_codigo')}}" autofocus required>
            </div>
            <div class="col-md-4">
                <label for="disciplina_nome">Nome:</label>
                <input type="text" class="form-control" id="disciplina_nome" name="disciplina_nome" value="{{old('disciplina_nome')}}" required>
            </div>
            <div class="col-md-4">
                <label for="turma_id">Turma:</label>
                <select class="form-control" name="turma_id" required>
                    <option value="" selected>Selecione</option>
                        @foreach ($turmas as $turma)
                        <option value="{{$turma -> id}}">{{$turma -> turma_nome}}</option>
                        @endforeach
                </select>
            </div> 
        </div>
        </div>
    </form>
    @endsection

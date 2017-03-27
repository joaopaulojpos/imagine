    @extends('layouts.layoutAssunto')
    @section('container')

    <!--Mensagem de validação dos campos-->
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif 

    <div class="container">
    <!--cadastrando o assunto no banco de dados-->             
    <form method="post" action="{{route('admins.assunto.store')}}"> 
        <div class="row">      
        <div class="page-header">        
            <h1>Cadastrar Assunto</h1>
            <div class="btn-lateral">   
                <button  type="submit" class="btn btn-primary btn-md"  name="salvar">
                Salvar  
                </button>                        
            </div>           
        </div>
        </div>   
        {{csrf_field()}}
        <div class="form-group row">        
            <div class="col-md-6">
                <label for="assunto_nome">Nome:</label>
                <input type="text" class="form-control" id="assunto_nome" name="assunto_nome" value="{{old('assunto_nome')}}" autofocus required>
            </div>

            <div class="col-md-6">
                <label for="disciplina_id">Disciplina:</label>
                <select class="form-control" name="disciplina_id" id="disciplina_id" value="{{old('disciplina_id')}}" required>
                    <option value="" selected>Selecione</option>
                        @foreach($disciplinas as $disciplina)
                        <option value="{{$disciplina -> id}}">{{$disciplina ->disciplina_nome}}</option>
                        @endforeach
                </select>
            </div>            
        </div>
        </div>
    </form>
    </div><!--container-->
    @endsection

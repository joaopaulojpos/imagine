    @extends('layouts.layoutProva')
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
     <!--cadastrando a prova no banco de dados--> 
	<form method="post" action="{{route('professor.prova.store')}}">
        <div class="row">      
        <div class="page-header">
            <h1>Cadastrar Prova</h1>
            <div class="btn-lateral">
                <button  type="submit" class="btn btn-primary btn-md" name="salvar">
                Salvar  
                </button>                           
            </div>           
        </div>
        </div>   
        {{csrf_field()}}           
        <div class="form-group row">        
            <div class="col-md-6">
                <label for="assunto_id">Assunto:</label>
                <select class="form-control" name="assunto_id" id="assunto_id" autofocus required>
                    <option value="" selected="selected">Selecione</option>
                        @foreach($assuntos as $assunto)                    
                        <option value="{{$assunto -> id}}">{{$assunto -> assunto_nome}}</option>
                        @endforeach
                </select>
            </div>                    

            <div class="col-md-6">
                <label for="prova_data">Data:</label>
                <input type="date" class="form-control" name="prova_data" id="prova_data" required/>
            </div>  
        </div> 
        </div>   
    </form>
    </div>
    @endsection

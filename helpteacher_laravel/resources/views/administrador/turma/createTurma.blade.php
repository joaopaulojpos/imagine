    @extends('layouts.layoutTurma')
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
    <!--cadastrando a turma no banco de dados-->          
    <form method="post" action="{{route('admins.turma.store')}}">
        <div class="row">      
        <div class="page-header">
            <h1>Cadastrar Turma</h1>
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
                <label for="unidade_id">Unidade:</label>
                <select class="form-control" name="unidade_id" autofocus required>
                    <option value="" selected>Selecione</option>
                        @foreach ($unidades as $unidade)
                        <option value="{{$unidade -> id}}">{{$unidade -> unidade_nome}}</option>
                        @endforeach
                </select>
            </div>       

            <div class="col-md-4">
                <label for="turma_codigo">Turma:</label>
                <input type="number" min="1" class="form-control" id="turma_codigo" name="turma_codigo" value="{{old('turma_codigo')}}" required/>                
            </div>

            <div class="col-md-4">
                <label for="turma_nome">Nome:</label>
                <select class="form-control" name="turma_nome" required>
                    <option value="" selected>Selecione</option>
                    <option value="1º Ano A">1º Ano - Turma A</option>
                    <option value="1º Ano B">1º Ano - Turma B</option>                    
                    <option value="2º Ano A">2º Ano - Turma A</option>                    
                    <option value="2º Ano B">2º Ano - Turma B</option>
                    <option value="3º Ano A">3º Ano - Turma A</option>
                    <option value="3º Ano B">3º Ano - Turma B</option>                    
                </select>
            </div>                         
        </div> 
        </div>
    </form>
    </div>
    @endsection

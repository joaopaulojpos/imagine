    @extends('layouts.layoutGabarito')
    @section('container')

    <!--Mensagem de erro na validação dos campos-->
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif 
   
    <div class="container">
    <form method="post" action="{{route('professor.gabarito.store')}}">      
    <div class="page-header">  
    <h1>Cadastrar Gabarito</h1>
        <div class="btn-lateral">                         
            <button  type="submit" class="btn btn-primary btn-md"  name="salvar">
            Salvar  
            </button> 
        </div>
    </div>        
        {{csrf_field()}}
        <div class="form-group row">
        <div class="col-md-12">
            <label for="prova_id">Data da Prova:</label>
            <select class="form-control" name="prova_id" id="prova_id" required>
                <option value="">Selecione</option>
                @foreach($provas as $prova)
                @if($prova->prova_status == 'ativo')
                <option value="{{$prova -> id}}">{{date('d/m/Y',strtotime($prova -> prova_data))}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <label for="gabarito_codigo">Código:</label>
            <input type="number" min="1" class="form-control" id="gabarito_codigo" name="gabarito_codigo" value="{{('gabarito_codigo')}}" required />
        </div>

        <div class="col-md-12">
            <label for="gabarito_data">Data:</label>
            <input type="date" class="form-control" id="gabarito_data" name="gabarito_data" value="{{date('d/m/Y')}}" />
        </div>              
        </div>
        </div>
    </form>
    </div>
    @endsection
   
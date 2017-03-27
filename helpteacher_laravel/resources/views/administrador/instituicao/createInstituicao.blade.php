    @extends('layouts.layoutInstituicao')
    @section('container')   

    <div class="container theme-showcase"> 
	<!--Mensagem de validação dos campos-->
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif    
	
    <!--cadastrando a instituição no banco de dados--> 
    <form method="post" action="{{route('admins.instituicao.store')}}">
    {{csrf_field()}}
    <div class="page-header">
    <h1 class="h2-instituicao">Cadastrar Instituição</h1>
        <div class="btn-lateral">
        <button  type="submit" class="btn btn-primary btn-md" name="cadastrar">
         Cadastrar  
        </button>
        </div>
    </div>          
        <div class="form-group row">
        <div class="col-md-12">            
            <label for="instituicao_cnpj">CNPJ:</label>
            <input type="text" class="form-control" id="instituicao_cnpj" name="instituicao_cnpj" value="{{old('instituicao_cnpj')}}" autofocus required/>
        </div> 
        </div>            

        <div class="form-group row">
        <div class="col-md-12">
           <label for="instituicao_nome">Nome:</label>
           <input type="text" class="form-control" id="instituicao_nome" name="instituicao_nome" value="{{old('instituicao_nome')}}" required/>
        </div>              
        </div>        
    </form>
    </div>   
    @endsection
   
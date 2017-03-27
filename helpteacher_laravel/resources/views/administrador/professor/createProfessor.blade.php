    @extends('layouts.layoutProfessor')
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
    <!--cadastrando o professor no banco de dados-->  
    <form method="post" action="{{route('admins.professor.store')}}"> 
        <div class="row">      
        <div class="page-header">
            <h1>Cadastrar Professor</h1>
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
                <label for="professor_cpf">CPF:</label>
                <input type="text" class="form-control" id="professor_cpf" name="professor_cpf" value="{{old('professor_cpf')}}" autofocus required/>
            </div>                 

            <div class="col-md-6">
                <label for="professor_nome">Nome:</label>
                <input type="text" class="form-control" id="professor_nome" name="professor_nome" value="{{old('professor_nome')}}" required/>
            </div>  
        </div>       
        <div class="form-group row">
            <div class="col-md-6">
                <label for="professor_email">Email:</label>
                <input type="text" class="form-control" id="professor_email" name="professor_email" value="{{old('professor_email')}}" required/>
            </div>     
            <div class="col-md-6">
                <label for="professor_senha">Senha:</label>
                <input type="password" class="form-control" id="professor_senha" name="professor_senha" required/>
            </div>                  
        </div>  
        </div>
    </form>
    </div>
    @endsection
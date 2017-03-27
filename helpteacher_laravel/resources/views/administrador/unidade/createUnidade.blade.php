    @extends('layouts.layoutUnidade')
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
    <!--cadastrando a unidade no banco de dados-->   
    <form method="post" action="{{route('admins.unidade.store')}}"> 
        <div class="row">      
        <div class="page-header">
            <h1>Cadastrar Unidades</h1>
            <div class="btn-lateral"> 
                <button  type="submit" class="btn btn-primary btn-md"  name="salvar">
                Salvar  
                </button>                          
            </div>           
        </div>
        </div>   
        {{csrf_field()}}
        <div class=" form-group row">   
            <div class="col-md-6">                          
                <label for="instituicao_id">Instituicao:</label>
                <select class="form-control" name="instituicao_id" id="instituicao_id" required autofocus>                    
                        <option value="" selected>Selecione</option>
                        @foreach($instituicoes as $instituicao)                        
                        <option value="{{$instituicao -> id}}">{{$instituicao -> instituicao_nome}}</option>
                        @endforeach                   	
                </select>                            
            </div>        

            <div class="col-md-6">                          
                <label for="cidade_id">Cidade:</label>
                <select class="form-control" name="cidade_id" id="cidade_id" required>
                    <option value="" selected>Selecione</option> 
                        @foreach($cidades as $cidade)                      
                        <option value="{{$cidade -> id}}">{{$cidade -> cidade_nome}}</option>
                        @endforeach                    	
                </select>                            
            </div> 
        </div> 

        <div class=" form-group row">
            <div class="col-md-12">
                <label for="unidade_nome">Nome:</label>
                <input type="text" class="form-control" name="unidade_nome" id="unidade_nome" value="{{old('unidade_nome')}}" autofocus required/>
            </div>  
        </div>               

        <div class=" form-group row">
            <div class="col-md-6">
                <label for="unidade_endereco">Endereco:</label>
                <input type="text" class="form-control" name="unidade_endereco" id="unidade_endereco" value="{{old('unidade_endereco')}}" required/>
            </div> 

            <div class="col-md-6">
                <label for="unidade_telefone">Telefone:</label>
                <input type="tel" class="form-control" name="unidade_telefone" id="unidade_telefone" placeholder="(XX) XXXX(X)-XXXX" value="{{old('unidade_telefone')}}" required/>
            </div>  
        </div> 

        <div class="row form-group row">
            <div class="col-md-6">
                <label for="unidade_email">Email:</label>
                <input type="email" class="form-control" name="unidade_email" id="unidade_email" value="{{old('unidade_email')}}" required/>
            </div>  

            <div class="col-md-6">
                <label for="unidade_senha">Senha:</label>
                <input type="password" class="form-control" name="unidade_senha" id="unidade_senha" required/>
            </div>             
        </div> 
        </div>            
    </form>  
    </div>
    @endsection
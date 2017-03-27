@extends('layouts.layoutUnidade')
@section('container')
<div class="container theme-showcase" role="main"> 
<!--Mensagem de sucesso ao cadastrar-->
	<?php 
    $success_message = Session::get('success_message');
    ?>
    <div class="row">
      <div>
        @if(!empty($success_message))
        <div class="alert alert-success">
                {{ $success_message }}
          <a href="" class="close">&times;</a>
        </div>
        @endif
      </div>
    </div>     
    <div class="page-header">
    <h1>Listar Unidades</h1> 
        <div class="btn-lateral">
            <a href="{{route('admins.unidade.create')}}" type="button" class="btn btn-primary btn-md" name="cadastrar">
             Cadastrar  
            </a>
        </div>      
    </div>
        <table class="table table-responsive table-hover">                                 
            <thead>
                <tr>
                    <th>#</th>                             
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>E-mail</th>                                                          
                </tr>                           
            </thead>
            <tbody>
                @foreach($unidades as $unidade)
                <tr>
                    <td>{{$unidade -> id}}</td>                               
                    <td>{{$unidade -> unidade_nome}}</td>
                    <td>{{$unidade -> unidade_endereco}}</td>
                    <td>{{$unidade -> unidade_telefone}}</td>
                    <td>{{$unidade -> unidade_email}}</td>                   
                </tr>                        
                @endforeach                      
            </tbody>                        
        </table>
        {!! $unidades->links() !!} <!--paginação da lista de unidades-->       
    </div><!--container theme-showcase-->
@endsection
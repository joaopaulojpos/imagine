@extends('layouts.layoutTurma')
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
    <h1>Listar Turmas</h1> 
        <div class="btn-lateral">
            <a href="{{route('admins.turma.create')}}" type="button" class="btn btn-primary btn-md" name="cadastrar">
             Cadastrar  
            </a>
        </div>      
    </div>
        <table class="table table-responsive table-hover">                                   
            <thead>
                <tr>
                    <th>#</th>  
                    <th>Cód.Turma</th>                           
                    <th>Nome</th>
                    <th>Unidade</th>                    
                </tr>                           
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                <tr>
                    <td>{{$turma -> id}}</td>
                    <td>{{$turma -> turma_codigo}}</td>                               
                    <td>{{$turma -> turma_nome}}</td>
                    <td>{{$turma -> unidade_id}}</td>                  
                </tr>                        
                @endforeach                      
            </tbody>                        
        </table>
        {!! $turmas->links() !!} <!--paginação da lista de turmas-->       
</div><!--container theme-showcase-->
@endsection
@extends('layouts.layoutDisciplina')
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
    <h1>Listar Disciplinas</h1>
        <div class="btn-lateral">
            <a href="{{route('admins.disciplina.create')}}" type="button" class="btn btn-primary btn-md" name="cadastrar">
             Cadastrar  
            </a>
        </div>       
    </div>
        <table class="table table-responsive table-hover">                                   
            <thead>
                <tr>
                    <th>#</th>                             
                    <th>Cód.Disciplina</th>
                    <th>Nome</th>
                    <th>Turma</th>                                                           
                </tr>                           
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{$disciplina -> id}}</td>                               
                    <td>{{$disciplina -> disciplina_codigo}}</td>
                    <td>{{$disciplina -> disciplina_nome}}</td>
                    <td>{{$disciplina -> turma_nome}}</td>                   
                </tr>                        
                @endforeach                      
            </tbody>                        
        </table>       
</div><!--container theme-showcase-->
@endsection
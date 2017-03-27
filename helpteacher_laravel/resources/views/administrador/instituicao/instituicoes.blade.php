@extends('layouts.layoutInstituicao')
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
	<h1>Listar Instituições</h1>
        <div class="btn-lateral">
            <a href="{{route('admins.instituicao.create')}}" type="button" class="btn btn-primary btn-md" name="cadastrar">
             Cadastrar  
            </a>
        </div>
	</div>
	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>CNPJ</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody>
			@foreach($instituicoes as $instituicao)
			<tr>
				<td>{{$instituicao -> id}}</td>
				<td>{{$instituicao -> instituicao_cnpj}}</td>
				<td>{{$instituicao -> instituicao_nome}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    {!! $instituicoes->links() !!} <!--paginação da lista de instituições-->
	</div>   
@endsection
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
	<form method="post" action="{{route('professor.prova.update', $prova->id)}}">
    {!! method_field('put') !!}
        <div class="row">      
        <div class="page-header">
            <h1>Editar Prova</h1>
            <div class="btn-lateral">
                <button  type="submit" class="btn btn-primary btn-md" name="atualizar">
                Atualizar  
                </button>                           
            </div>           
        </div>
        </div>   
        {{csrf_field()}}           
        <div class="form-group row">

            <div class="col-md-12">
                <div class="checkbox">
                  <label><input type="checkbox" name="prova_status" value="ativo" @if(isset($prova) && $prova->prova_status == 'ativo') 
                    checked
                  @endif
                  />Ativo?</label>
                </div>
            </div>

                <input type="hidden" name="assunto_id" id="assunto_id" value="{{$prova->assunto_id}}" class="form-control" required/>
                                
                <input type="hidden" class="form-control" name="prova_data" id="prova_data" value="{{date('d/m/Y',strtotime($prova->prova_data))}}" required/>
        </div> 
        </div>   
    </form>
    </div>
    @endsection

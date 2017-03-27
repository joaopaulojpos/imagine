 @extends('layouts.layoutGabarito')
 @section('container') 

    <div class="container">
    <form method="post" action="{{route('professor.gabarito.update',$gabarito->id)}}">
    {!! method_field('put') !!}      
    <div class="page-header">  
    <h1>Editar Gabarito</h1>
        <div class="btn-lateral">                         
            <button  type="submit" class="btn btn-primary btn-md"  name="atualizar">
            Atualizar  
            </button> 
        </div>
    </div>        
        {{csrf_field()}}
        <div class="form-group row">
        <div class="col-md-12">
            <div class="checkbox">
              <label><input type="checkbox" name="gabarito_status" value="ativo" @if(isset($gabarito) && $gabarito->gabarito_status == 'ativo') 
                checked
              @endif
              />Ativo?</label>
            </div>
        </div>

            <input type="hidden" min="1" name="prova_id" id="prova_id" value="{{$gabarito->prova_id}}" class="form-control" required />       
            
            <input type="hidden" min="1" class="form-control" id="gabarito_codigo" name="gabarito_codigo" value="{{$gabarito->gabarito_codigo}}" required />
            
            <input type="hidden" class="form-control" id="gabarito_data" name="gabarito_data" value="{{date('d/m/Y',strtotime($gabarito->gabarito_data))}}" />

        </div>
    </form>
    </div>
    @endsection
   
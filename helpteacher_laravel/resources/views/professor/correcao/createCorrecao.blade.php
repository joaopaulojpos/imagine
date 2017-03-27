@extends('layouts.layoutCorrecao')
@section('container')
    <div class="container">
    <form method="get" action="{{route('professor.correcao.create')}}">
        <div class="form-group row">
            <div class="col-md-5">
                <label for="gabarito_id">Gabarito:</label>
                <select class="form-control" name="gabarito_id" id="opcoes" autofocus>
                    <option value="" selected>Selecione</option>
                    @foreach($gabaritos as $gabarito)
                    @if($gabarito -> gabarito_status == 'ativo')
                    <option value="{{$gabarito -> id}}">{{$gabarito -> gabarito_codigo}}</option>
                    @endif
                    @endforeach
                </select>
            </div> 
            <div class="col-md-5">
                <label for="quantidade_prova">Quantidade de provas:</label>
                <input type="text" class="form-control" id="quantidade_prova" name="quantidade_prova" required/>
            </div>   
            <div  class="col-md-2 btn_enviar">
            <button type="submit" class="btn btn-primary btn-md" name="enviar">Enviar</button>
        </div>         
        </div>
    </form>
    </div>
    <br/>
    <div class="container">
    <section id="wrap-prova">    
    <?php 
    $gabarito = (isset($_GET['gabarito_id'])? $_GET['gabarito_id']: '');
    $prova = 0;
    $qtdProvas = (isset($_GET['quantidade_prova'])? $_GET['quantidade_prova']: '');
    ?>
    @while($prova < $qtdProvas)
    <?php $prova = $prova + 1 ?>
    <div class="prova">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Prova {{$prova}}</h2></div>
      <button type="button" class="btn btn-primary btn-md prev" name="prev" id="prev">Prev</button>
      <button type="button" class="btn btn-primary btn-md next" name="next" id="next">Next</span></button>
      <div class="panel-body">      
        <div class="form-group row">
          <p id = "resultado"></p>
          <form  action="{{'professor.correcao.store'}}" method="post">
          {{csrf_field()}}
          <section id="wrap-questao">
             <?php $correcao_numero = 0; ?>
             @foreach($questoes as $questao)
             @if($questao -> gabaritoIdFore == $gabarito) 
             <?php $correcao_numero = $correcao_numero + 1 ?>
                <div class="questao">
                    <label>Questão {{$correcao_numero}} </label>
                    <input type="hidden" name="questao_id" value="{{$questao -> questaoId}}" required>
                    <input type="hidden" name="correcao_numero" value="{{$correcao_numero}}" readonly>
                    <br/>
                
                <select class="form-control" name="correcao_resposta" id="opcoes">
                    <option value="" selected>Selecione</option>                    
                    <option value="A">A</option>
                    <option value="B">B</option>                    
                    <option value="C">C</option>                   
                    <option value="D">D</option>                   
                </select>               
                </div>
            @endif
            @endforeach
             </section> 
                <button type="submit" class="btn btn-danger btn-block btn_corrigir" name="corrigir" id="corrigir">Corrigir</button> 
            </form>   
        </div>                               
    </div>  
      </div> 
      </div> 
    @endwhile    

    <button type="button" id="ant" class="btn btn-warning btn-md botao">Anterior</button>
    <button type="button" id="prox" class="btn btn-warning btn-md botao">Próxima</button>
    </section> 
    </div>
@endsection
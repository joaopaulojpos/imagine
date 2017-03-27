<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="icon" href="img/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <title>Help Teacher</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HelpTeacher - Professor</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('professor.prova.index')}}">Home</a></li>
                        <li class="active"><a href="#">Gabaritos</a></li> 
                        <li><a href="{{route('professor.questao.index')}}">Questoes</a></li>
                        <li><a href="{{route('professor.correcao.create')}}">Correção</a></li>              
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  Sair</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>           
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
    <h1>Listar Gabaritos</h1>
    <div class="btn-lateral">                            
        <a href="{{route('professor.gabarito.create')}}" type="button" class="btn btn-primary btn-md">
        Cadastro  
        </a>
    </div>
    </div> 
    <!--listando os dados do gabarito na tabela-->   
        <table class="table table-responsive table-hover">                               

            <thead>
                <tr>                                
                    <th>#</th>                                
                    <th>Cód.Gabarito</th>                    
                    <th>Data</th>
                    <th>Status</th>
                    <th>Data Prova</th>
                    <th>Ações</th>                                                          
                </tr>                           
            </thead>   
            <tbody>
                @foreach($gabaritos as $gabarito)
                @if($gabarito->provaStatus == 'ativo')
                <tr>                                
                    <td>{{$gabarito -> gabaritoId}}</td>      
                    <td>{{$gabarito -> gabaritoCodigo}}</td>                           
                    <td>{{date('d/m/Y',strToTime($gabarito -> gabaritoData))}}</td> 
                    <td>{{$gabarito -> gabaritoStatus}}</td>         
                    <td>{{date('d/m/Y',strtotime($gabarito -> provaData))}}</td> 
                    <td>
                        <a href="#myModal" data-toggle="modal" data-target="#myModal" data-whateverid="{{$gabarito -> gabaritoId}}"><span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span></a>
                        <a href="{{route('professor.correcao.create')}}"><span class="glyphicon glyphicon-list-alt text-warning" aria-hidden="true"></span></a>
                        <a href="{{route('professor.gabarito.edit',$gabarito->gabaritoId)}}"><span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a>
                    </td>                 
                </tr>
                @endif                                                                      
                @endforeach                      
            </tbody>                        
        </table>
        <!--Cadastrando questões no banco de dados-->
        <div class="modal fade" id="myModal" tabcreate="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">                                  
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{isset($gabarito -> gabaritoId)? $gabarito-> gabaritoId : ''}}</small></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('professor.questao.store')}}">
                            <div class="form-horizontal">   
                            {{csrf_field()}}               
                                <div class="form-group row">                   
                                    <input type="hidden" id="gabarito_id" name="gabarito_id" value="{{isset($gabarito -> gabaritoId)? $gabarito-> id : ''}}"/>
                                    <div class="col-xs-12">
                                        <label for="questao_numero">Questão:</label>
                                        <input type="number" min="1" class="form-control" name="questao_numero" id="questao_numero" required autofocus/>
                                    </div>  
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="correcao_resposta">Resposta:</label>
                                        <br/>
                                        <label class="radio-inline">
                                            <input type="radio" name="questao_resposta" id="questao_resposta" value="A" checked /> A
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="radio-inline">
                                            <input type="radio" name="questao_resposta" id="questao_resposta" value="B"/> B
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="radio-inline">
                                            <input type="radio" name="questao_resposta" id="questao_resposta" value="C"/> C
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="radio-inline">
                                            <input type="radio" name="questao_resposta" id="questao_resposta" value="d"/> D
                                        </label>                                                       
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <label for="questao_nota">Nota:</label>
                                        <input type="text" class="form-control" name="questao_nota" id="questao_nota" required/>
                                    </div> 
                                </div>                               
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary" name="inserir">Inserir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                                    
            </div>
        </div>                                                    
    </div><!--container theme-showcase-->                                  
<script type="text/javascript" src="{{asset('jquery/jquery.slim.js')}}"></script>    
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/ajaxScript.js')}}"></script>
<!--enviando o id do gabarito para inserir uma questão-->
        <script type="text/javascript">
            $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipientid = button.data('whateverid') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Inserir Questão - Gabarito ' + recipientid)
                modal.find('#gabarito_id').val(recipientid)
            })
        </script>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="icon" href="img/favicon.ico">
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
                        <li><a href="{{route('professor.gabarito.index')}}">Gabaritos</a></li> 
                        <li class="active"><a href="#">Questões</a></li> 
                        <li><a href="{{route('professor.correcao.create')}}">Correção</a></li> 
                              
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  Sair</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav> 
        <div class="container">
        <h2>Lista de Questões</h2>
        <div class="table table-responsive">
            <table class="table table-hover">                       
                <thead>
                    <tr>   
                        <th>#</th>  
                        <th>Gabarito</th>                           
                        <th>Questão</th> 
                        <th>Nota</th>
                        <th>Status</th>
                    </tr>                           
                </thead>
                <?php 
                    $acertos = 0; 
                    $erros = 0; 
                    $totalNotas = 0;
                ?>
                @foreach($questoes as $questao)  
                @if($questao -> gabaritoStatus == 'ativo')            
                <tr>                                      
                    <td>{{$questao -> questaoId}}</td>    
                    <td>{{$questao -> gabaritoIdFore}}</td>                          
                    <td>{{$questao -> questaoNumero}}</td>
                    <td>{{$questao -> questaoNota}}</td>                                                      
                    <td>                                    
                        <a href="#myModal" data-toggle="modal"  data-whateverid="{{$questao -> questaoId}}" data-whatevernumero="{{$questao -> questaoNumero}}"><span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span></a>
                    </td>
                </tr>                          

                    @if($questao->questaoResposta == $questao->correcao_resposta)
                     
                    <?php $acertos = $acertos + 1;
                    $totalNotas = $totalNotas + ($questao->questaoNota);?>

                    @else

                    <?php $erros = $erros + 1; ?>

                    @endif

                @endif                                                      
                @endforeach
             
                <tr>
                    <td class="text-success"><b>{{"Acertos: " . $acertos}}</b></td>
                    <td class="text-danger"><b>{{"Erros: " . $erros}}</b></td>
                    <td></td>
                    <td></td>
                    <td class="text-success"><b>{{"Nota: " . $totalNotas}}</b></td>
                </tr>                                                     
            </table>                                                      
        </div>  
        </div>     
    
    <!--corrigindo as questões-->
    <div class="modal fade" id="myModal" tabcreate="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">                                  
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">                                
                    <form method="post" action="">  
                        <div class="form-horizontal">  
                        {{csrf_field()}}          
                            <div class="form-group row">
                                <input type="hidden" name="questao_id" id="questao_id" value="{{isset($questao -> questaoId)? $questao -> questaoId : ''}}"/>

                                <div class="col-md-12">
                                    <label for="correcao_numero">Questão:</label>
                                    <input type="text" class="form-control" name="correcao_numero" id="correcao_numero" readonly="true" required/>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <div class="col-md-12">
                                    <label for="correcao_resposta">Resposta:</label>
                                    <br/>
                                    <label class="radio-inline">
                                        <input type="radio" name="correcao_resposta" id="correcao_resposta" value="A"/> A
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="correcao_resposta" id="correcao_resposta" value="B"/> B
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="correcao_resposta" id="correcao_resposta" value="C"/> C
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="correcao_resposta" id="correcao_resposta" value="D"/> D
                                    </label>                                                       
                                </div>
                            </div>           
                        </div>                          
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" name="corrigir">Corrigir</button>
                        </div>
                    </form> 
                </div>
            </div>                                                      
        </div>                                   
    </div><!--fim da correção das questões-->
    <div 
        class="col-md-2">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('jquery/jquery.slim.js')}}"></script>    
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <!--Função JavaScript capturando os valores para preencher os campos do Modal-->
    <script type="text/javascript">
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipientid = button.data('whateverid')
            var recipientnumero = button.data('whatevernumero') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Correção')
            modal.find('#questao_id').val(recipientid)
            modal.find('#correcao_numero').val(recipientnumero)
        })
    </script>
</body>
</html>
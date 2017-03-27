<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Help Teacher</title>
    </head>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">HelpTeacher - Administrador</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="{{route('admins.instituicao.index')}}">Home</a></li>
                  <li><a href="{{route('admins.unidade.index')}}">Unidade</a></li>
                  <li><a href="{{route('admins.professor.index')}}">Professor</a></li>
                  <li><a href="{{route('admins.turma.index')}}">Turma</a></li>
                  <li><a href="{{route('admins.disciplina.index')}}">Disciplina</a></li>
                  <li class="active"><a href="#">Assunto</a></li>  
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  Sair</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>  
    <body> 
    @yield('container')
    <script type="text/javascript" src="{{asset('jquery/jquery.slim.js')}}"></script>    
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    </body>
</html>
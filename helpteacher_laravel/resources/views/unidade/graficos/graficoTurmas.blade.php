<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Help Teacher</title>    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
    ${demo.css}
    </style>        
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
                    <a class="navbar-brand" href="#">HelpTeacher - Gráfico</a>
                     </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Gráfico 1</a></li>
                            <li><a href="{{route('unidade.graficoAssuntos.mostrar')}}">Gráfico 2</a></li>     
                        </ul>
                    <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span>  Sair</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>   
<div class="container theme-showcase" role="main">
    <div class="page_header">
    <h1><b>Gráfico de Acompanhamento por Turma</b></h1> 
    <hr>
    </div>
    <br/>     
    <!--gráfico-->            
    <script type="text/javascript">
$(function () {
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Acertos',
            colorByPoint: true,
            data:             
            [
            @foreach($turmas as $turma)
            {
                name: '{{$turma -> turma_nome}}',
                y: {{$turma -> total_acertos}}
            },
            @endforeach  
            ]
        }]
    });
});
    </script>   
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    <div> <!--container-->
    <script type="text/javascript" src="{{asset('jquery/jquery.slim.js')}}"></script>    
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>      
</body> 
</html>
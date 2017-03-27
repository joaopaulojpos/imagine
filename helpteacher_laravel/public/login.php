<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Teacher</title>
    <link href="{{asset(css/bootstrap.min.css)}}" rel="stylesheet">
    <link href="{{asset(css/style.css)}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    <div class="container">
    <form method="post" action="model/loginSession.php">
        <div class="form-signin">
        <h1 class="form-signin-heading"><b>Help Teacher</b></h1>  
        <hr class="hr-login" />  
        <p class="login-box-msg">Faça login para iniciar a sua sessão</p>
            <div class="row">  
                <div class="col-md-12 col-md-8">                          
                    <div class="form-group has-feedback">               
                        <input type="text" class="form-control input-lg" id="usuario_email" name="usuario_email" placeholder="E-mail" required autofocus> 
                        <span class="glyphicon glyphicon-user form-control-feedback"></span> 
                    </div>                
                </div>    
            </div>            
            <div class="row">            
                <div class=" col-md-12 col-md-8">
                    <div class="form-group has-feedback">              
                        <input type="password" class="form-control input-lg" id="usuario_senha" name="usuario_senha" placeholder="Senha" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                </div>      
            </div>        
            <div class="row">
                <div class="col-md-12 col-md-8">
                    <div class="form-group radio-login">
                        <label class="radio-inline"><input type="radio"  name="usuario_tipo" value="1" checked/>Professor</label>
                        <label class="radio-inline"><input type="radio"  name="usuario_tipo" value="2"/>Diretor</label>                                                
                    </div>                
                </div>           
            </div>
            <div class="row">
                <div class="col-md-12 col-md-8">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="entrar" >
                    Entrar
                    </button>
                </div>
            </div>
        </div>                                      
    </form>
    <p class="text-center text-danger">
    </p>         
       </div> -<!--container-->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="{{asset('jquery/jquery.slim.js')}}"></script>    
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
  </body>
</html>
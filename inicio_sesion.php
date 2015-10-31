<html>

    <head>
        <meta charset="utf-8"> 
        <!--CDN BOOTSTRAP-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
        <!--CSS CHAY-->
        <link href="dist/css/main.css" rel="stylesheet" >
        <!--Fuentes-->
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>

        <!--MATERIAL-->
        <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
        <link href="dist/css/roboto.min.css" rel="stylesheet">
        <link href="dist/css/material.min.css" rel="stylesheet">
        <link href="dist/css/ripples.min.css" rel="stylesheet">
        <title>Easy Math</title>
    </head>

    <body>

    <!-- Your site -->

    <!--NAVEGACIOON-->
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand pacifico" href="http://www.buap.mx">Prep. Enrique Cabrera Barroso</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            
            
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="contacto.php">Contácto</a></li>
                <li><a href="http://www.labcode.com.mx">Labcode</a></li>

            </ul>
        </div>
    </div>


    <!--FORM-->
    <div class="row col-md-6 center-block quitar-float text-center espacio-arriba">
        
        <div class="jumbotron">
           <h1 class="grande accent-color pacifico" style="padding:30px;">¡Easy Math!</h1>
            <form class="form-horizontal" action="acceso.php" method="post">
                <legend>Inicia Sesión</legend>
                <fieldset>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        
                        <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancelar</button>
                            <button id="inicio_sesion" type="button"  class="btn btn-primary"> 
                            <i class="mdi-content-send"></i></button>
                        </div>
                    </div>
                    
                    </div>
                </fieldset>
            </form>
            
        
        </div>
    </div>

    <div class="row col-md-2 center-block quitar-float text-center">
        <a href="crear_cuenta.php" class="list-group-item btn btn-primary btn-raised">
            <div class="row-action-primary">
               <i class="mdi-social-person-add pull-right"></i>
            </div>
            <div class="row-content">
                <p class="list-group-item-text">Regístrate</p>
             </div>
        </a>
    </div>
    

        <!-- Your site ends

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        

        <script src="js/funciones.js"></script>        

        <script src="dist/js/ripples.min.js"></script>
        <script src="dist/js/material.min.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
                $("#inicio_sesion").click(function(){

                    //comprobar campos
                    if ($("#inputEmail").val()=="" || $("#inputPassword").val()=="" ) {

                           prueba();
                    }else{

                        window.location="acceso.php?email="+$("#inputEmail").val()+"&password="+md5($("#inputPassword").val());
                    }

                    //poner cookie

                    //

                })
            });
        </script>



    </body>

</html>

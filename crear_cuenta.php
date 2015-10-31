<?php
    include 'includes/sesiones.php';

    if(logged_in()){
        header("Location:perfil.php");
    }else{
?>
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
                <li><a href="contacto.php">Contácto</a></li>
                <li><a href="http://www.labcode.com.mx">Labcode</a></li>
            </ul>
        </div>
    </div>


    <div class="row col-md-6 center-block quitar-float text-center espacio-arriba">
        <div class="jumbotron">
           <h1 class="grande accent-color pacifico" style="padding:30px;">¡Easy Math!</h1>
            <form class="form-horizontal">
                <legend>Regístrate</legend>
                <fieldset>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <label for="inputName" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Nombre">
                        </div>
                        <label for="select" class="col-lg-2 control-label">Género</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select">
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>Otro</option>
                            </select>
                        </div>

                        <label for="select2" class="col-lg-2 control-label">Escuela</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select2">
                                <option>Enrique Cabrera Barroso</option>
                                <option>Alfonso Calderon Moreno</option>
                                <option>Otro</option>
                            </select>
                        </div>

                        <label for="inputMatricula" class="col-lg-2 control-label">Matricula</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputMatricula" placeholder="Matricula">
                        </div>
                        <label for="inputUserName" class="col-lg-2 control-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputUserName" placeholder="Nombre de usuario">
                        </div>
                        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancelar</button>
                            <button id="enviar" type="button" class="btn btn-primary"> 
                            <i class="mdi-content-send"></i></button>
                        </div>
                    </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
 

        <!-- Your site ends -->

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="dist/js/ripples.min.js"></script>
        <script src="dist/js/material.min.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();

                //comprobaciones de campos
                $("#enviar").click(function(){
                    if(
                        $("#inputEmail").val()=="" ||
                        $("#inputName").val()=="" ||
                        $("#inputPassword").val()=="" ||
                        $("#inputMatricula").val()=="" ||
                        $("#inputUserName").val()=="" 
                        ){
                        //comprobar matricula
                        prueba();
                    }else{
                        var request ={
                            email:$("#inputEmail").val(),
                            name:$("#inputName").val(),
                            password:$("#inputPassword").val(),
                            matricula:$("#inputMatricula").val(),
                            username:$("#inputUserName").val(),
                            genero:$("#select").val(),
                            prepa:$("#select2").val()


                        }

                        var respuesta = peticion("1",request);
                        if (respuesta == 1) {
                            window.location="perfil.php";
                        } else{

                            alert("Hubo un error en el sistema.Reportalo");
                            window.location="contaco.php";
                        };


                    }
                });

            });
        </script>



    </body>

</html>
<?php }
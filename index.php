<?php
require 'includes/sesiones.php';
require 'includes/DB.php';
if (logged_in()) {
    echo '<script language="javascript">window.location="perfil.php"</script>';
}else{

?>
<html>

    <head>
        <meta charset="utf-8"> 
        <!--CDN BOOTSTRAP-->
        <!--Responsive-->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
        <!--CSS CHAY-->
        <link href="dist/css/main.css" rel="stylesheet">
        <link hferf="dist/css/animate.css" rel="stylesheet">
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
            <a class="navbar-brand pacifico" href="javascript:void(0)">Prep. Enrique Cabrera Barroso</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="inicio_sesion.php">Inicia Sesión
                     <i class="mdi-communication-vpn-key pull-right"></i>
                    </a>
                </li>
                <li><a href="contacto.php">Contácto</a></li>
                <li><a href="http://www.labcode.com.mx">Labcode</a></li>

            </ul>
        </div>
    </div>



    <!--Inicio del carousel-->

        <div class="carousel-inner carousel slide" id="carousel-example-generic" data-ride="carousel">

    

         <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <!--<li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
          </ol>


    <div class="carousel-inner">

        <div class="item active">
            <div class="content row col-md-12 center-block quitar-float text-center espacio-arriba">
                <div class="jumbotron">
                    <h1 class="pacifico">¡Easy Math!</h1>
                    <p style="padding:20px;">
                        Una forma divertida de aprender matemáticas.<br>
                        Obtén material de apoyo en el tema de matemáticas, videos, cuestionarios, repaso, entre otras cosas.
                    </p>
                </div>
            </div>
            <div style="background-image:url('img/math-tutorial.jpg');" class="resrc fill caru_img"> 

            </div>
        </div>
        <div class="item">
            <div class="content row col-md-12 center-block quitar-float text-center espacio-arriba">
                <div class="jumbotron">
                    <h1 class="pacifico" >Easy Math</h1>
                    <blockquote>
                        <p>La matemática es la ciencia del orden y la medida, de bellas cadenas de razonamientos, todos sencillos y fáciles.</p>
                        <small>René descartes <cite title="Source Title">(1596-1650)</cite></small>
                    </blockquote>
                </div>
            </div>
            <div style="background-image:url('img/math-tutorial.jpg');" class="resrc fill caru_img"> 
            </div>
        </div>
        
    </div>
</div>
    
   
        <!-- Your site ends
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
         -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="dist/js/ripples.min.js"></script>
        <script src="dist/js/material.min.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".flip-izq").click(function() 
                {
                    $('.pan-izq').slideToggle("slow");
                    //$(".panel-izq").slideToggle("slow");
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".flip-der").click(function() 
                {
                    $('.pan-der').slideToggle("slow");
                    //$(".panel-izq").slideToggle("slow");
                });
            });
        </script>
        <script src="js/resrc.js"></script>
        <!--script para la imagen responsiva-->
        <script>
        resrc.ready(function() {
          resrc.run();
        });
        </script>

    </body>

</html>
<?php
}
?>
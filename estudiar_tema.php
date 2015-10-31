<?php
require 'includes/sesiones.php';
require 'includes/DB.php';
require 'includes/infoUsuario.php';
if (!logged_in()) {
    echo '<script language="javascript">window.location="index.php"</script>';
}else{
    $infoUser = info_usuario($_SESSION["userid"],$db);
    //$info_temas = temas_id($_SESSION["userid"],1,$db);
    $info_temas = temas_disponibles_para_usuario($_SESSION["userid"],$db);
    $progreso = temas_del_usuario($_SESSION["userid"],$db);
    $tema = temas_id($_GET["id"],$db);
    if ($tema == null) {
        # code...
        echo  '<script language="javascript">window.location="perfil.php"</script>';
    }else{


?>
<html>

    <head>
        <meta charset="utf-8"> 
        <!--CDN BOOTSTRAP-->
        <!--Responsive-->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
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
            
            <a class="navbar-brand pacifico" href="http://www.buap.mx">Prep. Enrique Cabrera Barroso</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                 <li>
                    <a href="perfil.html">Home
                 <i class="mdi-action-home pull-right"></i>
                     </a>
                 </li>
                 <li><a href="contacto.php">Contácto</a></li>
                <li><a href="http://www.labcode.com.mx">Labcode</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0)">Cerrar Sesión 
                <i class="mdi-action-settings-power pull-right"></i>
                </a>
            </li>
            
        </ul>
        </div>
    </div>


    <div class="row">
        <!--Container Izquierdo-->
        <div class="col-md-3">
             <a href="javascript:void(0)" class="btn btn-primary btn-sm flip-izq">
                <i class="mdi-image-dehaze"></i>
            </a>

            <div class="panel panel-primary container-ch pan-izq">
                <div class="panel-heading"> 
                    <div class="row-action-primary">
                                
                            </div>
                    <h3 class="panel-title">Temas</h3>

                </div>
                <div class="panel-body">
                       <?php
                            if ($progreso != 0) {
                                # code...
                            
                                foreach ($progreso as $key => $value) {
                                    
                                

                            ?>
                              <a href="estudiar_tema.php?id=<?php echo $value['id']?>" class="list-group-item">

                                    <div class="row-content">
                                        <i class="mdi-action-class pull-right" style="padding:5px;"></i>
                                        <h4 class="list-group-item-heading"><?php echo $value['unidad'];?></h4>
                                    </div>
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow=" <?php echo $value['progreso'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value['progreso'];?>%;">
                                        <span class="sr-only"><?php echo $value['progreso']?>% Complete</span>
                                      </div>
                                    </div>
                              </a>
                              <?php
                                }
                            }else{

                                ?>

                                     <a href="#" class="list-group-item">
                                        <div class="row-action-primary">
                                            <i class="mdi-social-school pull-right"></i>
                                        </div>
                                        <div class="row-content">
                                            <h4 class="list-group-item-heading">Sin unidades</h4>   
                                            <p class="list-group-item-text">Selecciona un tema</p>
                                        </div>
                                    </a>

                                <?php
                            }
                      ?>
                </div>
            </div>
        </div>
          <!--Container Principal-->
        <div class="col-md-6">
            <div class="center-block quitar-float text-center ">
                            <!-- 16:9 aspect ratio -->
                    <h1 class="grande accent-color pacifico"><?php echo  $tema['unidad'];?></h1>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/lR-LAIyPsh0?autoplay=0"></iframe>
                    </div>
                    <ul class="pager">
                       
                    </ul>
            </div>
        </div>
          <!--Container Izquierdo-->
        <div class="col-md-3">
                 <a href="javascript:void(0)" class="btn btn-primary btn-sm flip-der">
                    <i class="mdi-image-dehaze"></i>
                </a>
                    <!--Container derecho-->
                <div class="panel panel-primary container-ch pan-der">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contenido</h3>
                    </div>
                    <div class="panel-body">
                         <a href="" class="list-group-item " data-toggle="modal" data-target="#myModal2">Aprende Mejor
                                <i class="mdi-device-battery-charging-full pull-right"></i>
                         </a>
                          <a href="problemas.php?pregunta=1&id=<?php echo $tema['id'];?>" class="list-group-item">
                            Problemas
                            <i class="mdi-image-straighten pull-right"></i>
                        </a>
                          <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal">Formulario
                          <i class="mdi-editor-format-list-numbered pull-right"></i>
                      </a>
                      <!--
                              <a href="#" class="list-group-item disabled">Ayuda
                                <i class="mdi-device-battery-unknown pull-right"></i>
                            </a>
                        -->
                    </div>
                </div>

        </div>
    </div>




        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Formulario</h3>
            </div>
            <div class="panel-body">
               <?php echo $tema['ayuda'];?>
            </div>
        </div>
            </div>

          </div>
        </div>

        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Aprende Mejor</h3>
            </div>
            <div class="panel-body">
                <?php echo $tema['contenido'];?>
            </div>
        </div>
            </div>

          </div>
        </div>

        <!-- Your site ends -->

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

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
        <!--Esconder paneles-->
        <script type="text/javascript"
        src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
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



    </body>

</html>
<?php
}}
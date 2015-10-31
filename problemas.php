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
    $preguntas = preguntas_del_tema($_GET['id'],$db);
    $indice =  $_GET["pregunta"]-1;
    if ($_GET["pregunta"] >= count($preguntas)+1) {
        # code...
        echo '<script language="javascript">window.location="revisar_respuestas.php?id='.$_GET['id'].'"</script>';  
    } 
    $tema = temas_id($_GET["id"],$db);
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
    <span id="idUser"><?php echo $_SESSION['userid'];?></span>
    <span id="idPregunta"><?php echo $preguntas[$_GET['pregunta']-1]['id'];?></span>
    <span id= "idTema"><?php  echo $_GET['id'];?></span>
    <span id= "numeroPregunta"><?php  echo $indice?></span>
    <div class="navbar navbar-default">
        <div class="navbar-header">
            
            <a class="navbar-brand pacifico" href="http://www.buap.mx">Prep. Enrique Cabrera Barroso</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                 <li>
                    <a href="perfil.php">Home
                 <i class="mdi-action-home pull-right"></i>
                     </a>
                 </li>
                 <li><a href="contacto.php">Contácto</a></li>
                <li><a href="http://www.labcode.com.mx">Labcode</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="includes/logout.php">Cerrar Sesión 
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

            <!--Container derecho-->
                
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
        
        <h1 class="grande accent-color pacifico">Problemas</h1>
        <div class="panel panel-default">
            <div class="panel-body">

                <h2> Problema <?php echo $_GET["pregunta"];?></h2>
                <p><?php echo $preguntas[$indice]['pregunta'];?></p> 

             <form id="formulario" name="formulario" class="form-horizontal">       
                  
                    <label class="radio-inline"><input id="radio1" type="radio" name="optradio" value="1"><?php echo $preguntas[$indice]['opcion1'];?></label><br>
                    <label class="radio-inline"><input id="radio2" type="radio" name="optradio" value="2"><?php echo $preguntas[$indice]['opcion2'];?></label><br>
                    <label class="radio-inline"><input id="radio3" type="radio" name="optradio" value="3"><?php echo $preguntas[$indice]['opcion3'];?></label><br>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1">
                            
                            <button type="button" id="enviar" class="btn btn-primary">
                                <i class="mdi-content-send"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--
        <ul class="pager">
            <li><a href="javascript:void(0)">Anterior</a></li>
            <li><a href="javascript:void(0)">Next</a></li>
        </ul>-->
            </div>
        </div>
        <!--Container Derecho-->
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
                          <a href="" class="list-group-item disabled">Aprende Mejor
                                <i class="mdi-device-battery-charging-full pull-right"></i>
                         </a>
                          <a href="#" class="list-group-item disabled">
                            Problemas
                            <i class="mdi-image-straighten pull-right"></i>
                        </a>
                          <a href="#" class="list-group-item " data-toggle="modal" data-target="#myModal">Formulario
                          <i class="mdi-editor-format-list-numbered pull-right"></i>
                      </a>
                          <a href="#" class="list-group-item disabled">Ayuda
                            <i class="mdi-device-battery-unknown pull-right"></i>
                       </a>
                    </div>
                </div>
        </div>
    </div>



<!-- Modal FORMULARIO-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Recuerda</h3>
            </div>
            <div class="panel-body">
               <?php  echo $tema['ayuda'];?>
            </div>
        </div>
    </div>

  </div>
</div>

<!-- Modal RESPUESTa-->
<div id="modalRespuesta" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Respuesta</h3>
    </div>
    <div class="panel-body">
        Respuesta descripcion
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

                $("#enviar").click(function () {
                    // body...


                });
            });
        </script>
        <!--Esconder paneles-->
        <script type="text/javascript"
        src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#idUser").hide();
                $("#idPregunta").hide();
                $("#idTema").hide();
                $("#numeroPregunta").hide();
                $(".flip-izq").click(function() 
                {
                    $('.pan-izq').slideToggle("slow");
                    //$(".panel-izq").slideToggle("slow");
                });

                

                $("#enviar").click(function(){
                    if(!$("input:radio[name=optradio]").is(':checked')){
                        alert("Selecciona una respuesta");

                    }else{
                        var request = {idPregunta:$("#idPregunta").text(),respuesta:$("input:radio[name=optradio]:checked").val(),idUser:$("#idUser").text(),idTema:$("#idTema").text()};
                        var respuesta = peticion("2",request);
                        var numero = parseInt($("#numeroPregunta").text())+2;
                        console.log(numero);
                        window.location="problemas.php?pregunta="+numero+"&id=1"
                    }


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
}
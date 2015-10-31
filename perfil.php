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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand pacifico" href="http://www.buap.mx">Prep. Enrique Cabrera Barroso</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav ">
                 <li>
                    <a href="perfil.php">Home
                 <i class="mdi-action-home pull-right"></i>
                     </a>
                 </li>
                 <li><a href="contacto.php" >Contácto</a></li>
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
            <div class="panel panel-primary container-ch pan-izq">
                <div class="panel-heading"> 
                    <div class="row-action-primary">
                            
                            </div>
                    <h3 class="panel-title">Temas Disponibles</h3>

                </div>
                <div class="panel-body">
                    <?php
                        foreach ($info_temas as $key => $value) {
                            # code...
                            //inscribir.php?id=<?php echo $value['id']."&idUser=".$_SESSION["userid"];
                            ?>
                            <a href="#" class="list-group-item">
                                <div class="row-action-primary">
                                    <i class="mdi-social-school pull-right"></i>
                                </div>
                                <div class="row-content">
                                    <h4 class="list-group-item-heading"><?php echo $value['unidad']?></h4>   
                                    <p class="list-group-item-text">Trigonometría</p>
                                </div>
                            </a>
                            <?php
                        }
                    ?>
                     
                      
                </div>
            </div>
        </div>
         <!--Container Central-->
        <div class="col-md-6">
            <div class="center-block quitar-float text-center espacio-arriba-pequeno">
                 <!--Imagen-->
                <img src="img/profile.png" class="animated tada"/>
                <h1 style="padding:30px;"><?php echo $infoUser['nombre'] ;?></h1>
                <h3>Email: <?php echo $infoUser['email'] ;?></h3>
                <h3>Username: <?php echo $infoUser['username'] ;?> </h3>
                <h3>Género: <?php echo $infoUser['sexo'] ;?></h3>
            </div>
        </div>
         <!--Container Derecho-->
        <div class="col-md-3">
            <a href="javascript:void(0)" class="btn btn-primary btn-sm flip-der">
                <i class="mdi-image-dehaze"></i>
            </a>
            <div class="panel panel-primary container-ch pan-der">
                <div class="panel-heading">
                    <div class="row-action-primary">
                            </div>
                    <h3 class="panel-title">Progreso</h3>
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
            });
        </script>
        <!--Esconder paneles-->
        
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
}
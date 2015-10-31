<html>


    <head>

        <!--MAP-->

        <style>
          #map {
            width: 250px;
            height: 250px;
          }
        </style>

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
         <script src="https://maps.googleapis.com/maps/api/js"></script>
        <title>Easy Math</title>
    </head>

    <body>

    <!-- Your site -->

    <!--NAVEGACIOON-->
    <div class="navbar navbar-default">
        <div class="navbar-header">
            
            <a class="navbar-brand pacifico" href="http://www.buap.mx">Prep. Enrique Cabrera Barroso</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                 <li>
                    <a href="perfil.php">Home
                 <i class="mdi-action-home pull-right"></i>
                     </a>
                 </li>
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


    <div class="row col-md-10 center-block quitar-float text-center">
        <!--Container Izquierdo-->
        <h1 style="padding:10px;" class="grande accent-color pacifico">Contácto</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Escríbenos</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="jumbotron">
                            <h4><b>Nuestros datos</b></h4>
                            <ul class="list-group">
                              <li class="list-group-item">
                                    Email: contacto@labcode.com.mx
                            </li>
                              <li class="list-group-item">
                                <a href="https://twitter.com/labcode3">
                                    Twitter: @labcode
                                </a>
                            </li>
                              <li class="list-group-item"> <a href="https://www.facebook.com/labcod">
                                    Facebook: @Lab Code
                                </a></li>
                            </ul>
                            <div id="map" class=" center-block quitar-float text-center"></div>
                        </div>
                        
                    </div>
                    <div class="col-md-8">
                        <form class="form-horizontal espacio-arriba-pequeno">
                            <fieldset>
                                <legend>Ingresa tus datos</legend>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label">Mensaje</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <button class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary"><i class="mdi-content-send"></i></button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
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
        <script>
          function initialize() {
            var mapCanvas = document.getElementById('map');
            var mapOptions = {
              center: new google.maps.LatLng(44.5403, -78.5463),
              zoom: 8,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions)
          }
          google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    

    </body>

</html>

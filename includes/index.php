<?php 

include('includes/sesiones.php');
include('includes/DB.php'); 
include('includes/configFB.php');

if(!logged_in()){

?>
<!-- MICVMX -->
<!-- CV DE USUARIO -->
<!-- PIXEL&CODE -->
<!-- 031014 -->
<!DOCTYPE html>
<html lang="es">
<head>
<!-- Nombre de Usuario -->
<title>Mi CV</title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Cache-control" content="public">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="CV DE DANN ARENAS">
<meta name="keywords" content="">
<meta name="author" content="">

<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

<!-- Google Web Fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,700,500' rel='stylesheet' type='text/css'>

<!-- Estilos CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/animations.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/flaticon.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="css/style.min.css" />
<link rel="stylesheet" type="text/css" href="colors/blue.css" id="colors" />
<!-- //Estilos CSS -->

</head>
<body>

      <div class="content padded dark">
              
              	<!-- Top Bar -->
              	<div class="top-bar">
                  
                  	<!-- Redes Sociales -->
                  	<div class="pull-left">
                         <a href='<?php  echo $helper->getLoginUrl(array('email')); ?>'><button type="button"  class="btn btn-fc">Ingresa con Facebook</button> </a>
                    </div>
                   
                </div>
      </div>
      		  <!-- Scripts -->
      <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="js/page-loader.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>

      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
      <script type="text/javascript" src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
      <script type="text/javascript" src="js/jquery.fitvids.js"></script>
      <script type="text/javascript" src="js/jquery.appear.js"></script>
      <script type="text/javascript" src="js/waypoints.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

      <!-- Custom Script -->
      <script type="text/javascript" src="js/custom.js"></script>
</body>
		 
  </html>

<?php
}else{
header("Location:http://nubespic.com/micv/micv.php");
}
?>

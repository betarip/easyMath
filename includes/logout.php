<?php
include("DB.php");
include("sesiones.php");




$usuarioRegistrado= $db->queryMySQL("UPDATE usuario SET login=0 WHERE idUsuario=".$_SESSION["id"]);

$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
session_start();
header("Location:../index.php");
exit();
?>
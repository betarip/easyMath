<?php
	require 'includes/DB.php';
	require 'includes/sesiones.php';
	require 'includes/infoUsuario.php';

	
		$id_usuario=$_GET['email'];
		$idpass=$_GET['password'];
		$variable = acceso($id_usuario,$idpass,$db);
		if ($variable != null) {
			# code...
			$_SESSION["userid"]= $variable['id'];
			echo '<script language="javascript">window.location="perfil.php"</script>';
		}else
			echo '<script language="javascript">window.location="inicio_sesion.php?error=1"</script>';

	

?>
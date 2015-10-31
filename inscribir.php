<?php
	
	include 'includes/DB.php';
	$username = $_GET['idUser'];
	$tema = $_GET['id'];
	$insertarUsuario = $db->queryMySQL("INSERT INTO  estudia ( id_usuario ,  id_tema , progreso ) VALUES ('$username', '$tema', 0)");
	//$insertarUsuario = $db->queryMySQL("INSERT INTO  usuarios ( id ,  nombre ,  sexo ,  username ,  pass ,  email ,  escuela ,  matricula ) VALUES ('null','nombre','genero','username','password','email','escuela','matricula')");
	if ($insertarUsuario) {
		
		echo 1;
	} else {
		echo 0;
	}
?>
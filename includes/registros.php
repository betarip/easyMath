<?php
	include 'DB.php';
	include 'sesiones.php';
	$opcion = $_POST['opcion'];

	switch ($opcion) {
		case '1':
			$email = $_POST['datos']['email'];
			$genero= $_POST['datos']['genero'];
			$matricula = $_POST['datos']['matricula'];
			$nombre = $_POST['datos']['name'];
			$password = md5($_POST['datos']['password']);
			$escuela = $_POST['datos']['prepa'];
			$username = $_POST['datos']['username'];
			$insertarUsuario = $db->queryMySQL("INSERT INTO  usuarios ( id ,  nombre ,  sexo ,  username ,  pass ,  email ,  escuela ,  matricula ) VALUES (null,'$nombre','$genero','$username','$password','$email','$escuela','$matricula')");
			//$insertarUsuario = $db->queryMySQL("INSERT INTO  usuarios ( id ,  nombre ,  sexo ,  username ,  pass ,  email ,  escuela ,  matricula ) VALUES ('null','nombre','genero','username','password','email','escuela','matricula')");
    		if ($insertarUsuario) {
    			$_SESSION["userid"]=$db->insert_id();
    			echo 1;
    		} else {
    			echo 0;
    		}
    		
    		
    		
			break;
		case '2':
			$pregunta = $_POST['datos']['idPregunta'];
			$respuesta = $_POST['datos']['respuesta'];
			$usuario = $_POST['datos']['idUser'];
			$tema = $_POST['datos']['idTema'];

			//query para insertar
			# INSERT INTO `easymath`.`contesta` (`id`, `id_usuario`, `id_pregunta`, `respuesta`, `id_tema`) VALUES (NULL, '1', '3', '1', '1');

			//buscar si ya contesto la pregunta
			$consulta = $db->queryMySQL("SELECT * from contesta where id_usuario ='$usuario' and id_tema = '$tema' and id_pregunta = '$pregunta'");
			
			$nbr=$db->num_rows($consulta);
			if($nbr==0){	
				//SE INSERTA
				echo "1";
				$consulta = $db->queryMySQL(" INSERT INTO contesta (id, id_usuario, id_pregunta, respuesta, id_tema) VALUES (NULL, '$usuario', '$pregunta', '$respuesta', '$tema')");	
				
			}else{
				//sE ACTUALIZA
				#UPDATE `contesta` SET `id_pregunta` = '4' WHERE 
				$consulta = $db->queryMySQL("UPDATE contesta SET id_pregunta = '$respuesta' WHERE id_usuario =".$usuario."and id_tema = ".$tema ."and id_pregunta = ".$pregunta);					
				
				echo "1";
			}


		
		default:
			# code...
			break;
	}

?>

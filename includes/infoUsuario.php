<?php
 
 
 function info_usuario($id_usuario,$db){
	
	$consulta = $db->queryMySQL("SELECT * FROM usuarios	 WHERE id=" .$id_usuario);
	$usr_info = $db->fetch_a_result_assoc($consulta);
	$nbr=$db->num_rows($consulta);
	
 	if($nbr==0){	
		return null;
	}else{
		return $usr_info;

	}
 }


 function acceso($id_usuario,$idpass,$db){
	
	$query = "SELECT * FROM usuarios WHERE email = '$id_usuario'";
	$consulta = $db->queryMySQL($query);
	$usr_info = $db->fetch_a_result_assoc($consulta);
	$nbr=$db->num_rows($consulta);
	
 	if($nbr==0){	
		return null;
	}else{
		return $usr_info;

	}
 }

 function temas_id($id_tema,$db){
 	$query = "SELECT * FROM temas WHERE id = '$id_tema'";
	$consulta = $db->queryMySQL($query);
	$usr_info = $db->fetch_a_result_assoc($consulta);
	$nbr=$db->num_rows($consulta);
	
 	if($nbr==0){	
		return null;
	}else{
		return $usr_info;

	}

 }

function temas_disponibles_para_usuario($id_usuario,$db){

//query : select * from temas where id != (select id_tema from estudia where id_usuario= 1)
	//checar si tiene temas
	$query = "select id_tema from estudia where id_usuario=".$id_usuario;
	$consulta = $db->queryMySQL($query);
	$nbr=$db->num_rows($consulta);
	
	if($nbr == 0){
		$consulta = $db->queryMySQL("SELECT id,tema, unidad from temas where id != 0");

	}else
		$consulta = $db->queryMySQL("SELECT id,tema, unidad from temas where id !=  (select id_tema from estudia where id_usuario=".$id_usuario." )");
	$i=0;
	$nbr=$db->num_rows($consulta);
	if($nbr==0){	
		return 0;
	}else{
		while($usr_tema = mysqli_fetch_assoc($consulta)){
			
			$respuesta[]=$usr_tema;
			$i++;
		}
		return $respuesta;
	}
}

function temas_del_usuario($id_usuario,$db){
	$consulta = $db->queryMySQL("SELECT id,tema, unidad,progreso from temas,estudia where id =".$id_usuario);
	$i=0;
	$nbr=$db->num_rows($consulta);
	if($nbr==0){	
		return 0;
	}else{
		while($usr_tema = mysqli_fetch_assoc($consulta)){
			
			$respuesta[]=$usr_tema;
			$i++;
		}
		return $respuesta;
	}

 }

 function preguntas_del_tema($id_tema,$db){
	$consulta = $db->queryMySQL("SELECT * from preguntas where id_tema =".$id_tema);
	$i=0;
	$nbr=$db->num_rows($consulta);
	if($nbr==0){	
		return 0;
	}else{
		while($usr_tema = mysqli_fetch_assoc($consulta)){
			
			$respuesta[]=$usr_tema;
			$i++;
		}
		return $respuesta;
	}

 }

 function obtenerRespuesta($id_usuario,$id_tema,$db){
 	$consulta = $db->queryMySQL("SELECT * from contesta where id_tema ='$id_tema' and id_usuario = '$id_usuario'");
	$i=0;
	$nbr=$db->num_rows($consulta);
	if($nbr==0){	
		return 0;
	}else{
		while($usr_tema = mysqli_fetch_assoc($consulta)){
			
			$respuesta[]=$usr_tema;
			$i++;
		}
		return $respuesta;
	}

 }
 
?>
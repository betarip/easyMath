<?php
include("DB.php");
include("sesiones.php");
$errores ="";

	//verificamos si fue pasado el archivo
	$idF = $_SESSION['userid'];
	if(isset($_FILES['fileImage'])){
		/** datos del archivo **/
		$archivo = $_FILES['fileImage'];
		//temporal del archivo
		$archivo_tmp = $archivo['tmp_name'];
		//nombre del archivo
		$archivo_nombre = $archivo['name'];
		//tamaño del archivo
		$archivo_tam = $archivo["size"];
		$tam_MB = $archivo_tam/1048576;
		//tipo del archivo
		$archivo_tipo = $archivo["type"];
		//dimensiones del archivo
		$dimensiones = getimagesize($archivo_tmp);
		//ancho del archivo
		$ancho = $dimensiones[0];
		//alto del archivo
		$alto = $dimensiones[1];
		/********************/
		/** Prefijo de las imagenes**/
			$prefijo_imgs = 'Nubespic_';
			/** Carpeta en donde se alojaran las imagenes **/
			$carpeta_imgs = "nubespic/".$idF."/";
			if(!is_dir("../".$carpeta_imgs."")) {
				if(!mkdir("../".$carpeta_imgs, 0777, true)) {
					echo('Fallo al crear las carpetas...');
				}
			}
		/** Verifica si es un archivo de tipo imagen **/
		if ($archivo_tipo != 'image/jpg' && $archivo_tipo != 'image/jpeg' && $archivo_tipo != 'image/png' && $archivo_tipo != 'image/gif'){
		  $errores.= "Error, el archivo no es una imagen<br>";
		}
		/** Verifica si el archivo pesa menos de 3MB**/
		if($tam_MB > 3){
			$errores.= "Error, el tamaño máximo permitido son 3MB<br>";
		}
		if(empty($errores)){
			// Verificamos la extensión del archivo independiente del tipo mime
			$extension = explode('.',$archivo_nombre);
			$num = count($extension)-1;
			/** Declaro la ruta a la que se va a enviar la imagen.
			La ruta contiene la carpeta destino, el prefijo de las imagenes, la hora (la fecha Unix actual) y el
			nombre de la imgen a subir.
			**/
			$destino = $carpeta_imgs.$prefijo_imgs.time().'.'.$extension[$num];
			/** Intentamos copiar el archivo **/
			if(is_uploaded_file($archivo_tmp)){
				/** Intentamos mover nuestro archivo temporal a la nueva ruta **/
				if(move_uploaded_file($archivo_tmp,'../'.$destino)){
					/** Insertamos la ruta de nuestra imagen en la base de datos **/
					$id=$_SESSION["id"];
					$insercion=$db->queryMySQL("INSERT INTO imagen VALUES('NULL','$id','$destino','$ancho','$alto')");
					if(!$insercion){echo $db->error();exit();}
					echo "Se subio la imagen con exito!!!<br>
					<p><img  width='25%' src='http://nubespic.com/$destino' /></p>
                <p><a class='btn btn-primary' href='http://nubespic.com/$destino' role='button'>Ver Imagen en tamaño completo</a></p>";
				$consulta = $db->queryMySQL("SELECT * FROM imagen WHERE ruta = '$destino'");
				$arreglo = $db->fetch_a_result_assoc($consulta);
                echo "<p><a class='btn btn-primary' href='http://nubespic.com/image-page.php?idImg=$arreglo[idImagen]' role='button'>Ver Imagen en la plantilla</a></p>";
				}else{
					echo "No se pudo mover el archivo";
				}
			}else{
				echo "No se pudo mover el archivo";
			}

		}else{
			echo "Estos son los siguientes errores:<br>$errores";
		}
	}else{
		echo "No se envio por el tipo file";
	}
?>

<?php
require_once( 'lib/Facebook/FacebookSession.php' );
require_once( 'lib/Facebook/FacebookRequest.php' );
require_once( 'lib/Facebook/FacebookResponse.php' );
require_once( 'lib/Facebook/FacebookSDKException.php' );
require_once( 'lib/Facebook/FacebookRequestException.php' );
require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
require_once( 'lib/Facebook/GraphObject.php' );
require_once( 'lib/Facebook/GraphUser.php' );
require_once( 'lib/Facebook/GraphSessionInfo.php' );
require_once( 'lib/Facebook/Entities/AccessToken.php' );
require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookCurl;
$app_id='1566678260239016';
$app_secret ='c237a840aaf9371f56806a01767960a0';
$redirect_url='http://nubespic.com/index.php';

FacebookSession::setDefaultApplication($app_id,$app_secret);
$helper=new FacebookRedirectLoginHelper($redirect_url);
$sess = $helper->getSessionFromRedirect();
$mensaje="";
if (isset($sess)) {
  $request = new FacebookRequest($sess,'GET','/me');
  $response = $request->execute();
  $graph = $response->getGraphObject(GraphUser::className());
  $name = $graph->getName();
  $id = $graph->getId();
  setcookie("TestCookie", "cookie de prueba");
  $email = $graph->getProperty('email');
  $imagen = "https://graph.facebook.com/".$id."/picture";
  $_SESSION["user"]=$name;
  $_SESSION["userid"]=$id;
  $_SESSION["foto"]=$imagen;
  $consulta = $db->queryMySQL("SELECT * FROM usuario WHERE idFB = ".$id);
  $nbr=$db->num_rows($consulta);
  if($nbr==0){
    $insertarUsuario = $db->queryMySQL("INSERT INTO usuario (idUsuario,idFB,nombre,correo,login) VALUES ('NULL','$id','$name','$email',0)");
    $_SESSION["id"]=$db->insert_id();
  }else{
    $usuarioRegistrado= $db->queryMySQL("SELECT * FROM usuario WHERE idFB=".$id);
	$idSave = $db->fetch_a_result_assoc($usuarioRegistrado);
	
    $_SESSION["id"] = $idSave['idUsuario'];
	$valorSesion = $idSave['login'];
	if($valorSesion == 0){
		$usuarioRegistrado= $db->queryMySQL("UPDATE usuario SET login=1 WHERE idUsuario=".$idSave['idUsuario']);
	}
  }
  header("Location:http://nubespic.com/index.php");
  exit();
}
?>
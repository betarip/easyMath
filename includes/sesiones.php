<?php


session_start();

	function verify_session(){
		if(!logged_in()){
			header("Location:http://nubespic.com/index.php");
			exit();
		}
	}
	function logged_in(){
		
		return isset($_SESSION["userid"]);
	}
?>
<?php
	function comprobarToken($token){
		@session_start();
		// Comprobar si la session esta inicida.
		if(!isset($_SESSION['token'])){
			return false;
		}
		// Comprobar si es el mismo que tenemos
		// nosotros guardado.
		if($token==$_SESSION['token']){
			// si es valido devolver true;
			return true;
		} else {
			// si no es valido, devolver false
			return false;
		}
	}

	// Si comprobar_token(..) devuelve false
	if(!comprobarToken(@$_POST['token'])){
		$host  = $_SERVER['HTTP_HOST']; 
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		//$extra = 'index.php';
		header("Location: http://$host$uri/");
		exit;
	}
?>
<?php
	function generarToken(){
	   @session_start();
	   $token = md5(mt_rand(11,99999));
	   $_SESSION['token']=$token;
	   return $token;
	}
	$token = generarToken();
?>
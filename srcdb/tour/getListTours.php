<?php
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	include __DIR__ . '../../storage/tours.class.php';
	$singletonTours = Tours::singletonTours();
	if (isset($_POST['cat']) && isset($_POST['loc'])) {
	    $category = $_POST["cat"];
	    $location = $_POST["loc"];		
		$item = $singletonTours->getListTours($category,$location);
		echo $item;
	}
} else {
    //si no es una petición ajax decimos que no existe :)
    echo "Esta pagina no existe";
}
?>

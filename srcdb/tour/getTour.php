<?php
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	include __DIR__ . '../../storage/tours.class.php';
	$singletonTours = Tours::singletonTours();
	$term = !isset($_GET['term']) || $_GET['term'] == "undefined" ? 0 : $_GET['term'];
	$item = $singletonTours->indexTour($term);
	echo $item;
	
} else {
    //si no es una petición ajax decimos que no existe :)
    echo "Esta pagina no existe";
}
?>
<?php
//include __DIR__ . '../../comprobarToken.php';
include __DIR__ . '../../storage/tours.class.php';
if (isset($_POST['cat']) && isset($_POST['loc'])) {
	$singletonTours = Tours::singletonTours();
    $category = $_POST["cat"];
    $location = $_POST["loc"];		
	$item = $singletonTours->getLocations($category,$location);
	$countRows = count($item);
	echo "<select id='sortby' name='sortby'>";
	if($countRows>1){
		echo "<option value='*'>All</option>";
	}
    foreach($item as $row){		
		echo "<option value='".$row['id']."'>".$row['destination']."</option>";
	}	
	echo "</select>";
}
?>
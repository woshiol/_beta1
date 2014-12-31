<?php
	
if(isset($_POST['travel_cities']) && isset($_POST['username'])) {
	$travel_cities = $_POST['travel_cities'];
	$username = $_POST['username'];
	

	include_once("db_conx.php");
	
	if ($stmt=$db_conx->prepare("
								UPDATE travel_data
								SET city='$travel_cities'
								WHERE username='$username' 
								ORDER BY time DESC 
								LIMIT 1;
	
								")) {
		$stmt->bind_param("sss",$travel_cities,$username);
		$stmt->execute();
		$stmt->close();
	} else {
		echo "abcc";
	}
}

?>
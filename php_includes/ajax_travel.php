<?php
	
if(isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['username'])) {
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$username = $_POST['username'];
	$distance = $_POST['distance'];
	

	include_once("db_conx.php");
	
	if ($stmt=$db_conx->prepare("INSERT INTO travel_data (latitude, longitude, username, time, distance) VALUES ('$latitude', '$longitude', '$username', now(), '$distance')")) {
		$stmt->bind_param("sss",$latitude,$longitude,$username,$time,$distance);
		$stmt->execute();
		$stmt->close();
	} else {
		echo "abcc";
	}
}

?>
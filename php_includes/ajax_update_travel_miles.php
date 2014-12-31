<?php
	
if(isset($_POST['travel_miles']) && isset($_POST['username'])) {
	$travel_miles = $_POST['travel_miles'];
	$username = $_POST['username'];
	

	include_once("db_conx.php");
	
	if ($stmt=$db_conx->prepare("
								UPDATE users
								SET travel_miles='$travel_miles'
								WHERE username='$username';
	
								")) {
		$stmt->bind_param("sss",$travel_miles,$username);
		$stmt->execute();
		$stmt->close();
	} else {
		echo "abcc";
	}
}

?>
<?php
	
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	
	include_once("db_conx.php");
	
	if ($stmt=$db_conx->prepare("UPDATE users SET first_name = ?, last_name = ? WHERE email = ?")) {
		$stmt->bind_param("sss",$first_name,$last_name,$email);
		$stmt->execute();
		$stmt->close();
	} else {
		echo "abcc";
	}
}

?>
	


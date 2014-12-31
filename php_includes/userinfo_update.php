<?php
if (isset($_GET['id']) && isset($_GET['u']) && isset($_GET['e']) && isset($_GET['f']) && isset($_GET['l'])) {
	// Connect to database and sanitize incoming $_GET variables
    include_once("../php_includes/db_conx.php");
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
	$e = mysqli_real_escape_string($db_conx, $_GET['e']);
	// Evaluate the lengths of the incoming $_GET variable
	if($id == "" || strlen($u) < 3 || strlen($e) < 5){
		// Log this issue into a text file and email details to yourself
		header("location: ../message.php?msg=activation_string_length_issues");
    	exit(); 
	}
	// Check their credentials against the database
	$sql = "SELECT * FROM users WHERE id='$id' AND username='$u' AND email='$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
	// Evaluate for a match in the system (0 = no match, 1 = match)
	if($numrows == 0){
		// Log this potential hack attempt to text file and email details to yourself
		header("location: ../message.php?msg=Your credentials are not matching anything in our system");
    	exit();
	}
	// Match was found, you can activate them
	$sql = "UPDATE users SET first_name='2' WHERE id='$id' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
}
?>
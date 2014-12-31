<?php
include_once("php_includes/check_login_status.php");
// Initialize any variables that the page might echo
$u = "";
$sex = "Male";
$userlevel = "";
$profile_pic = "";
$profile_pic_btn = "";
$avatar_form = "";
$country = "";
$joindate = "";
$lastsession = "";
// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: http://www.songkeyu.com/_beta1");
    exit();	
}
// Select the member from the users table
$sql = "SELECT * FROM users WHERE username='$u' AND activated='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}
// Check to see if the viewer is the account owner
$isOwner = "no";
if($u == $log_username && $user_ok == true){
	$isOwner = "yes";
	$profile_pic_btn = '<a href="#" onclick="return false;" onmousedown="toggleElement(\'avatar_form\')">Click to Edit</a>';
	$avatar_form  = '<form id="avatar_form" enctype="multipart/form-data" method="post" action="php_parsers/photo_system.php">';
	$avatar_form .=   '<input type="file" name="avatar" required>';
	$avatar_form .=   '<p><input type="submit" value="Upload"></p>';
	$avatar_form .= '</form>';
}
// Fetch the user row from the query above
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$profile_id = $row["id"];
	$gender = $row["gender"];
	$country = $row["country"];
	$userlevel = $row["userlevel"];
	$avatar = $row["avatar"];
	$signup = $row["signup"];
	$lastlogin = $row["lastlogin"];
	$joindate = strftime("%b %d, %Y", strtotime($signup));
	$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
}
if($gender == "f"){
	$sex = "Female";
}
$profile_pic = '<img src="user/'.$u.'/'.$avatar.'" alt="'.$u.'">';
if($avatar == NULL){
	$profile_pic = '<img src="img/300x300.png" alt="'.$user1.'">';
}
?>


<script>
	$(document).ready(function() {
		var username = <?php echo json_encode($username); ?>;
		var check = <?php echo json_encode($check); ?>;
		if (check == 0) {
			$("#user-panel").append("<li><a href='login-register.php'><span>Log In</span></a></li>");
		} else {
			$("#user-panel").append("<li><a href='user.php?u="+username+"'><i class='fa fa-user'></i>Overview</a></li>");
			$("#user-panel").append("<li><a href='user-profile-settings.php?u="+username+"'><i class='fa fa-cog'></i>Settings</a>");
			$("#user-panel").append("<li><a href='user-profile-booking-history.php?u="+username+"'><i class='fa fa-clock-o'></i>Booking History</a>");
			$("#user-panel").append("<li><a href='user-profile-cards.php?u="+username+"'><i class='fa fa-credit-card'></i>Cards</a>");
			$("#user-panel").append("<li><a href='user-profile-wishlist.php?u="+username+"'><i class='fa fa-heart-o'></i>Wishlist</a>");
		}
	});
	
</script>  


<style type="text/css">
div#profile_pic_box{float:right; border:transparent; width:150px; height:120px; margin:23px; overflow-y:hidden;}
div#profile_pic_box > img{z-index:100; width:200px;}
div#profile_pic_box > a {
	display: none;
	position:absolute; 
	margin:91px 0px 0px 39px;
	z-index:4000;
	background:rgba(0,  0,  0, 0.5);
	border:rgba(255, 255, 255, 0) 1px solid;
	border-radius:3px;
	padding:5px;
	font-size:12px;
	text-decoration:none;
	color:#ffffff;
}
div#profile_pic_box > form{
	display:none;
	position:absolute; 
	z-index:3000;
	padding:10px;
	opacity:.8;
	background:rgba(78, 78, 78, 1);
	width:150px;
	height:120px;
}
div#profile_pic_box:hover a {
    display: block;
}
</style>              
       
       
                
<div class="col-md-3">
    <aside class="user-profile-sidebar">
        <div class="user-profile-avatar text-center">
            <div id="profile_pic_box"><?php echo $profile_pic_btn; ?><?php echo $avatar_form; ?><?php echo $profile_pic; ?></div>
            <h5><?php echo $first_name; ?> <?php echo $last_name; ?></h5>
            <p>Member Since May 2012</p>
        </div>
        <ul class="list user-profile-nav" id="user-panel">
            
            
            
        </ul>
    </aside>
</div>
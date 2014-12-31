
<head>
    <title>OdysseyLife - Your Multicultural Life Starts Here</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="Traveler - Premium template for travel companies">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
	<script src="js/ajax.js"></script>
	

</head>

<?php
session_start();
include_once("php_includes/db_conx.php");
$user_ok = false;

$log_id = "";
$log_username = "";
$log_password = "";

if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$u = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$p = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	
	$sql = "SELECT * FROM users WHERE id='$id' AND username='$u' AND password='$p' AND activated='1' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$profile_id = $row["cid"];
		$email = $row["email"];
		$first_name = $row["firstName"];
		$last_name = $row["lastName"];
		#$gender = $row["gender"];
		#$country = $row["country"];
		$userlevel = $row["userlevel"];
		#$travel_miles = $row["travel_miles"];
		#$travel_world = $row["travel_world"];
		#$travel_cities = $row["travel_cities"];
		#$travel_countries = $row["travel_countries"];
		#$travel_trips = $row["travel_trips"];
		$signup = $row["signupt"];
		#$lastlogin = $row["lastlogin"];
		#$joindate = strftime("%b %d, %Y", strtotime($signup));
		#$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
	}
}


?>



<?php 
	$username = $_SESSION['username'];
	$check = 0;
	if(isset($_SESSION['username'])) {
		$check = 1;
	} else {
		$check = 0;
	}
?>



<div>
	<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>    
<script>
	$(document).ready(function() {
 
    setTimeout(function(){
        $('body').addClass('loaded');
        $('h1').css('color','#222222');
	}, 0);
 
	});
</script>

<script>
	$(document).ready(function() {
		var username = <?php echo json_encode($username); ?>;
		var firstname = <?php echo json_encode($firstName); ?>;
		var check = <?php echo json_encode($check); ?>;
		if (check == 0) {
			$("#userinfo").append("<li><a href='login-register.php'><span>Log In / Register</span></a></li>");
		} else {
			$("#userinfo").append("<li class='top-user-area-avatar'><a href='user.php?u="+username+"'><img class='origin round' src='img/40x40.png' alt='Image Alternative text' title='Me' />Hi, " + firstname + "</a></li>");
			$("#userinfo").append("<li><a href='logout.php'><span>Log Out</span></a></li>");
		}
	});
	
</script>




<?php 
// Render the Header
$directory = basename($_SERVER['PHP_SELF']);
$class = substr(basename($_SERVER['PHP_SELF']), 0, 3);
$subclass = substr(basename($_SERVER['PHP_SELF']), 0, 10);
?>



<header id="main-header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="logo" href="index.php">
                        <img src="img/logo-invert.png" width="110" height="40" alt="OdysseyLife" title="OdysseyLife" />
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <form class="main-header-search">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-search input-icon"></i>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="top-user-area clearfix">
                        <ul class="top-user-area-list list list-horizontal list-border" id="userinfo">
                            
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="nav">
            <ul class="slimmenu" id="slimmenu">
                <li class="<?php echo ($class== 'ind')?'active':'';?>"><a href="index.php">Home</a>
                </li>
                <li class="<?php echo ($class== 'abo')?'active':'';?>"><a href="about.php">About Us</a>
                </li>
                <li class="<?php echo ($class== 'clu')?'active':'';?>"><a href="club-search.php">Club</a>
                </li>
                <li class="<?php echo ($class== 'pri')?'active':'';?>"><a href="prime-search.php">Prime</a>
                </li>
                <li class="<?php echo ($class== 'hom')?'active':'';?>"><a href="homestay-search.php">Homestay</a>
                </li>
                <li
            </ul>
        </div>
    </div>
</header>


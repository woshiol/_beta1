<?php
// FOR REGISTERING 1
session_start();
// If user is logged in, header them away
if(isset($_SESSION["username"])){
	
	ob_start(); // ensures anything dumped out will be caught

	$url = 'http://www.songkeyu.com/_beta1';
	
	// clear out the output buffer
	while (ob_get_status()) 
	{
	    ob_end_clean();
	}
	
	// no redirect
	header( "Location: $url" );
	
    exit();
}
?><?php
// FOR REGISTERING 2
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["usernamecheck"])){
	include_once("php_includes/db_conx.php");
	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
	$sql = "SELECT id FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $uname_check = mysqli_num_rows($query);
    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">OdysseyLife ID must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
}
?>


<?php
// EMAIL CHECKING
if(isset($_POST["emailcheck"])){
	include_once("php_includes/db_conx.php");
	$email = $_POST['emailcheck'];
	$emailtail = substr($email, -4);
	$sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $e_check = mysqli_num_rows($query);
    if (strlen($email) < 3 || strlen($email) > 88) {
	    echo '<strong style="color:#F00;">3 - 88 characters please</strong>';
	    exit();
    }
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    echo '<strong style="color:#F00;">This does not seem like an email address X_X</strong>';
	    exit();
    } 	elseif ($emailtail != ".edu") {
		    echo '<strong style="color:#F00;">Could you tell us your .edu email address? O_O</strong>';
		    exit();
    	}
    if ($e_check < 1) {
	    echo '<strong style="color:#009900;">' . $email . ' is OK! Awesome! ^_^</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $email . ' is taken</strong>';
	    exit();
    }
}
?>


<?php
//FOR REGISTERING 3
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){
	// CONNECT TO THE DATABASE
	include_once("php_includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = $_POST['p'];
	$g = preg_replace('#[^a-z]#', '', $_POST['g']);
	$c = preg_replace('#[^a-z ]#i', '', $_POST['c']);
	$l = 1;
	if (isset($_POST['signupbtn2'])){
		$l= 2;
	}
	else if(isset($_POST['signupbtn2'])){
		$l= 3;
	}
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
	$e_check = mysqli_num_rows($query);
	// FORM DATA ERROR HANDLING
	if($u == "" || $e == "" || $p == ""){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){ 
        echo "The OdysseyLife ID you entered is already taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "OdysseyLife ID must be between 3 and 16 characters";
        exit(); 
    } else if (is_numeric($u[0])) {
        echo 'OdysseyLife ID cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
        $p_hash = md5($p);
		// Add user info into the database table for the main site table
		$sql = "INSERT INTO users (username, email, password, ip, signup, lastlogin, notescheck, User level)       
		        VALUES('$u','$e','$p_hash','$ip',now(),now(),now(), '$l')";
		$query = mysqli_query($db_conx, $sql); 
		$uid = mysqli_insert_id($db_conx);
		// Establish their row in the useroptions table
		$sql = "INSERT INTO useroptions (id, username, background) VALUES ('$uid','$u','original')";
		$query = mysqli_query($db_conx, $sql);
		// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("user/$u")) {
			mkdir("user/$u", 0755);
		}
		// Email the user their activation link
		$to = "$e";							 
		$from = "sky.s@odysseylife.com";
		$subject = 'OdysseyLife Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>yoursitename Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.songkeyu.com/OdysseyWebsite/root"><img src="http://http://www.songkeyu.com/OdysseyWebsite/root/images/main-logo.png" width="36" height="30" alt="OdysseyLife" style="border:none; float:left;"></a>OdysseyLife Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.songkeyu.com/_beta1/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$e.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "signup_success";
		exit();
	}
	exit();
}
?>




<?php
//FOR LOGIN 1/2
include_once("php_includes/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == true){
	header("location: user.php?u=".$_SESSION["username"]);
    exit();
}
?><?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["e"])){
	// CONNECT TO THE DATABASE
	include_once("php_includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = md5($_POST['p']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
		echo "login_failed";
        exit();
	} else {
	// END FORM DATA ERROR HANDLING
		$sql = "SELECT id, username, password FROM users WHERE email='$e' AND activated='1' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		if($p != $db_pass_str){
			echo "login_failed";
            exit();
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    		setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE users SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
			echo $db_username;
		    exit();
		}
	}
	exit();
}
?>



<!DOCTYPE HTML>
<html class="full">

<head>
    <title>OdysseyLife - Login and Register</title>


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
    <script src="js/modernizr.js"></script>
    
    


	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="style/style.css">
	<script src="js/main.js"></script>
	<script src="js/ajax.js"></script>
	<script type="text/javascript">
function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "email"){
		rx = /[' "]/gi;
	} else if(elem == "username"){
		rx = /[^a-z0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}

function emptyElement(x){
	_(x).innerHTML = "";
}

function checkusername(){
	var u = _("username").value;
	if(u != ""){
		_("unamestatus").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "login-register.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}

function checkemail(){
	var e = _("email").value;
	if(e != ""){
		_("estatus").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "login-register.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("estatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("emailcheck="+e);
	}
}







function signup(){ //1
	var u = _("username").value;
	var e = _("email").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var status = _("status");
	if(u == "" || e == "" || p1 == "" || p2 == ""){  //2
		status.innerHTML = "Please fill out all fields :)";
	} //1 close
	else if(p1 != p2){ //3 
		status.innerHTML = "Your password fields do not match :(";
	} // 2 close 
	else { // 4
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "login-register.php");
        ajax.onreadystatechange = function() { //5
	        if(ajaxReturn(ajax) == true) { //6
	            if(ajax.responseText != "signup_success"){  //7
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} //3 close
				else { //8
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				} //4 close
	        } //5 close
        } //6 close
        ajax.send("u="+u+"&e="+e+"&p="+p1);
	} 
}

function signup2(){ //1
	var u = _("username").value;
	var e = _("email").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var status = _("status");
	if(u == "" || e == "" || p1 == "" || p2 == ""){  //2
		status.innerHTML = "Please fill out all fields :)";
	} //1 close
	else if(p1 != p2){ //3 
		status.innerHTML = "Your password fields do not match :(";
	} // 2 close 
	else { // 4
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "login-register.php");
        ajax.onreadystatechange = function() { //5
	        if(ajaxReturn(ajax) == true) { //6
	            if(ajax.responseText != "signup_success"){  //7
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} //3 close
				else { //8
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				} //4 close
	        } //5 close
        } //6 close
        ajax.send("u="+u+"&e="+e+"&p="+p1);
	} 
}

function login(){
	var e = _("email0").value;
	var p = _("password0").value;
	if(e == "" || p == ""){
		_("status0").innerHTML = "Fill out all of the form data";
	} else {
		_("loginbtn").style.display = "none";
		_("status0").innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "login-register.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("status0").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn").style.display = "block";
				} else {
					window.location = "user.php?u="+ajax.responseText;
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}



/* function addEvents(){
	_("elemID").addEventListener("click", func, false);
}
window.onload = addEvents; */
</script>






</head>

<body class="full">

    <!-- FACEBOOK WIDGET -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">

        <div class="full-page">
            <div class="bg-holder full">
                <div class="bg-mask"></div>
                <div class="bg-img" style="background-image:url(img/background-starrysky.jpg);"></div>
                <div class="bg-holder-content full text-white">
                    <a class="logo-holder" href="index.php">
                        <img src="img/logo-white.png" width="110" height="40" alt="Image Alternative text" title="Image Title" />
                    </a>
                    <div class="full-center">
                        <div class="container">
                            <div class="row row-wrap" data-gutter="60">
                                <div class="col-md-4">
                                    <div class="visible-lg">
                                        <h3 class="mb15">Welcome to OdysseyLife</h3>
                                        <p>In the 21st century, the geographical borders have been almost eliminated. It is so easy to travel anywhere on Earth. Once you obtain your visa and book your flight, the next thing you know is that you are in a completely different country.</p>
                                        <p>However, the cultural borders remain significant despite technological advancements. They prevent people from owning the true freedom of interaction across nations. At OdysseyLife, we are dedicated to eliminating those invisible borders, so that no one will be underprivileged because of the differences in culture.</p>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <h3 class="mb15">Login</h3>
                                    <form id="loginform" onsubmit="return false;">
                                        <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                            <label>Email</label>
                                            <input type="text" id="email0" onfocus="emptyElement('status0')" maxlength="88" class="form-control" placeholder="e.g. johndoe@gmail.com" />
                                        </div>
                                        <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                            <label>Password</label>
                                            <input type="password" id="password0" onfocus="emptyElement('status0')" maxlength="100" class="form-control" type="password" placeholder="my secret password" />
                                        </div>
                                        <input id="loginbtn" onclick="login()" class="btn btn-primary" type="submit" value="Sign in" />
                                        <span id="status0"></span>
                                    </form>
                                    <form>
                                        <div align="right"><a href="forgot_pass.php">Forget Password?</a></div>
                                    </form>
                                    
                         
									
									
                                </div>
                                <div class="col-md-4">
                                    <h3 class="mb15">New To OdysseyLife </h3>
                                    <form name="signupform" id="signupform" onsubmit="return false;">
                                        <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                            <label>OdysseyLife ID</label>
                                            <input id="username" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16" class="form-control" placeholder="e.g. TheOdysseus"/>
                                            <span id="unamestatus"></span>
                                        </div>
                                        <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                                            <label>Email</label>
                                            <input id="email" type="text" onblur="checkemail()" onkeyup="restrict('email')" maxlength="88" class="form-control" placeholder="e.g. johndoe@gmail.com"/>
                                            <span id="estatus"></span>
                                        </div>
                                        <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                            <label>Password</label>
                                            <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="16" class="form-control" type="password" placeholder="my secret password" />
                                        </div>
                                        <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                            <label>Password Again</label>
                                            <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="16" class="form-control" type="password" placeholder="my secret password" />
                                        </div>
						
                                            
                                        <input id="signupbtn" onclick="signup()" class="btn btn-primary" type="submit" value="Sign up for OdysseyLife" /> <br/>
                                        <input id="signupbtn2" onclick="signup2()" class="btn btn-primary" type="submit" value="Sign up as Captain for OdysseyLife" /><br/>
                                        <input id="signupbtn3" onclick="signup3()" class="btn btn-primary" type="submit" value="Sign up as Chapter President for OdysseyLife" />

                                        <span id="status"></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#">About</a>
                        </li>
                        <li><a href="#">Help</a>
                        </li>
                        <li><a href="#">Hot Deals</a>
                        </li>
                        <li><a href="#">Popular Locations</a>
                        </li>
                        <li><a href="#">Cheap Flights</a>
                        </li>
                        <li><a href="#">Business</a>
                        </li>
                        <li><a href="#">Media</a>
                        </li>
                        <li><a href="#">Developers</a>
                        </li>
                        <li><a href="#">Advertise</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/slimmenu.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-timepicker.js"></script>
        <script src="js/nicescroll.js"></script>
        <script src="js/dropit.js"></script>
        <script src="js/ionrangeslider.js"></script>
        <script src="js/icheck.js"></script>
        <script src="js/fotorama.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script src="js/typeahead.js"></script>
        <script src="js/card-payment.js"></script>
        <script src="js/magnific.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/tweet.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/gridrotator.js"></script>
        <script src="js/custom.js"></script>
    </div>
</body>

</html>



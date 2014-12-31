<!DOCTYPE HTML>
<html>

<?php include_once("_header.php"); ?>

<?php
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$u = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$p = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	
	$sql = "SELECT * FROM travel_data WHERE username='$u'  ORDER BY time DESC  LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$latitude = $row["latitude"];
		$longitude = $row["longitude"];
		$time = $row["time"];
	}
}
?>



<script type="text/javascript">
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(recordPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function recordPosition(position) {
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;	
    altitude = position.coords.altitude;
    heading = position.coords.heading;
    speed = position.coords.speed;
    username = "<?php echo $username; ?>";
    last_latitude = "<?php echo $latitude; ?>";
    last_longitude = "<?php echo $longitude; ?>";
    last_travel_miles = "<?php echo $travel_miles; ?>";
   
   // Calculation of the Distance bewteen two points on the Earth
    var latitude0 = eval(last_latitude);
    var longitude0 = eval(last_longitude);
    φ1 = latitude0  * (3.1415926535897932384626/180);
    φ2 = latitude  * (3.1415926535897932384626/180);
    Δφ = (latitude - latitude0) * (3.1415926535897932384626/180);
    Δλ = (longitude - longitude0) * (3.1415926535897932384626/180);
    var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
        Math.cos(φ1) * Math.cos(φ2) *
        Math.sin(Δλ/2) * Math.sin(Δλ/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var R = 6371;
    var distance = R * c * 0.621371; // distance in miles between this time and last time
    
    $.post( "php_includes/ajax_travel.php", { latitude:latitude, longitude:longitude, username:username, distance:distance})
			  .done(function(data) {
			    window.location = "user.php?u="+username;
			}).fail(function(data) {
				window.location = "user.php?u="+username; // THIS IS SUPPOSED TO BE AN ALERT
			});
	
	// Calculation of Travel Miles, World, Cities, Countries, and Trips
	var ltm = eval(last_travel_miles);
	travel_miles = ltm + distance;
	lat = latitude;
	lng = longitude;
	codeLatLng(lat, lng);
	
    $.post( "php_includes/ajax_update_travel_miles.php", { travel_miles:travel_miles, username:username})
			  .done(function(data) {
			    window.location = "user.php?u="+username;
			}).fail(function(data) {
				window.location = "user.php?u="+username; // THIS IS SUPPOSED TO BE AN ALERT
			});	
			
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

function initialize() {
	geocoder = new google.maps.Geocoder();
}
	
function codeLatLng(lat, lng) {
	var latlng = new google.maps.LatLng(lat, lng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			console.log(results)
			if (results[1]) {
				address_name = results[0].formatted_address;
				for (var i=0; i<results[0].address_components.length; i++) {
					for (var b=0;b<results[0].address_components[i].types.length;b++) {
	            		if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
							city = results[0].address_components[i];
							break;
	            		}
	        		}
	    		}
				city_name = city.long_name;
	    	} else {
				alert("No results found");
	    	}
	  	} else {
	    	alert("Geocoder failed due to: " + status);
	  	}
	});
}


</script>

<body onload="initialize()">
        <div class="container">
            <h1 class="page-title">My Profile</h1>
        </div>
        <div class="container">
            <div class="row">

			<?php include_once("_user-menu.php"); ?>

                <div class="col-md-9">
                    <h4>Total Traveled</h4>
                    <ul class="list list-inline user-profile-statictics mb30">
                        <li><i class="fa fa-dashboard user-profile-statictics-icon"></i>
                            <h5><?php echo round($travel_miles, 2); ?></h5>
                            <p>Miles</p>
                        </li>
                        <li><i class="fa fa-globe user-profile-statictics-icon"></i>
                            <h5><?php echo $travel_world; ?>%</h5>
                            <p>World</p>
                        </li>
                        <li><i class="fa fa-building-o user-profile-statictics-icon"></i>
                            <h5><?php echo $travel_cities; ?></h5>
                            <p>Cities</p>
                        </li>
                        <li><i class="fa fa-flag-o user-profile-statictics-icon"></i>
                            <h5><?php echo $travel_countries; ?></h5>
                            <p>Countries</p>
                        </li>
                        <li><i class="fa fa-plane user-profile-statictics-icon"></i>
                            <h5><?php echo $travel_trips; ?></h5>
                            <p>Trips</p>
                        </li>
                    </ul>
                    <button class="btn btn-primary btn-lg" onclick="getLocation()" type="submit">Check In</button>
                    <p id="demo"></p>
                    <div id="map-canvas" style="width:100%; height:400px;"></div>
                </div>
        </div>




        <div class="gap"></div>





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
    <?php include_once ("_footer.php"); ?>
</body>


</html>



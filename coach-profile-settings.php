<!DOCTYPE HTML>
<html>


<body>

<?php include_once("_header.php"); ?>
       


        <div class="container">
            <h1 class="page-title">Account Settings</h1>
        </div>


        <div class="container">
            <div class="row">

<?php include_once("_user-menu.php"); ?>

<script>
	$(function() {
		$("#saveinfobtn").click(function() {
			var first_name = $("#first_name").val();
			var last_name = $("#last_name").val();
			var email = $("#email").val();
			$.post( "php_includes/ajax.php", { first_name:first_name, last_name:last_name,email:email})
			  .done(function( data ) {
			    window.location = "user-profile-settings.php";
			}).fail(function(data) {
				alert("error");
			});
		});
	});
</script>


                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Personal Infomation</h4>
                            <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-swing"></i>
                                <label>First Name</label>
                                <input id="first_name" class="form-control" value="<?php echo $first_name; ?>" type="text" />
                            </div>
                            <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-swing"></i>
                                <label>Last Name</label>
                                <input id="last_name" class="form-control" value="<?php echo $last_name; ?>" type="text" />
                            </div>
							</br>
                            <h4>Contact Infomation</h4>
                            <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-swing"></i>
                                <label>E-mail</label>
                                <input disabled="disabled" id="email" class="form-control" value="<?php echo $email; ?>" type="text" />
                            </div>
                            <div class="form-group form-group-icon-left">
	                            <label>University</label>
	                            <div class="styled-select">
		                            <?php include_once("php_includes/university_list.php"); ?>
	                            </div>
                            </div>
                            <div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon input-icon-swing"></i>
                                <label>Phone Number</label>
                                <input class="form-control" id="phone" value="+1 202 555 0113" type="text" />
                            </div>
                            <div class="gap gap-small"></div>
                            <h4>Location</h4>
                            <div class="form-group form-group-icon-left"><i class="fa fa-plane input-icon input-icon-swing"></i>
                                <label>Home Airport</label>
                                <input class="form-control" value="London Heathrow Airport (LHR)" type="text" />
                            </div>
                            <div class="form-group">
                                <label>Street Address</label>
                                <input class="form-control" value="46 Gray's Inn Rd, London, WC1X 8LP" type="text" />
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" value="London" type="text" />
                            </div>
                            <div class="form-group">
                                <label>State/Province/Region</label>
                                <input class="form-control" value="London" type="text" />
                            </div>
                            <div class="form-group">
                                <label>ZIP code/Postal code</label>
                                <input class="form-control" value="4115523" type="text" />
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input class="form-control" value="United Kingdom" type="text" />
                            </div>
                            <hr>
                            <div id="saveinfobtn" class="btn btn-primary">Save Changes</div>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <h4>Change Password</h4>
                            <form>
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-swing"></i>
                                    <label>Current Password</label>
                                    <input class="form-control" type="password" />
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-swing"></i>
                                    <label>New Password</label>
                                    <input class="form-control" type="password" />
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-swing"></i>
                                    <label>New Password Again</label>
                                    <input class="form-control" type="password" />
                                </div>
                                <hr />
                                <input class="btn btn-primary" type="submit" value="Change Password" />
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="gap"></div>


<?php include_once ("_footer.php"); ?>





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



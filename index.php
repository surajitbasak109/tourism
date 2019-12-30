<?php
require('./init.php');

$conn = dbconnect();
$query = $conn->prepare("SELECT * FROM tbl_package WHERE status = 'Active';");
$query->execute();
$packages = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Goflysmart Pvt. Ltd.</title>
	<meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<!-- COMMON CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

	<!-- CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
	<style>
		.form {
			background-color: white;
			padding: 15px;
		}

		.modal {
			z-index: 999999 !important;
		}
	</style>

	<script>
		function validate() {
			var fullname = document.getElementById("name_txt2");

			var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
			var validname = regName.test(fullname.value);

			if (fullname.value == "") {
				alert("Please enter the Name.");
				fullname.focus();
				return false;
			} else if (!validname) {
				alert("Please enter your full name.");
				fullname.focus();
				return false;
			} else if (document.getElementById("email_txt2").value == "") {
				alert("Please enter the Email.");
				document.getElementById("email_txt2").focus();
				return false;
			} else if (document.getElementById("ph_txt2").value == "") {
				alert("Please enter the Contact No.");
				document.getElementById("ph_txt2").focus();
				return false;
			}

			re = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
			if (!re.test(document.getElementById("email_txt2").value)) {
				alert("Invalid Email ID.");
				document.getElementById("email_txt2").focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<body>

	<form method="post" action="enquiry.php" id="form1" onsubmit="return validate();">
		<div class="modal fade" id="qryfrm">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Hey Where you would like to plan you trip?</h5>
						<input type="hidden" name="pack_code" id="pack_code">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="qury-pnl-form">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-b-10">
									<label>Current City</label>
									<input name="city_txt" type="text" id="city_txt" placeholder="Current City" autocomplete="off" />
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 m-b-10">
									<label>Travel Month</label>
									<select name="tm_cmd2" id="tm_cmd2">
										<option selected="selected" value="Select Month">Select Month</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 m-b-10">
									<label>Your Name</label>
									<input name="name_txt2" type="text" id="name_txt2" placeholder="Full Name" autocomplete="off" pattern="/^[a-zA-Z ]+$/" required />
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 m-b-10">
									<label>Phone Number</label>
									<input name="ph_txt2" type="number" id="ph_txt2" placeholder="Phone No." autocomplete="off" value="" min="0" step="1" />
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 m-b-10">
									<label>Email id</label>
									<input name="email_txt2" type="text" id="email_txt2" placeholder="Email Id" autocomplete="off" />
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-b-10">
									<label>Additional Requirements</label>
									<textarea name="add_txt2" id="add_txt2" placeholder="Type Requirements"></textarea>
									<i class="fa fa-comment" aria-hidden="true"></i>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-b-15">
									<div class="form-checkbox">
										<input type="checkbox" class="form-check-input" value="" checked>
										<p>I hereby accept the Privacy Policy and authorize and its representatives to contact me.</p>
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 qury-pnl-form-btn mt-2">
									<input type="submit" name="Button2" value="Plan my Trip" onclick="return validate();" id="Button2" class="subbtn" formnovalidate="formnovalidate" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</form>

	<div id="preloader">
		<div class="sk-spinner sk-spinner-wave">
			<div class="sk-rect1"></div>
			<div class="sk-rect2"></div>
			<div class="sk-rect3"></div>
			<div class="sk-rect4"></div>
			<div class="sk-rect5"></div>
		</div>
	</div>
	<!-- End Preload -->

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header>
		<div id="top_line">
			<div class="container">
				<div class="row">
					<div class="col-6">


					</div>
					<div class="col-6">
						<ul id="top_links">
							<li>
								<a href="tel:09233444333"> <i class="icon-phone"></i><strong>09233 444 333</strong></a>
							</li>
							<li>
								<a href="mailto:holidays@goflysmart.com"><i class="icon-mail"></i><strong> holidays@goflysmart.com</strong></a>
							</li>

						</ul>
					</div>
				</div><!-- End row -->
			</div><!-- End container-->
		</div><!-- End top line-->

		<div class="container">
			<div class="row">
				<div class="col-3">
					<img src="./img/logo1.png" alt="" height="100px" width="100px">
				</div>

			</div>
		</div><!-- container -->
	</header><!-- End Header -->

	<main>
		<section id="hero">
			<div class="intro_title" style="background-image: url(img/slider/1.jpg);background-repeat: none;background-size: 100%;">
				<div class="offset-8 col-md-3 text-left form">
					<h6 class="text-center font-size-bold text-dark p-2">
						<strong> Get the quote for your Dream trip now!</strong>
					</h6>
					<hr>
					<form>
						<div class="form-group">

							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name">

						</div>
						<div class="form-group">

							<input type="text" class="form-control" id="phno" placeholder="Phone Number">
						</div>
						<div class="form-group">

							<input type="email" class="form-control" id="email2" placeholder=" Email Id" required>
						</div>
						<div class="form-group">

							<input type="text" class="form-control" id="destination" placeholder="Destination" required>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-block btn-danger ">Submit</button>
						</div>
					</form>
				</div>

			</div>
		</section>

		<!--/carousel-->
		<!-- <div class="white_bg">
			<div class="container margin_60">
				<div class="main_title">
					<h2>Plan <span>Your Tour</span> Easly</h2>
					<p>
						Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
					</p>
				</div>
				<div class="row feature_home_2">
                    <div class="col-md-4 text-center">
                        <img src="img/adventure_icon_1.svg" alt="" width="75" height="75">
                        <h3>Itineraries studied in detail</h3>
                        <p>Suscipit invenire petentium per in. Ne magna assueverit vel. Vix movet perfecto facilisis in, ius ad maiorum corrumpit, his esse docendi in.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="img/adventure_icon_2.svg" alt="" width="75" height="75">
                        <h3>Room and food included</h3>
                        <p> Cum accusam voluptatibus at, et eum fuisset sententiae. Postulant tractatos ius an, in vis fabulas percipitur, est audiam phaedrum electram ex.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="img/adventure_icon_3.svg" alt="" width="75" height="75">
                        <h3>Everything organized</h3>
                        <p>Integre vivendo percipitur eam in, graece suavitate cu vel. Per inani persius accumsan no. An case duis option est, pro ad fastidii contentiones.</p>
                    </div>
                </div>

             

			</div> -->
		<!-- End container -->
		</div>
		<div class="white_bg">
			<div class="container">

				<div class="main_title">
					<h2>Top <span>International</span> Destinations</h2>

				</div>

				<div class="row">

					<?php foreach ($packages as $row) : ?>
						<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
							<div class="hotel_container">
								<div class="ribbon_3 <?= $row->tag == "Popular" ? 'popular' : ''; ?>"><span><?= $row->tag; ?></span></div>
								<div class="img_container">
									<a href="#" id="<?= $row->pack_code ?>" data-toggle="modal" data-target="#qryfrm" data-id="<?= $row->pack_code ?>" class="enqfrmOpener">
										<span class="tourday hot" data-toggle="tooltip" data-placement="bottom" title="<?= $row->nights . " nights and " . $row->days . " days"; ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $row->nights . "n" . $row->days . "d"; ?></span>
										<img src="<?= base_url('uploads/' . $row->image); ?>" width="800" height="533" class="img-fluid" alt="image">
										<div class="info">
											<p><?= $row->description; ?></p>
											<div class="min_px text-center">(Min Pax - <?= $row->min_pax; ?>)</div>
										</div>
										<!-- <div class="score"><span>7.5</span>Good</div> -->
										<div class="short_info hotel">
											From/Per Person<span class="price"><sup>Rs.</sup><?= $row->rate_per; ?></span>
										</div>
									</a>
								</div>
								<div class="hotel_title">
									<h3><strong><?= $row->title; ?></strong></h3>
									<!-- <div class="rating">
										<i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
									</div> -->
									<!-- end rating -->
									<div class="more_info d-flex mt-3">
										<div class="itinerary">
											<ul>
												<?= $row->itn_hotel ? '<li data-toggle="tooltip" data-placement="top" title="Hotels Stay"><i class="fas fa-building"></i></li>' : ""; ?>
												<?= $row->itn_transport ? '<li data-toggle="tooltip" data-placement="top" title="Transportation"><i class="fas fa-bus"></i></li>' : ""; ?>
												<?= $row->itn_meal ? '<li data-toggle="tooltip" data-placement="top" title="Meal"><i class="fas fa-hamburger"></i></li>' : ""; ?>
												<?= $row->itn_sightseeing ? '<li data-toggle="tooltip" data-placement="top" title="Sightseein"><i class="fas fa-tram"></i></li>' : ""; ?>
											</ul>
										</div>
										<div class="pack_code"><?= $row->pack_code; ?></div>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box -->
						</div>
						<!-- End col -->
					<?php endforeach; ?>
				</div>
			</div>

		</div>
		<!-- /white_bg -->


		<!-- End container -->


		<!-- End white_bg -->


		<!-- End container -->
	</main>

	<!-- End main -->


	<footer class="revealed">
		<div class="container">
			<div class="row">
				<div class="offset-4 col-md-4 text-center">
					<h3>Need help?</h3>
					<a href="tel://09233444333" id="phone">09233 444 333</a>
					<a href="mailto:holidays@goflysmart.com" id="email_footer">holidays@goflysmart.com</a>
				</div>

			</div><!-- End row -->
			<div class="row">
				<div class="col-md-12">
					<div id="social_footer">
						<ul>
							<li><a href="https://www.facebook.com/Goflysmart" target="__blank"><i class="icon-facebook"></i></a></li>
							<li><a href="https://twitter.com/GoFlySmart" target="__blank"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/go_flysmart_holidays" target="__blank"><i class="icon-instagram"></i></a></li>
							<li><a href="https://www.pinterest.com/GoFlySmartOfficial" target="__blank"><i class="icon-pinterest"></i></a></li>
							<li><a href="https://goflysmart.tumblr.com" target="__blank"><i class="icon-tumbler"></i></a></li>
							<li><a href="https://www.linkedin.com/company/goflysmart" target="__blank"><i class="icon-linkedin"></i></a></li>
						</ul>
						<p>© Citytours 2018</p>
					</div>
				</div>
			</div><!-- End row -->
		</div><!-- End container -->
	</footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

	<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<input id="remember-me" type="checkbox" name="check">
						<label for="remember-me">Remember Me</label>
					</div>
					<div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_login"></div>
				<div class="text-center">
					Don’t have an account? <a href="javascript:void(0);">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Popup -->

	<!-- Common scripts -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>
	<script>
		function activatePlacesSearch() {
			var input = document.getElementById('city_txt');
			var autocomplete = new google.maps.places.Autocomplete(input);
		}
	</script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnH8rLSRL9zsSeL3uMdbPcPutWrvfH3dg&libraries=places&callback=activatePlacesSearch"></script>

</body>

</html>
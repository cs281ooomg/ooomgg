<?php 
require 'includes/autoload.php';
if($session_set){
    header('Location: index.php');
    exit;
}
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="th">

<head>
<title>OOOMG : Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"
	media="all" />
<link rel="stylesheet" href="css/shop.css" type="text/css"
	media="screen" property="" />
<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
<!-- Owl-carousel-CSS -->
<link rel="stylesheet" type="text/css" href="css/contact.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link
	href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
<link
	href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800"
	rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="banner_top innerpage" id="home">
		<?php require 'includes/header_inner.php';?>
		
		<!-- search -->
		<?php require 'includes/search_top.php';?>
	   <!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Register</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Join Us Now</h3>
			<p class="head_para">❤❤❤❤❤</p>
			<div class="inner_section_w3ls">
				<div class="col-md-8 col-md-offset-2 register_grid_right">
					<h6>Please fill this form to join with us.</h6>
					<form action="system/register_auth.php" method="post">
						<div class="col-md-6 col-sm-6 register_left_grid">
							<input type="text" name="accid" placeholder="Username" required=""> 
							<input type="password" name="accpass" placeholder="Password" required="">
							<input type="password" name="confirmpass" placeholder="Confirm password" required="">
							<input type="email" name="email" placeholder="Email" required=""> 
						</div>
						<div class="col-md-6 col-sm-6 register_left_grid">
							<input type="text" name="fname" placeholder="Fristname" required=""> 
							<input type="text" name="lname" placeholder="Lastname" required="">
						</div>
						<div class="col-md-6 col-sm-6 register_left_grid">
							<select class="register_select" name ="gender">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
							<input type="text" name="phonenumber" placeholder="Telephone number" required="">
						</div>
						<div class="clearfix"></div>
							<br> 
							<input type="submit" value="Submit"> 
							<input type="reset" value="Clear">
							
					</form>
				</div>

				<div class="clearfix"></div>

			</div>

			<div class="clearfix"></div>

		</div>
	</div>

	<!-- top product -->
	<?php require 'includes/top_product.php';?>
	<!-- //top product  -->
	
	<!-- footer -->
	<?php require 'includes/footer.php';?>
	<!-- //footer -->

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js --> 
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

</body>

</html>
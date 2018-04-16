<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php 
include ('includes/session.php');
//require 'control/AccountMgnt.php';
require 'control/config/config.php';
if(!$session_set){
    echo "<script language=\"JavaScript\">";
    echo "alert('Please login!!!')";
    echo "</script>";
    echo "<script> document.location.href=\"login.php\";</script>";
    exit();
}
$conn = new mysqli($hostname, $username, $password, $dbname);
$accType = "SELECT ACC_TYPE FROM ACCOUNT WHERE ACC_ID = '".$_SESSION['ACC_ID']."'";
$query = $conn->query($accType);
$result = $query->fetch_assoc();


//$acc = AccountMgnt::loginAuth('fookza2013', '12345678');
//echo $result;
//if ($acc->getTYPE() === '0'){
if ($result["ACC_TYPE"] == '0'){
    echo "<script language=\"JavaScript\">";
    echo "alert('You is not owner!!!')";
    echo "</script>";
    echo "<script> document.location.href=\"index.php\";</script>";
    exit();
}
else if ($result["ACC_TYPE"] == '1'){
    echo "<script language=\"JavaScript\">";
    echo "alert('Hello Owner')";
    echo "</script>";
}



?>
<!DOCTYPE html>
<html lang="th">

<head>
<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website
	Template | Contact :: w3layouts</title>
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
					<li>Contact</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Add Product</h3>
<!--		<p class="head_para">Add Some Description</p> -->
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>fill product you want to add.</h6>
					<form action="control/addProduct.php" method="post" enctype="multipart/form-data">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="pname" placeholder="Product Name"> <input
								type="text" name="pprice" placeholder="Price" >
						</div>
					<div class="col-md-6 col-sm-6 contact_left_grid">
                            Select image to upload:
                            <input type="file" name="fileToUpload" id="fileToUpload">
						</div>
						<div class="clearfix"></div>
						<textarea name="pdes" onfocus="this.value = '';"
							onblur="if (this.value == '') {this.value = 'Description...';}"
							>Description...</textarea>
						<input type="submit" value="Submit"> <input type="reset"
							value="Clear">
					</form>
				</div>
				<div class="col-md-5 contact-left">

						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>

			</div>

			<div class="clearfix"></div>

		</div>
	</div>

	<!-- /newsletter-->
	<div class="newsletter_w3layouts_agile">
		<div class="col-sm-6 newsleft">
			<h3>Sign up for Newsletter !</h3>
		</div>
		<div class="col-sm-6 newsright">
			<form action="#" method="post">
				<input type="email" placeholder="Enter your email..." name="email"
					required=""> <input type="submit" value="Submit">
			</form>
		</div>

		<div class="clearfix"></div>
	</div>
	<!-- //newsletter-->
	
	<!-- footer -->
	<?php require 'includes/footer.php';?>
	<!-- //footer -->

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
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
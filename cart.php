<?php
require 'includes/autoload.php';
if (!$session_set) {
    echo "<script language=\"JavaScript\">";
    echo "alert('Please login!!!')";
    echo "</script>";
    echo "<script> document.location.href=\"login.php\";</script>";
    exit();
} 
$cart = AccountMgnt::getMyCart($acc);
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
<title>OOOMG : Cart</title>
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
<link rel="stylesheet" type="text/css" href="css/checkout.css">
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
					<li>Cart</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Cart</h3>

				<div class="checkout-right">
					<h4>
						Your shopping cart contains: 
						<?php
                            if ($cart === NULL) {
                                echo '0';
                            } else {
                                echo count($cart->getItems(),COUNT_NORMAL);
                            }
                        ?> 
						Products
					</h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            $total = 0;
                            if ($cart != NULL) {
                                 $i = 1;
                                 foreach ($cart->getItems() as $product) {
                                        $total += $product->getPPrice() * $product->getPQuantity();
                                 ?>
    							<tr class="rem<?php echo $i;?>">
								<td class="invert"><?php echo $product->getPId();?></td>
								<td class="invert-image"><a
									href="product_detail.php?pro_id=<?php echo $product->getPId();?>"><img
										src="images/<?php echo $product->getPImages();?>" alt=" "
										class="img-responsive"></a></td>
								<td class="invert"><?php echo $product->getPName();?></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span><?php echo $product->getPQuantity();?></span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $product->getPPrice();?></td>
								<td class="invert">
									<div class="rem">
										<form action="control/remove_from_cart.php" method="post">
										<input type="hidden" name="pro_id" value="<?php echo $product->getPId(); ?>">
										<button type="submit" >
											<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
										</button>
										</form>
									</div>

								</td>
							</tr>
    							<?php
                                $i ++;
                                }
                            }
                            ?>
						</tbody>
					</table>
				</div>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<ul>
						<?php
                        if ($cart != NULL) {
                        foreach ($cart->getItems() as $product) {
                        ?>
							<li><?php echo $product->getPName(); ?> <i>-</i> <span><?php echo $product->getPPrice()*$product->getPQuantity(); ?> </span></li>
							<li>Total Service Charges <i>-</i> <span>$55.00</span></li>
						<?php } }?>
							<li>Total <i>-</i> <span><?php echo $total;?></span></li>
						</ul>
						<a href="#" class=""><h4>Check Out</h4></a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- top prodcut -->
	<?php require 'includes/top_product.php';?>
	<!-- //top product -->

	<!-- footer -->
	<?php require 'includes/footer.php';?>
	<!-- //footer -->
	<a href="#home" id="toTop" class="scroll" style="display: block;"> <span
		id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
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
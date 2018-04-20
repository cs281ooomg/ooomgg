<?php
require 'includes/autoload.php';
$productid=$_GET['pro_id'];
if (isset($productid)) {
    $product = Product::ShowProductDetail($productid);
} else {
    header("Location: 404.php");
}
$PID = (string)$productid;
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
<title>OOOMG : Detail</title>
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
<link rel="stylesheet" href="css/flexslider.css" type="text/css"
	media="screen" />
<link href="css/easy-responsive-tabs.css" rel='stylesheet'
	type='text/css' />
<!-- Owl-carousel-CSS -->
<link rel="stylesheet" type="text/css" href="css/checkout.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/custom-ooomg.css" rel="stylesheet" type="text/css" media="all" />
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
					<li><a href="product.php">product</a><i>|</i></li>
					<li><?php echo $product->getPname();?></li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">

						<ul class="slides">
							<li data-thumb="images/<?php echo $product->getPImages();?>">
								<div class="thumb-image">
									<img src="images/<?php echo $product->getPImages();?>"
										data-imagezoom="true" class="img-responsive">
								</div>
							</li>
							<li data-thumb="images/<?php echo $product->getPImages();?>">
								<div class="thumb-image">
									<img src="images/<?php echo $product->getPImages();?>"
										data-imagezoom="true" class="img-responsive">
								</div>
							</li>
							<li data-thumb="images/<?php echo $product->getPImages();?>">
								<div class="thumb-image">
									<img src="images/<?php echo $product->getPImages();?>"
										data-imagezoom="true" class="img-responsive">
								</div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3><?php echo $product->getPname();?></h3>
				<p>
					<span class="item_price"><?php echo $product->getPPrice();?> ฿</span>
				</p>
				<div class="description">
					<h5>Check delivery, payment options and charges at your location</h5>
				</div>
				<div class="color-quality">
					<div class="color-quality-right">
						<h5>Quality :</h5>
						<div class="quantity">
							<div class="quantity-select">
								<div class="entry value-minus">&nbsp;</div>
								<div class="entry value"><span>1</span></div>
								<div class="entry value-plus active">&nbsp;</div>
							</div>
						</div>
					</div>
				</div>
				<div class="occasional">

					<div class="clearfix"></div>
				</div>
				<div class="occasion-cart">
					<div class="shoe single-item single_page_b">
						<button class="button_add_to_cart" onclick="location.href='control/cartMgnt.php?pro_id=<?php echo $product->getPId();?>&mode=add';">
							Add to cart
						</button>
						<a href="control/add_favorite.php?pro_id=<?php echo $product->getPId();?>&mode=1" class="button add fav"> 
							<?php if(!$session_set){?>
							<span class="glyphicon glyphicon-heart-empty"></span>
							<?php }else {
							if ($acc->checkFavorite($_GET['pro_id'])){?>
							<span class="glyphicon glyphicon-heart"></span>
							<?php      } 
							      else {?>
							<span class="glyphicon glyphicon-heart-empty"></span>
							<?php      }?>
							<?php }?>
						</a>
					</div>

				</div>
				<ul class="social-nav model-3d-0 footer-social social single_page">
					<li class="share">Share On :</li>
					<li><a href="#" class="facebook">
							<div class="front">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</div>
							<div class="back">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</div>
					</a></li>
					<li><a href="#" class="twitter">
							<div class="front">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</div>
							<div class="back">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</div>
					</a></li>
					<li><a href="#" class="instagram">
							<div class="front">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</div>
							<div class="back">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</div>
					</a></li>
					<li><a href="#" class="pinterest">
							<div class="front">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</div>
							<div class="back">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</div>
					</a></li>
				</ul>

			</div>
			<div class="clearfix"></div>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Description</li>
						<li>Reviews</li>
						<li>Information</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">

							<div class="single_page">
								<h6><?php echo $product->getPName()?></h6>
								<p><?php echo $product->getPDescription()?></p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/t1.jpg" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><i class="fa fa-reply-all"
														aria-hidden="true"></i> Reply</a></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing
												elPellentesque vehicula augue eget.Ut enim ad minima veniam,
												quis nostrum exercitationem ullam corporis suscipit
												laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
												autem vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form action="#" method="post">
											<input type="text" name="Name" required="Name"> <input
												type="email" name="Email" required="Email">
											<textarea name="Message" required=""></textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								</div>

							</div>
						</div>
						<div class="tab3">

							<div class="single_page">
								<h6><?php echo $product->getPName()?></h6>
								<p><?php echo $product->getPDescription()?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $pro_fea_arr = Product::getFeaProduct($product);
	if($pro_fea_arr!=NULL){ ?>
			<div class="new_arrivals">
				<h3>Featured Products</h3>
				<!-- /fea -->
				<?php 
				$count = 0;
				foreach ($pro_fea_arr as $pro_fea) { 
				    $count++;    
				?>
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="images/<?php echo $pro_fea->getPImages();?>" alt="#" class = "img-responsive" style="height: 250px;overflow: hidden;">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="product_detail.php?pro_id=<?php echo $pro_fea->getPId();?>" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="product_detail.php?pro_id=<?php echo $product->getPId();?>">
										<?php 
										    $str = $pro_fea->getPName();
											if(strlen($str) <= 24){
											    echo $str.'</br>&nbsp;';
											}else{
											    echo $str;
											}
										?>
									</a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money "><?php echo $pro_fea->getPPrice();?></span>
											</div>
										</div>
									</div>
									<div class="shoe single-item hvr-outline-out">
										<button type="submit" class="shoe-cart pshoe-cart" onclick="location.href='control/cartMgnt.php?pro_id=<?php echo $product->getPId();?>&mode=add';">
											<i class="fa fa-cart-plus" aria-hidden="true"></i>
										</button>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<?php 
        				if($count === 4){
        				    break;
        				}
				    } 
				?>
				<!-- //womens -->
				<div class="clearfix"></div>
			</div>
			<!--//new_arrivals-->
	<?php } ?>	
		</div>
	</div>
	<!-- //top products -->
	<?php require 'includes/top_product.php';?>

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
	<!-- single -->
	<script src="js/imagezoom.js"></script>
	<!-- single -->
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
	<!-- FlexSlider -->
	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

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
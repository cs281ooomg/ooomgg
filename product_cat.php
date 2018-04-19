<?php
require 'includes/autoload.php';
$pag=$_GET['page'];
if (isset($pag)) {
	$product = Product::ShowProductDetail($pag);
} else {
	header("Location: 404.php");
}
//$PID = (string)$pag;
//echo $pag.'<br/>';
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
<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website
	Template | Shop :: w3layouts</title>
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
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
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
					<li><a href = "product.php">product</a></li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<!-- tittle heading -->

			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="search.php" method="post">
						<input type="search" placeholder="Product name..." name="search"
							required=""> <input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div> <input type="text" id="amount"
							style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!--preference -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Categories</h3>
					<ul>
						<li><a href="product.php"> <span class="span glyphicon glyphicon-menu-down"> All </span>
						</a></li>
						<?php 	$cataArr = Product::getallCatagory();?>
						<?php foreach ($cataArr as $cata) {
    						    if($cata->getCType()===$pag){ ?>
    						         <li>
                						<a href="product_cat.php?page=<?php echo $cata->getCType();?>"> 
                    						<span class="glyphicon glyphicon-menu-right"> 
                    							<b><?php echo $cata->getcName();?></b> 
                    						</span>
                						</a>
            						</li>
    				      <?php }else{ ?>
    						        <li>
                						<a href="product_cat.php?page=<?php echo $cata->getCType();?>"> 
                    						<span class="glyphicon glyphicon-menu-down"> 
                    							<?php echo $cata->getcName();?> 
                    						</span>
                						</a>
            						</li>
    					 <?php  }
					    	 }?>
					</ul>
				</div>
				<!-- // preference -->

			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="left-ads-display col-md-9">
				<div class="wrapper_top_shop">
					<div class="col-md-6 shop_left">
						<img src="images/banner3.jpg" alt="">
						<h6>40% off</h6>
					</div>
					<div class="col-md-6 shop_right">
						<img src="images/banner2.jpg" alt="">
						<h6>50% off</h6>
					</div>
					<div class="clearfix"></div>
					<!-- product-sec1 -->
					<div class="product-sec1">
						<!--/mens-->			
				  <?php
						$i = 0;
						$mode = false;
						$productArr = Product::getProduct($pag); 
						foreach ($productArr as $product) {
						if($i%3===0){
						    $mode = !$mode;
						}
						if($mode){
						    echo '<div class="col-md-4 product-men">';
						}else{
                            echo '<div class="col-md-4 product-men women_two">';
						}
						$i++;
				  ?>
							<div class="product-shoe-info shoe">
								<div class="men-pro-item">
									<div class="men-thumb-item">
										<img src="images/<?php echo $product->getPImages();?>" alt="#" style="width: 300px;height: 300px;overflow: hidden;">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product_detail.php?pro_id=<?php echo $product->getPId();?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
									</div>
									<div class="item-info-product">
										<h4>
											<a href="product_detail.php?pro_id=<?php echo $product->getPId();?>"><?php echo $product->getPName(); ?> </a>
										</h4>
										<div class="info-product-price">
											<div class="grid_meta">
												<div class="product_price">
													<div class="grid-price ">
														<span class="money "><?php echo $product->getPPrice(); ?>&nbsp;&nbsp;&nbsp; ฿</span>
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
						</div><?php } ?>
						
						
						<!-- //mens -->
						<div class="clearfix"></div>

					</div>

					<!-- //product-sec1 -->
					<div class="col-md-6 shop_left shp">
						<img src="images/banner4.jpg" alt="">
						<h6>21% off</h6>
					</div>
					<div class="col-md-6 shop_right shp">
						<img src="images/banner1.jpg" alt="">
						<h6>31% off</h6>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
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
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

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
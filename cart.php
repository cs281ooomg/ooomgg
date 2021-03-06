<?php
require 'includes/autoload.php';
if (!$session_set) {
    echo "<script language=\"JavaScript\">";
    echo "alert('Please login!!!')";
    echo "</script>";
    echo "<script> document.location.href=\"login.php\";</script>";
    exit();
} 
$cart = CartMgnt::getCartByAccount($account);
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
				<h3>Cart ( Your point : <?php echo ExtraPromotionMgnt::getMyPoint($account); ?> )</h3>
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
					<div class="table-responsive">
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
                                $cartMgnt = new CartMgnt();
                                if ($cart != NULL) {
                                    $i = 1;
                                    $items = $cart->getItems();
                                    foreach ($items as $cartItem){
                                        $product = $cartItem->getProduct();
                                        $quantity = $cartItem->getQuantity();
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
    												<span><?php echo $quantity;?></span>
    											</div>
    											<div class="entry value-plus active">&nbsp;</div>
    										</div>
    									</div>
    								</td>
    								<td class="invert">
    								<?php 
                					if($product->getPPromotions() != NULL){
                						$promotion = $product->getPPromotions();
                						echo PromotionMgnt::getNewPricePromotion($product).' ฿</br><del>'.$product->getPPrice().'</del>';
                					}else{
                						echo $product->getPPrice().' ฿';
                					}
                					?>
    								</td>
    								<td class="invert">
    									<div class="rem">
    										<a href="system/cart_mgnt.php?pro_id=<?php echo $product->getPId();?>&mode=remove"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
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
				</div>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<ul>
						<?php
						$vat = 0;
                        if ($cart != NULL) {
                        $items = $cart->getItems();
                        $total = $cartMgnt->getTotalPrice($cart);
                        $vat = $cartMgnt->getVatPriceByCart($cart);
                        $deliver = 0;
                        foreach ($items as $cartItem){
                            $product = $cartItem->getProduct();
                            $quantity = $cartItem->getQuantity();
                            $price = 0;
                            if($product->getPPromotions() != NULL){
                                $promotion = $product->getPPromotions();
                                $price = PromotionMgnt::getNewPricePromotion($product);
                            }else{
                                $price = $product->getPPrice();
                            }
                            $price = $price * $quantity;
                        ?>
							<li><?php echo $product->getPName().' x '.$quantity; 
							if($product->getPPromotions() != NULL){
							    $promotion = $product->getPPromotions();
							    echo ' ( -'.$promotion->getPercent().' % )';
							}
							?>
							<span><?php echo number_format($price,2); ?> ฿</span></li>	
						<?php } }?>
							<li>Total Service Charges (<?php echo CartMgnt::$vat;?>%)<span><?php echo number_format($vat,2);?> ฿</span></li>
							<li>Lower price for free Delivery Charge : <?php echo ExtraPromotionMgnt::getPriceFreeDelivery();?> ฿</li>
							<li>Delivery Charge
							<span>
							<?php if(ExtraPromotionMgnt::checkFreeDelivery($total)){
							     echo 'Free';
							}else{
							    $deliver = ExtraPromotionMgnt::$delivery;
							    echo $deliver;
							}?> ฿
							</span></li>
							<li>Total<span>
							<?php 
							$total+=$deliver;
							echo number_format($total,2);
							?> ฿</span></li>
							<?php if(ExtraPromotionMgnt::getMyPoint($account) > 0){
							    if($total - ExtraPromotionMgnt::getMyPoint($account) <= 0){
							        $total = 0;
							    }else{
							        $total -= ExtraPromotionMgnt::getMyPoint($account);
							    }
							    echo '<li>Total discount point ( '.ExtraPromotionMgnt::getMyPoint($account).' point)<span>'.number_format($total,2).' ฿</span></li>';
							}?>
							
						</ul>
						<a href="#" class=""><h4>Check Out</h4></a>
					</div>
					<div class="col-md-8 address_form">
						<h4>Add a new Details</h4>
						<form action="system/address_mgnt2.php?" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">			
										<div class="controls">
											<label class="control-label">Address type: </label>
											<select class="form-control option-w3ls" name ="add_index">
											<?php
											$allAddress = AddressMgnt::getAlladdress($acc);
											foreach ($allAddress as $add){?>
												<option value="<?php echo $add->getAdd_index()?>"><?php echo $add->showAddress();?></option>
											<?php }?>	
											</select>
										</div>
									</div>
									<button class="submit check_out">Delivery to this Address</button>
								</div>
							</section>
							<br>
						</form>
							<form action="address.php?" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
	
									<button class="submit check_out">Add address</button>
								</div>
							</section>
						</form>
						<div class="checkout-right-basket">
							<a href="system/order_mgnt.php?mode=create">Create Order</a>
						</div>
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
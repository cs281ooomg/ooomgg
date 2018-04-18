<?php
require 'autoload.php';
$name = $_POST['search'];
$searchArr = Product::searchWord($name);
?>


						<?php foreach ($searchArr as $product) {?>
						<div class="col-md-4 product-men">
							<div class="product-shoe-info shoe">
								<div class="men-pro-item">
									<div class="men-thumb-item">
										<img src="images/<?php echo $product->getPImages();?>" alt="#" style="max-width:480px;">
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
														<span class="money "><?php echo $product->getPPrice(); ?>&nbsp;&nbsp;&nbsp;ß</span>
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
						<?php } ?>
	
						
						
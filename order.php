
<?php
require 'includes/autoload.php';
if (!$session_set) {
	echo "<script language=\"JavaScript\">";
	echo "alert('Please login!!!')";
	echo "</script>";
	echo "<script> document.location.href=\"login.php\";</script>";
	exit();
} 
$order_id = $_GET['order_id'];
$order = OrderMgnt::getOrderByOrderID($order_id);
?>
<!DOCTYPE html>
<html lang="en" >
	<head>
	  <meta charset="UTF-8">
	  <title>OOOMG Order #<?php echo $order->getIndex();?></title>
	  <link rel="stylesheet" href="css/order.css">
	</head>
<body> 
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="order.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
	</head>
	<body>
		<header>
			<h1>OOOMG Order #<?php echo $order->getIndex();?></h1>
			<address>
				<p><?php echo $acc->getFNAME();?>  <?php echo $acc->getLNAME();?></p>
				<?php 	$add = OrderMgnt::getAddressByOrderId($order->getIndex()); ?>
				<p><?php echo $add->getInfo();?><br><?php echo $add->getDistrict(); ?> <?php echo $add->getSubDis();?>  <?php echo $add->getProvince(); ?><br><?php echo $add->getAddCode();?></p>
				<p><?php echo $acc->getTEL();?></p>
			</address>
			<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address>
				<p><?php echo $acc->getFNAME();?><br><?php echo $acc->getLNAME();?></p>
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span><?php echo $order->getIndex();?></span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span><?php echo $order->getDate(); ?></span></td>
				</tr>
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Item</span></th>
						
						<th><span>Rate</span></th>
						<th><span>Quantity</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
			<?php
                                $total = 0;
                                $orderItems = OrderMgnt::getOrderItemsByOrderID($order->getIndex());
                                if ($orderItems != NULL) {
                                    foreach ($orderItems as $item){
                                        $product = $item->getProduct();
                                        $quantity = $item->getQuantity();
                                    ?>
					<tr>
						<td><span><?php echo $product->getPName();?></span></td>
						
						<td><span data-prefix>$</span><span><?php echo $product->getPPrice();?></span></td>
						<td><span><?php echo $quantity;?></span></td>
						<td><span data-prefix>$</span><span><?php echo $product->getPPrice()*$quantity;?></span></td>
					</tr>
                          <?php		$total = $total+($product->getPPrice()*$quantity);
                                    }
                                }
                                ?>   
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>$</span><span><?php echo $total;?></span></td>
				</tr>
				<tr>
					<th><span>Vat 7%</span></th>
					<td><span data-prefix>$</span><span><?php echo $total*(7/100);?></span></td>
				</tr>
				<tr>
					<th><span>Balance Due</span></th>
					<td><span data-prefix>$</span><span><?php echo $total+$total*(7/100);?></span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
	</body>
</html>
  
</body>

</html>
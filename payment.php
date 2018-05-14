<?php 
require 'includes/autoload.php';
if($session_set){
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $order = OrderMgnt::getOrderByID($order_id);
        if($order === NULL){
            echo "<script> document.location.href=\"404.php\";</script>";
        }
    }else{
        echo "<script> document.location.href=\"404.php\";</script>";
    }
}else{
    echo "<script> document.location.href=\"404.php\";</script>";
}
?>
<html>
<head>
<title>EPAYLINK</title>
</head>
<body bgcolor="#FFFFFF" text="#000000">
	Confirm Your Order
	<form method="post" action="https://www.thaiepay.com/epaylink/payment.aspx">
		<input type="hidden" name="refno" value="<?php echo $order->getIndex(); ?>">
		<input type="hidden" name="merchantid" value="00000500">
		<input type="hidden" name="lang" value="TH">
		<input type="hidden" name="cc" value="00">
		<input type="hidden" name="postbackurl" value="localhost/ooomgg/payment.php?order_id=<?php echo $order->getIndex(); ?>&code=<?php echo $order->getCode(); ?>">
		<input type="hidden" name="returnurl" value="localhost/ooomgg/history.php">
		<input type="hidden" name="customeremail" value="<?php echo 'xxxx@gmail.com'?>"> 
		<input type="hidden" name="productdetail" value="OOOMG INSTRUMENT">
		<input type="hidden" name="total" value="<?php echo '10000'; ?>"><br>
		<input type="submit" name="Submit" value="Confirm Order">
	</form>
</body>
</html>

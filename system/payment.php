<?php
require 'autoload.php';
if ($session_set) {
    if (isset($_GET['order_id']) && isset($_GET['code'])) {
        $order_id = $_GET['order_id'];
        $code = $_GET['code'];
        $order = OrderMgnt::getOrderByID($order_id);
        if($order == NULL){
            echo "<script> document.location.href=\"../404.php\";</script>";
        }
        if($code === 'unconf'){
            echo "<script> document.location.href=\"../payment.php?order_id=$order_id\";</script>";
  		}else {
            if($code === $order->getCode()){
                if(OrderMgnt::changeStatus($order, Order::$DELIVERING)){
                    echo "<script language=\"JavaScript\">";
                    echo "alert('Payment Success!!')";
                    echo "</script>";
                    echo "<script> document.location.href=\"../history.php\";</script>";
                }else{
                    echo "<script language=\"JavaScript\">";
                    echo "alert('Payment fail!!')";
                    echo "</script>";
                    echo "<script> document.location.href=\"../history.php\";</script>";
                }
            }
        }
        echo "<script> document.location.href=\"../cart.php\";</script>";
    }
}else{
    echo "<script language=\"JavaScript\">";
    echo "alert('Please Login!!')";
    echo "</script>";
    echo "<script> document.location.href=\"../login.php\";</script>";
}
echo "<script> document.location.href=\"../404.php\";</script>";
?>
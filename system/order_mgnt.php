<?php
require 'autoload.php';
if ($session_set) {
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
        if($mode === 'create'){
            $todays_date = date("Y-m-d");
            $order = new Order(0, $todays_date, $account, OrderMgnt::generateCodeOrder(), Order::$UN_PAYMENT);
            if (OrderMgnt::createOrder($order, $acc)) {
                echo "<script language=\"JavaScript\">";
                echo "alert('Create order success!!')";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('Create order fail!!')";
                echo "</script>";
            }
        }else if($mode === 'remove'){
            OrderMgnt::test();
        }
       // echo "<script> document.location.href=\"../order.php\";</script>";
    }
}else{
    echo "<script language=\"JavaScript\">";
    echo "alert('Please Login!!')";
    echo "</script>";
    echo "<script> document.location.href=\"../login.php\";</script>";
}
//echo "<script> document.location.href=\"../404.php\";</script>";
?>
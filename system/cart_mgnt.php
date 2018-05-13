<?php
require 'autoload.php';
if ($session_set) {
    if (isset($_GET['pro_id']) && isset($_GET['mode'])) {
        $pro_id = $_GET['pro_id'];
        $product = ProductMgnt::getProduct($pro_id);
        $product->setPQuantity(1);
        $mode = $_GET['mode'];
        if($mode === 'add'){
            if (CartMgnt::addToMyCart($account,$product,1)) {
                echo "<script language=\"JavaScript\">";
                echo "alert('Add to cart success!!')";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('Add to cart fail!!')";
                echo "</script>";
            }       
        }else if($mode === 'remove'){
            if (CartMgnt::removeFromMyCart($account,$product)) {
                echo "<script language=\"JavaScript\">";
                echo "alert('Remove form cart success!!')";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('Remove form cart fail!!')";
                echo "</script>";
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
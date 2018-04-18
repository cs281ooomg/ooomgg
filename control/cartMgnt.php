<?php
require 'autoload.php';
if ($session_set) {
    if (isset($_GET['pro_id']) && isset($_GET['mode'])) {
        $pro_id = $_GET['pro_id'];
        $product = Product::ShowProductDetail($pro_id);
        $mode = $_GET['mode'];
        if($mode === 'add'){
            if ($account->addToMyCart($product)) {
                echo "<script language=\"JavaScript\">";
                echo "alert('Add to cart success!!')";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('Add to cart fail!!')";
                echo "</script>";
            }       
        }else if($mode === 'remove'){
            if ($account->removeFromMyCart($product)) {
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
}
echo "<script> document.location.href=\"../404.php\";</script>";
?>
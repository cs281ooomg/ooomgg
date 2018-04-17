<?php
require 'autoload.php';
$pro_id = $_POST['pro_id'];
$amount = $_POST['amount'];
$account = $_SESSION['ACC'];
if ($pro_id === "" || $amount === "") {
    //redirect
} else {
    if(AccountMgnt::addToMyCart($account, $pro_id, $amount)){
        echo "<script language=\"JavaScript\">";
        echo "alert('Add to cart success!!')";
        echo "</script>";
    }else{
        echo "<script language=\"JavaScript\">";
        echo "alert('Add to cart fail!!')";
        echo "</script>";   
    }
    echo "<script> document.location.href=\"../cart.php\";</script>";
}   
?>
<?php
require 'classes/Account.php';
if ($_GET["pro_id"]) {
    session_start();
    $session_set = false;
     if (isset($_SESSION['ACC'])) {
         $session_set = true;
     }
    if ($session_set) {
        require 'classes/config/config.php';
        $pro_id = $_GET["pro_id"];
        $acc_id = $_SESSION['ACC']->getID();
        if (Account::checkFavorite($pro_id, $acc_id)) {
            Account::removeFavorite($acc_id, $pro_id)  ;
        } else {
            Account::addFavorite($acc_id, $pro_id);    
        }
        header("location:../product_detail.php?pro_id=$pro_id");
       // echo "<script> document.location.href=\"../product.php\";</script>";
    }else 
    {
        header("Location:../login.php");
    }
}

?>

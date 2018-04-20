<?php
require 'autoload.php';
if ($_GET["pro_id"]) {
    $mode = $_GET['mode'];
    if ($session_set) {
        $pro_id = $_GET["pro_id"];
        if($mode==='remove')
        {
            $account->removeFavorite($pro_id);
            header("Location:../productFavorite.php");
        }
        else if($mode==='add')
        {
            if ($account->checkFavorite($pro_id)) {
                $account->removeFavorite($pro_id);
            } else {
                $account->addFavorite($pro_id);
            }
            header("location:../product_detail.php?pro_id=$pro_id");
            // echo "<script> document.location.href=\"../product.php\";</script>";
        }
        
    }else
    {
        header("Location:../login.php");
    }
}

?>

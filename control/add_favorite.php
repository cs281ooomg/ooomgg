<?php
require 'autoload.php';
if (! $session_set) {
    header("Location:../login.php");
}
if ($_GET["pro_id"] && $_GET["mode"]) {
    $pro_id = $_GET["pro_id"];
    $mode = $_GET["mode"];
    if($acc->checkFavorite($pro_id)) {
        $acc->removeFavorite($pro_id);
    } else {
        if($acc->addFavorite($pro_id)){
            echo "alert('add to wishlist complete')";
        }else{
            echo "alert('add to wishlist fail')";
        }
    }
    if($mode === '1'){
        header("location:../product_detail.php?pro_id=$pro_id");
    }else{
        header("location:../productFavorite.php");
    }
}else{
    header("Location:../404.php");
}

?>

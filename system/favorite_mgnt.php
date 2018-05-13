<?php
require 'autoload.php';
if (! $session_set) {
    header("Location:../login.php");
}
if ($_GET["pro_id"] && $_GET["mode"]) {
    $pro_id = $_GET["pro_id"];
    $mode = $_GET["mode"];
    if(FavoMgnt::checkFavorite($account,$pro_id)) {
        if(FavoMgnt::removeFavorite($account,$pro_id)){
            echo "<script>alert('Remove wishlist complete')</script>";
        }else{
            echo "<script>alert('Remove wishlist fail')</script>";
        }
    } else {
        if(FavoMgnt::addFavorite($account,$pro_id)){
            echo "<script>alert('add to wishlist complete')</script>";
        }else{
            echo "<script>alert('add to wishlist fail')</script>";
        }
    }
    if($mode === '2'){
        echo "<script> document.location.href=\"../product_fav.php\";</script>";
    }else{
        echo "<script> document.location.href=\"../product_detail.php?pro_id=$pro_id\";</script>";
    }
}else{
    header("Location:../404.php");
}

?>

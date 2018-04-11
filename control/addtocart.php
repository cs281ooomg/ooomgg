<?php
    if( $_GET["pro_id"]) {
        echo "Add to card ". $_GET['pro_id']. "<br />";
        //insert code to add prodcut to cart table
        exit();
    }else{
        echo "<script> document.location.href=\"../product.php\";</script>";
    }
?>
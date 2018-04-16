<?php
require 'classes/Account.php';
if ($_GET["pro_id"]) {
    session_start();
    $session_set = false;
    if (isset($_SESSION['ACC'])) {
        $session_set = true;
    }
    if ($session_set) {
        $pro_id = $_GET["pro_id"];
        $acc_id = $_SESSION['ACC']->getID();
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO CART(CART_INDEX,ACC_ID,PRODUCT_ID,QUANTITY) VALUES ('" . $pro_id . "','" . $acc_id . "',1,1)";
        $query = $conn->query($sql);
    }
    }else{
        echo "<script> document.location.href = \"../product.php\";</script>";
    }
?>
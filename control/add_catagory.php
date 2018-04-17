<?php

require 'ProductMgnt.php';
include'../control/config/config.php';
$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}

$name = $_REQUEST['cname'];
if (empty($name)) {
    echo "<script language=\"JavaScript\">";
    echo "alert('Please fill information.')";
    echo "</script>";
    echo "<script> document.location.href=\"../add_catagory.php\";</script>";
    exit();
}
else {

    if (ProductMgnt::checkCatagory($name)){
        ProductMgnt::addCatagory($name);
    }else {
        echo "<script language=\"JavaScript\">";
        echo "alert('Have this catagory already.')";
        echo "</script>";
        echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
        exit();
    }
}

?>
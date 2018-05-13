<?php
require 'autoload.php';
$name = $_REQUEST['cname'];
if (empty($name)) {
    echo "<script language=\"JavaScript\">";
    echo "alert('Please fill information.')";
    echo "</script>";
    echo "<script> document.location.href=\"../add_category.php\";</script>";
    exit();
}
else {

    if (CategoryMgnt::checkCategory($name)){
        CategoryMgnt::addCategory($name);
    }else {
        echo "<script language=\"JavaScript\">";
        echo "alert('Have this catagory already.')";
        echo "</script>";
        echo "<script> document.location.href=\"../add_category.php\";</script>";
        exit();
    }
}

?>
<?php

require 'AddMgnt.php';
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
    echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
    exit();
}
else {
/*    $sql = "SELECT * FROM CATAGORY WHERE CAT_NAME='".$name."' ";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if (!$result) {
        $sql1 = "INSERT INTO CATAGORY(CAT_NAME)
		VALUES('".$name."');";
        if($conn->query($sql1)===TRUE){
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new catagory successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
            exit();
            
        }else{
            echo "Error".$sql. "<br>" .$conn->error;
        }
        $conn->close();
    }
    else{
        echo "<script language=\"JavaScript\">";
        echo "alert('Have this catagory already.')";
        echo "</script>";
        echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
        exit();
    }*/
    if (AddMgnt::checkCatagory($name)){
        AddMgnt::addCatagory($name);
    }else {
        echo "<script language=\"JavaScript\">";
        echo "alert('Have this catagory already.')";
        echo "</script>";
        echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
        exit();
    }
}

?>
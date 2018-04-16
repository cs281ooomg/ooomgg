<?php
session_start();
$session_set = false;
if(isset($_SESSION['ACC_ID'])){
    $session_set = true;
}

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
        $sql = "INSERT INTO CATAGORY(CAT_NAME)
		VALUES('".$name."');";
        
        
        if($conn->query($sql)===TRUE){
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




?>
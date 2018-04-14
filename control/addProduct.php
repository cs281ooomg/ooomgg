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


$name = $_REQUEST['pname'];
$image = $_REQUEST['fileToUpload'];
$price = $_REQUEST['pprice'];
$des = $_REQUEST['pdes'];


$sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_images,PRO_PRICE,PRO_DESC)
		VALUES('".$name."','".$image."','".$price."','".$des."');";


if($conn->query($sql)===TRUE){
    echo "New Records sql Created Succressfully";
}else{
    echo "Error".$sql. "<br>" .$conn->error;
}

$conn->close();








?>
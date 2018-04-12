<?php
session_start();
$session_set = false;
if(isset($_SESSION['ACC_ID'])){
    $session_set = true;
}
$accType = "SELECT ACC_TYPE FROM ACCOUNT WHERE ACC_ID = '".$_SESSION['ACC_ID']."'";
$query = $conn->query($accType);
$result = $query->fetch_assoc();

//if ($_REQUEST['ACC_TYPE'] == '1') {


include'../config/config.php';
$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}


$id = $_REQUEST['pid'];
$name = $_REQUEST['pname'];
$price = $_REQUEST['pprice'];
$des = $_REQUEST['pdes'];


$sql = "INSERT INTO PRODUCT(PRO_INDEX,PRO_NAME,PRO_PRICE,PRO_DESC)
		VALUES('".$id."','".$name."','".$price."','".$des."');";


if($conn->query($sql)===TRUE){
    echo "New Records sql Created Succressfully";
}else{
    echo "Error".$sql. "<br>" .$conn->error;
}

$conn->close();
//}
//else{
    echo "<script language=\"JavaScript\">";
    echo "alert('คุณไม่ใช่เจ้าของร้าน')";
    echo "</script>";
    echo "<script> document.location.href=\"index.php\";</script>";
    exit();
//}







?>
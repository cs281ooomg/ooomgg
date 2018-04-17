<?php
session_start();
$session_set = false;
if(isset($_SESSION['ACC_ID'])){
    $session_set = true;
}
//include'../classes/Favorite.php';
include'classes/config/config.php';

$conn = new mysqli($hostname,$username,$password,$dbname);

$sql = "DElETE FROM FAVORITE WHERE ACC_ID='".$_SESSION['ACC_ID']."'AND PRO_ID='12345'";
echo $_SESSION['ACC_ID'];
if ($conn->query($sql) === TRUE) {
    echo "delete success";
}
else
{
    echo "fail";
}

$conn->close();
?>


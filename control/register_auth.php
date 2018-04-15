<?php
include'../config/config.php';
$conn = new mysqli($hostname,$username,$password,$dbname);
$userinput = $_POST['accid'];
$passinput = $_POST['accpass'];

$sql ="SELECT * FROM ACCOUNT WHERE ACC_ID='".$userinput."' ";
$query= $conn->query($sql);
$result = $query->fetch_assoc();
if ($result) {
    echo"<script language=\"JavaScript\">";
    echo"alert('ซ้ำจร้า')";
    echo"</script>";
    echo "<script> document.location.href=\"../register.php\";</script>";
}
else{
    $sql = "INSERT INTO ACCOUNT (ACC_ID,ACC_PASS,ACC_FNAME,ACC_LNAME,ACC_EMAIL,ACC_TEL)
            VALUES ('".$userinput."','".$passinput."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone-number']."')";
    $query= $conn->query($sql);
    echo"<script language=\"JavaScript\">";
    echo"alert('Registration Complete!\\nYour account has been confirmed.')";
    echo"</script>";
    echo "<script> document.location.href=\"../login.php\";</script>";
    
}







$conn->close();


?>
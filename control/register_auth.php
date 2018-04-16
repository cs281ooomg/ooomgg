<?php
require 'config/config.php';
require 'AccountMgnt.php';
$userinput = $_POST['accid'];
$passinput = $_POST['accpass'];
$fname = $_POST['accid'];
$lname = $_POST['accid'];
$email = $_POST['accid'];
$phonenumber = $_POST['accid'];

if (AccountMgnt::registerAuth($userinput)) {
    AccountMgnt::createAcc($userinput, $passinput, $fname, $lname, $email, $phonenumber);
} else {
    echo "<script language=\"JavaScript\">";
    echo "alert('ซ้ำจร้า')";
    echo "</script>";
    echo "<script> document.location.href=\"../register.php\";</script>";
}
?>
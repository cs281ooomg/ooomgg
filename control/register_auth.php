<?php
require 'config/config.php';
require 'AccountMgnt.php';
$userinput = $_POST['accid'];
$passinput = $_POST['accpass'];
$confirmpass = $_POST['confirmpass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];

if (AccountMgnt::registerAuth($userinput)) {
    AccountMgnt::createAcc($userinput, $passinput, $fname, $lname, $email, $phonenumber);
} else {
    echo "<script language=\"JavaScript\">";
    echo "alert('ซ้ำจร้า')";
    echo "</script>";
    echo "<script> document.location.href=\"../register.php\";</script>";
}
?>
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
$gender = $_POST['gender'];

if ($passinput===$confirmpass){
    if (AccountMgnt::registerAuth($userinput)) {
        if (AccountMgnt::createAcc($userinput, $passinput, $fname, $lname, $email, $phonenumber,$gender)){
            echo "<script language=\"JavaScript\">";
            echo "alert('Registration Complete!\\nYour account has been confirmed.')";
            echo "</script>";
            echo "<script> document.location.href=\"../login.php\";</script>";
        }else {
            echo "<script language=\"JavaScript\">";
            echo "alert('Registration Fail!')";
            echo "</script>";
            echo "<script> document.location.href=\"../register.php\";</script>";
        }
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ซ้ำจร้า')";
        echo "</script>";
        echo "<script> document.location.href=\"../register.php\";</script>";
    }
}else {
    echo "<script language=\"JavaScript\">";
    echo "alert('Password ซ้ำไม่ตรงกันจร้า')";
    echo "</script>";
    echo "<script> document.location.href=\"../register.php\";</script>";
}
?>
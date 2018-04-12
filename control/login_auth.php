<?php
require '../classes/Account.php';
require 'AccountMgnt.php';

$userinput = $_POST['username'];
$passinput = $_POST['password'];
if ($userinput === "" || $passinput === "") {
    echo "<script language=\"JavaScript\">";
    echo "alert('กรุณาใส่ข้อมูลให้ครบถ้วน')";
    echo "</script>";
    echo "<script> document.location.href=\"../login.php\";</script>";
} else {
    $ac = AccountMgnt::loginAuth($userinput, $passinput);
    if ($ac != null) {
        session_start();
        $_SESSION["ACC_ID"] = $ac->getID();
        
        session_write_close();
        
        echo "<script language=\"JavaScript\">";
        echo "alert('Welcome " . $result["ACC_FNAME"] . " " . $result["ACC_LNAME"] . "')";
        echo "</script>";
        echo "<script> document.location.href=\"../index.php\";</script>";
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ไม่พบบัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')";
        echo "</script>";
        echo "<script> document.location.href=\"../login.php\";</script>";
    }
}
?>
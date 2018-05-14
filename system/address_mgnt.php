<?php
require 'autoload.php';
$province = $_POST['province'];
$district = $_POST['district'];
$subdis = $_POST['subdis'];
$addcode = $_POST['addcode'];
$addinfo = $_POST['addinfo'];

if (AddressMgnt::addAddress($acc, $province, $district, $subdis, $addcode, $addinfo)) {
    echo "<script>alert('success')</script>";
    echo "<script> document.location.href=\"../show_alladd.php\";</script>";
} else {
    echo "<script>alert('fail')</script>";
    echo "<script> document.location.href=\"../address.php\";</script>";
}

?>
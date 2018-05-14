<?php

require 'autoload.php';
if(! $session_set){
    
    echo "<script>alert('Please log in')</script>";
    echo "<script> document.location.href=\"../login.php\";</script>";
    exit;
}
$add= $_POST['add_index'];

if(AddressMgnt::lastAddress($add))
{
    echo "<script>alert('Select success')</script>";
    echo "<script> document.location.href=\"../cart.php\";</script>";
}else
{
    echo "<script>alert('fail')</script>";
    echo "<script> document.location.href=\"../cart.php\";</script>";
}
?>
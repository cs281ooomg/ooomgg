<?php
require 'autoload.php';
if ($session_set) {
    if (isset($_POST['topic'])) {
        $topic = $_POST['topic'];
        if(PromotionMgnt::sendEmailNoti($topic)){
            echo "<script language=\"JavaScript\">";
            echo "alert('Send promotion email success!!')";
            echo "</script>";
            echo "<script> document.location.href=\"../promotion_mgnt.php\";</script>";
        }else{
            echo "<script language=\"JavaScript\">";
            echo "alert('Send promotion email fail!!!')";
            echo "</script>";
            echo "<script> document.location.href=\"../promotion_mgnt.php\";</script>";
        }
    }
}
echo "<script> document.location.href=\"../404.php\";</script>";
?>
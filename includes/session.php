<?php
    session_start();
    $session_set = false;
    if(isset($_SESSION['ACC_ID'])){
        $session_set = true;
    }
?>
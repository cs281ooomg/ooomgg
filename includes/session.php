<?php
    session_start();
    $session_set = false;
    if(isset($_SESSION['ACC'])){
        $session_set = true;
    }
?>
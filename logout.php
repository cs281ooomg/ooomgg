<?php
    session_start();
    session_destroy(); 
    unset($_SESSION['ACC']);
    header("location:index.php");
?>
<?php
function __autoload($class_name) {
    if(file_exists('system/classes/'.$class_name . '.php')) {
        require_once('system/classes/'.$class_name . '.php');
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}
require 'session.php';
if ($session_set) {
    $acc = $_SESSION['ACC'];
}
?>
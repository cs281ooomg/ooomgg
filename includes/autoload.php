<?php
function __autoload($class_name) {
    if(file_exists('control/classes/'.$class_name . '.php')) {
        require_once('control/classes/'.$class_name . '.php');
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}
require 'session.php';
if ($session_set) {
    $acc = $_SESSION['ACC'];
}
?>
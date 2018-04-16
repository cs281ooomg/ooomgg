<?php
require 'classes/Product.php';
require 'classes/Catagory.php';

class AddMgnt
{

    public static function checkProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME='".$name."' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>
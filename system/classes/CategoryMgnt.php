<?php

class CategoryMgnt
{
    public static function getAllCategory()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATEGORY ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Category($result["CAT_INDEX"], $result["CAT_NAME"],NULL);
            $resultArray[] = $product;
        }
        return $resultArray;
    }
    
    public static function checkCategory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATEGORY WHERE CAT_NAME='" . $name . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }
    
    public static function addCategory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO CATEGORY(CAT_NAME) VALUES('" . $name . "');";
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new catagory successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_category.php\";</script>";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>
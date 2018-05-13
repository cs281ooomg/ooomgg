<?php

class CategoryMgnt
{
    public static function getallCategory()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATEGORY ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Category($result["CAT_INDEX"], $result["CAT_NAME"]);
            $resultArray[] = $product;
        }
        return $resultArray;
    }
    
    public static function checkCatagory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY WHERE CAT_NAME='" . $name . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }
    
    public static function addCatagory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO CATAGORY(CAT_NAME)
		VALUES('" . $name . "');";
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new catagory successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_catagory.php\";</script>";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>
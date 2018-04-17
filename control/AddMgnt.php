<?php

class AddMgnt
{

    public static function checkProduct($name)
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
    
    public static function addProduct($name,$image,$price,$des,$type)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_images,PRO_PRICE,PRO_DESC,CAT_INDEX)
		VALUES('".$name."','".$image."','".$price."','".$des."', '".$type."');";
        if($conn->query($sql)===TRUE){
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new product successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_Product.php\";</script>";
            exit();
            
        }else{
            echo "Error".$sql. "<br>" .$conn->error;
        }
        
        $conn->close();
    }
    
    public static function checkCatagory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY WHERE CAT_NAME='".$name."' ";
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
		VALUES('".$name."');";
        if($conn->query($sql)===TRUE){
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new catagory successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
            exit();
            
        }else{
            echo "Error".$sql. "<br>" .$conn->error;
        }
        $conn->close();
        
    }
    
    
    
    
    
    
    
    
    
    
}
?>
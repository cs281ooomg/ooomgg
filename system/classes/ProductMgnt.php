<?php
class ProductMgnt
{
    public static function getProduct($pro_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_INDEX ='" . $pro_index . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0,NULL);
        return $product;
    }
    
    public static function getAllProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0,NULL);
            $resultArray[] = $product;
        }
        shuffle($resultArray);
        return $resultArray;
    }
    
    public static function getFeaProduct($product)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE (CAT_INDEX = '" . $product->getPType() . "' OR CAT_INDEX = '4') AND (PRO_INDEX != '" . $product->getPID() . "');";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0,NULL);
            $resultArray[] = $product;
            $i ++;
        }
        if ($i === 0) {
            return NULL;
        }
        shuffle($resultArray);
        return $resultArray;
    }
    
    public static function checkProduct($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME='" . $name . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }
    
    public static function addProduct($name, $image, $price, $des, $type)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_IMAGE,PRO_PRICE,PRO_DESC,PRO_STOCKS,CAT_INDEX)
		VALUES('" . $name . "','" . $image . "','" . $price . "','" . $des . "','0', '" . $type . "');";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new product successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_product.php\";</script>";
            exit();
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('Fail to add product.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_product.php\";</script>";
            exit();
        }
        
        $conn->close();
    }
       
   
    public static function search($name)
    {
        require 'config/config.php';
        
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME LIKE '%$name%'";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
            $resultArray[] = $product;
            $i++;
        }
        if($i==0){
            return null;
        }
        return $resultArray;
    }
    
    public static function getAllProductByCat($cat_index)
    {
        require 'config/config.php';
        $sql = "SELECT * FROM PRODUCT WHERE CAT_INDEX = '".$cat_index."'";
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $query = $conn->query($sql);
        $i = 0;
        $resultArray = array();
        while ($resultt = $query->fetch_array()) {
            $product = new Product($resultt["PRO_INDEX"], $resultt["PRO_NAME"], $resultt["PRO_IMAGE"], $resultt["PRO_PRICE"], $resultt["PRO_DESC"], $resultt["CAT_INDEX"], 0,NULL);
            $resultArray[] = $product;
            $i++;
        }
        if($i === 0){
            return NULL;
        }
        return $resultArray;
    }
}
?>

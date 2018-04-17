<?php

class ProductMgnt
{

    public static function ShowProductDetail($pro_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_INDEX ='" . $pro_index . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
        return $product;
    }

    public static function getallCatagory()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
            $resultArray[] = $product;
        }
        return $resultArray;
    }

    public static function getallProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
            $resultArray[] = $product;
        }
        return $resultArray;
    }

    public static function getProduct($cat_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY ";
        $query = $conn->query($sql);
        $resultArray = array();
        
        while ($result = $query->fetch_array()) {
            
            // echo $result["CAT_INDEX"].'<br/>';
            if ($result["CAT_INDEX"] == $cat_index) {
                $catagory = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
                $connn = new mysqli($hostname, $username, $password, $dbname);
                $sqll = "SELECT * FROM PRODUCT WHERE CAT_INDEX ='" . $result["CAT_INDEX"] . "'";
                $queryy = $conn->query($sqll);
                while ($resultt = $queryy->fetch_array()) {
                    $product = new Product($resultt["PRO_INDEX"], $resultt["PRO_NAME"], $resultt["PRO_images"], $resultt["PRO_PRICE"], $resultt["PRO_DESC"], $resultt["CAT_INDEX"], 0);
                    $resultArray[] = $product;
                }
            }
        }
        
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
        $sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_images,PRO_PRICE,PRO_DESC,CAT_INDEX)
		VALUES('" . $name . "','" . $image . "','" . $price . "','" . $des . "', '" . $type . "');";
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new product successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_Product.php\";</script>";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
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
            echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>
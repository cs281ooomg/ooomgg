<?php
require 'classes/Product.php';

class ProductMgnt
{

    public static function ShowProductDetail($pro_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_INDEX ='" . $pro_index . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"]);
        return $product;
    }
}
?>

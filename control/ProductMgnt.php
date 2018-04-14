<?php
include ("Product.php");

class ProductMgnt
{

    public static function ShowProductDetail($pro_index)
    {
        $hostname = '192.168.1.10:3307'; // inside
                                         // $hostname = 'server.mydpk.net:3307'; //outside
        $username = 'ooomg';
        $password = '12345678';
        $dbname = 'ooomg';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT  WHERE PRO_INDEX = '" . $pro_index . "'  ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $product = new Product($result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], $result["PRO_INDEX"]);
        return $product;
    }
}
?>
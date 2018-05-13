<?php
class FavoMgnt
{
    public static function checkFavorite($acc,$pro_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM FAVORITE WHERE ACC_ID='" . $acc->getID() . "' AND PRO_INDEX = '" . $pro_id . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            return true;
        }
        return false;
    }
     
    public static function removeFavorite($acc,$pro_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "DELETE FROM FAVORITE WHERE ACC_ID='" . $acc->getID() . "' AND PRO_INDEX = '" . $pro_id . "'";
        $query = $conn->query($sql);
        return $query;
    }
    
    public static function addFavorite($acc,$pro_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO FAVORITE (ACC_ID,PRO_INDEX) VALUES ('" . $acc->getID() . "','" . $pro_id . "')";
        $query = $conn->query($sql);
        return $query;
    }
    
    public static function getFavoriteProduct($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT PRO_INDEX FROM FAVORITE WHERE ACC_ID ='" . $acc->getID() . "'";
        $query = $conn->query($sql);
        $proArr = array();
        while ($result = $query->fetch_array()) {
            $proArr[] = ProductMgnt::getProduct($result['PRO_INDEX']);
        }
        return $proArr;
    }
}


<?php
class FavoMgnt
{
    public function checkFavorite($pro_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM FAVORITE WHERE ACC_ID='" . $this->getID() . "' AND PRO_INDEX = '" . $pro_id . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            return true;
        }
        return false;
    }
     
    public function removeFavorite($pro_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "DELETE FROM FAVORITE WHERE ACC_ID='" . $this->getID() . "' AND PRO_INDEX = '" . $pro_id . "'";
        $query = $conn->query($sql);
        return $query;
    }
    
    public function addFavorite($pro_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO FAVORITE (ACC_ID,PRO_INDEX) VALUES ('" . $this->getID() . "','" . $pro_id . "')";
        $query = $conn->query($sql);
        return $query;
    }
    
    public function getFavoriteProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT PRO_INDEX FROM FAVORITE WHERE ACC_ID ='" . $this->getID() . "'";
        $query = $conn->query($sql);
        $proArr = array();
        while ($result = $query->fetch_array()) {
            $proArr[] = Product::ShowProductDetail($result['PRO_INDEX']);
        }
        return $proArr;
    }
}


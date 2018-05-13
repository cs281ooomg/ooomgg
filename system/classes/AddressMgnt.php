<?php
class AddressMgnt
{
    public static function checkAddress($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ADDRESS WHERE ACC_ID='" . $acc->getID() ."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            return true;
        }
        return false;
    }
    public static function addAddress($acc,$pro,$dis,$subdis,$addcode)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO ADDRESS (ACC_ID,ADD_INFO,ADD_SUB_DISTRICT,ADD_DISTRICT,ADD_PROVINCE,ADD_CODE) VALUES ('" . $acc->getID() . "','" . $pro . "','".$dis."','".$subdis."','".$addcode."')";
        $query = $conn->query($sql);
        return $query;
    }
    public static function getAlladdress($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT ADD_INDEX FROM FAVORITE WHERE ACC_ID ='" . $acc->getID() . "'";
        $query = $conn->query($sql);
        $addArr = array();
        while ($result = $query->fetch_array()) {
            $addArr[] = AddressMgnt::getAddress($result["add_index"]);
        }
        return $addArr;
    }
    public static function getAddress($add_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ADDRESS WHERE ADD_INDEX ='" . $add_index . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $address = new Address($result["ADD_INDEX"],$result["ADD_INFO"],$result["ADD_SUB_DISTRICT"],$result["ADD_PROVINCE"],$result["ADD_CODE"]);
        return $address;
    }
}


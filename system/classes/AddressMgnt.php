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
    public static function addAddress($acc,$pro,$dis,$subdis,$addcode,$addinfo)
    {
        require 'config/config.php';
        $todays_date = date("Y-m-d");
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO ADDRESS (ACC_ID,ADD_INFO,ADD_SUB_DISTRICT,ADD_DISTRICT,ADD_PROVINCE,ADD_CODE,DATE) 
        VALUES ('" . $acc->getID() . "','" . $addinfo . "','".$subdis."','".$dis."','" . $pro . "','".$addcode."','".$todays_date."')";
        $query = $conn->query($sql);
        return $query;
    }
    public static function removeAddress($add)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "DELETE FROM ADDRESS WHERE ADD_INDEX='". $add ."'";
        $query = $conn->query($sql);
        return $query;
    }
    public static function getAlladdress($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT ADD_INDEX FROM ADDRESS WHERE ACC_ID ='" . $acc->getID() . "'";
        $query = $conn->query($sql);
        $addArr = array();
        while ($result = $query->fetch_assoc()) {
            $addArr[] = AddressMgnt::getAddress($result["ADD_INDEX"]);
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
        $address = new Address($result["ADD_INDEX"],$result["ACC_ID"],$result["ADD_INFO"],$result["ADD_SUB_DISTRICT"],$result["ADD_DISTRICT"],$result["ADD_PROVINCE"],$result["ADD_CODE"],$result["DATE"]);
        return $address;
    }
    public static function lastAddress($add) {
        require 'config/config.php';
        $todays_date = date("Y-m-d");
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "UPDATE ADDRESS SET DATE ='". $todays_date."'  WHERE ADD_INDEX ='".$add."'";
        $query = $conn->query($sql);
        return $query;
    }
}
?>

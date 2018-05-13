<?php
class ExtraPromotionMgnt
{
    public static function getPointPromotion($price){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM EXTRA_PROMOTION WHERE EP_TYPE = '".ExtraPromotion::$POINT."' AND EP_LOWER_PRICE >= '".$price."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            $point = $result['EP_POINT'];
        }else{
            return 0;
        }
    }
    
    public static function checkFreeDelivery($price){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM EXTRA_PROMOTION WHERE EP_TYPE = '".ExtraPromotion::$FREE_DELIVERY."' AND EP_LOWER_PRICE >= '".$price."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        return $result;
    }
    
    public static function pointUpdate($account,$exPointPro){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ACCOUNT WHERE ACC_ID = '".$account->getID()."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            $point = $exPointPro->getPoint() + $result['ACC_POINT'];
            $sql = "UPDATE ACCOUNT SET ACC_POINT = '" . $point . "' WHERE ACC_ID = '" . $account->getID() . "';";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        }
        return false;
    }
}
?>

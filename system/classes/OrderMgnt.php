<?php

class OrderMgnt
{

    public static function createOrder($order)
    {}

    public static function deleteOrder($order)
    {}

    public static function changeStatus($order, $status)
    {
        if($status == Order::$UN_PAYMENT){
            
        }else if($status === Order::$DELIVERING){
            
        }else{ //success
            
        }
    }
    
    public static function billExport($order){
        
    }
    public static function getOrderStatus($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ORDER WHERE ACC_ID='".$acc->getID()."'";
        $query = $conn->query($sql);
        $orderarr = array();
        
        while ($result = $query->fetch_array()){
            $orderarr = new Order($result["ORDER_INDEX"], $result["ORDER_DATE"], $result["ACC_ID"], $result["ORDER_CODE"], $result["ORDER_STATUS"]);
        }
       
        return $orderarr;
    }
    
}
?>

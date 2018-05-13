<?php

class OrderMgnt
{

    public static $UN_PAYMENT = 0, $DELIVERING = 1, $SUCCESS = 2;

    public static function createOrder($order)
    {}

    public static function deleteOrder($order)
    {}

    public static function changeStatus($order, $status)
    {
        if($status == OrderMgnt::$UN_PAYMENT){
            
        }else if($status === OrderMgnt::$DELIVERING){
            
        }else{ //success
            
        }
    }
}
?>

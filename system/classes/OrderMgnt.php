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
}
?>

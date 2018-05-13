<?php

class OrderHistory //your orders
{
    private $orders; //array of Order
    
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    
    
}
?>

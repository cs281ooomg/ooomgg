<?php

class Cart
{

    private $cartID;
    private $items; //array

    public function __construct($cartID, $items)
    {
        $this->cartID = $cartID;
        $this->items = $items;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getCartID()
    {
        return $this->cartID;
    }

    public function setCartID($cartID)
    {
        $this->cartID = $cartID;
    }
}
?>

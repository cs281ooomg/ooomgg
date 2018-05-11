<?php

class CartItem
{
    private $product;
    private $quantity;
    public function __construct($product, $quantity){
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    
    
}


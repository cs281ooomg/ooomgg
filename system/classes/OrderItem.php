<?php
class OrderItem
{
    private $index,$product,$quantity;
    public function __construct($index,$product,$quantity){
        $this->index = $index;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setIndex($index)
    {
        $this->index = $index;
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


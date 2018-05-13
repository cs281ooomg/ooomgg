<?php

class ExtraPromotion
{
    private $lowerPrice,$point,$type;
    
    public static $FREE_DELIVERY = 1, $POINT = 2; //type
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getLowerPrice()
    {
        return $this->lowerPrice;
    }

    public function getPoint()
    {
        return $this->point;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setLowerPrice($lowerPrice)
    {
        $this->lowerPrice = $lowerPrice;
    }

    public function setPoint($point)
    {
        $this->point = $point;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
 
}
?>
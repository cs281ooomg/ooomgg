<?php

class ExtraPromotion
{
    private $lowerPrice,$point,$type;
    public static $FREE_DELIVERY = 1, $POINT = 2; //type
    public function __construct($type)
    {
        $this->type = $type;
    }
    
}
?>
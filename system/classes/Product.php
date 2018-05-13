<?php

class Product
{

    private $pId, $pName, $pImages, $pPrice, $pDescription, $pType, $pQuantity,$pPromotions;

    public function __construct($pId, $pName, $pImages, $pPrice, $pDescription, $pType, $pQuantity,$pPromotions)
    {
        $this->pId = $pId;
        $this->pName = $pName;
        $this->pImages = $pImages;
        $this->pPrice = $pPrice;
        $this->pDescription = $pDescription;
        $this->pType = $pType;
        $this->pQuantity = $pQuantity;
        $this->pPromotions = $pPromotions;
    }

    public function getPPromotions()
    {
        return $this->pPromotions;
    }

    public function setPPromotions($pPromotions)
    {
        $this->pPromotions = $pPromotions;
    }

    public function getPId()
    {
        return $this->pId;
    }

    public function getPName()
    {
        return $this->pName;
    }

    public function getPImages()
    {
        return $this->pImages;
    }

    public function getPPrice()
    {
        return $this->pPrice;
    }

    public function getPDescription()
    {
        return $this->pDescription;
    }

    public function getPType()
    {
        return $this->pType;
    }

    public function setPId($pId)
    {
        $this->pId = $pId;
    }

    public function setPName($pName)
    {
        $this->pName = $pName;
    }

    public function setPImages($pImages)
    {
        $this->pImages = $pImages;
    }

    public function setPPrice($pPrice)
    {
        $this->pPrice = $pPrice;
    }

    public function setPDescription($pDescription)
    {
        $this->pDescription = $pDescription;
    }

    public function setPType($pType)
    {
        $this->pType = $pType;
    }

    public function getPQuantity()
    {
        return $this->pQuantity;
    }

    public function setPQuantity($pQuantity)
    {
        $this->pQuantity = $pQuantity;
    }
}

?>

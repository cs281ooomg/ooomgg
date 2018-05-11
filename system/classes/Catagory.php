<?php

class Catagory
{

    private $cName, $cType, $items;

    public function __construct($cType, $cName, $items)
    {
        $this->cName = $cName;
        $this->items = $items;
        $this->cType = $cType;
    }

    public function getcName()
    {
        return $this->cName;
    }

    public function getCType()
    {
        return $this->cType;
    }

    public function setcName($cName)
    {
        $this->cName = $cName;
    }

    public function setCType($cType)
    {
        $this->cType = $cType;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($cName)
    {
        $this->items = items;
    }
}

?>

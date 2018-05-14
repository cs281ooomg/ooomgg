<?php

class Cart
{

    private $account;
    private $items; //array LineItem

    public function __construct($account, $items)
    {
        $this->$account = $account;
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

    public function getAccount()
    {
        return $this->$account;
    }

    public function setAccount($account)
    {
        $this->$account = $account;
    }
}
?>

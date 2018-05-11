<?php

class Order
{

    private $index, $date, $account, $code, $status;

    public function __construct($index, $date, $account, $code, $status)
    {
        $this->index = $index;
        $this->date = $date;
        $this->account = $account;
        $this->code = $code;  
        $this->status = $status;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setIndex($index)
    {
        $this->index = $index;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}


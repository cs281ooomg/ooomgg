<?php

class Address
{

    private $add_index, $acc, $info, $province, $district, $subDis, $addCode, $lastUse;

    public function __construct($add_index, $acc, $info, $province, $district, $subDis, $addCode, $lastUse)
    {
        $this->add_index = $add_index;
        $this->acc = $acc;
        $this->info = $info;
        $this->province = $province;
        $this->district = $district;
        $this->subDis = $subDis;
        $this->addCode = $addCode;
        $this->lastUse = $lastUse;
    }

    public function showAddress()
    {
        $text = $this->info . ' , ' . $this->province . ' , ' . $this->district . ' , ' . $this->subDis . ' , ' . $this->addCode;
        return $text;
    }

    public function getAdd_index()
    {
        return $this->add_index;
    }

    public function getAcc()
    {
        return $this->acc;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function getSubDis()
    {
        return $this->subDis;
    }

    public function getAddCode()
    {
        return $this->addCode;
    }

    public function getLastUse()
    {
        return $this->lastUse;
    }

    public function setAdd_index($add_index)
    {
        $this->add_index = $add_index;
    }

    public function setAcc($acc)
    {
        $this->acc = $acc;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function setProvince($province)
    {
        $this->province = $province;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
    }

    public function setSubDis($subDis)
    {
        $this->subDis = $subDis;
    }

    public function setAddCode($addCode)
    {
        $this->addCode = $addCode;
    }

    public function setLastUse($lastUse)
    {
        $this->lastUse = $lastUse;
    }
}


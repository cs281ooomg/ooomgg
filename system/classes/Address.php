<?php
namespace system\classes;

class Address
{
    private $acc,$province,$district,$subdis,$addcode;
    public function __construct($acc, $province, $district, $subdis, $addcode)
    {
        $this->acc = $acc;
        $this->province = $province;
        $this->district = $district;
        $this->subdis = $subdis;
        $this->addcode = $addcode;
       
    }
    /**
     * @return mixed
     */
    public function getAcc()
    {
        return $this->acc;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return mixed
     */
    public function getSubdis()
    {
        return $this->subdis;
    }

    /**
     * @return mixed
     */
    public function getAddcode()
    {
        return $this->addcode;
    }

    /**
     * @param mixed $acc
     */
    public function setAcc($acc)
    {
        $this->acc = $acc;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @param mixed $subdis
     */
    public function setSubdis($subdis)
    {
        $this->subdis = $subdis;
    }

    /**
     * @param mixed $addcode
     */
    public function setAddcode($addcode)
    {
        $this->addcode = $addcode;
    }

}


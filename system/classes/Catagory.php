<?php
class Catagory
{
	
	private $cName,  $cType;
	
	public function __construct($cType, $cName)
	{
		$this->cName= $cName;
		
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
		$this->cName= $cName;
	}
	
	
	public function setCType($cType)
	{
		$this->cType = $cType;
	}
}

?>

<?php
require 'classes/Product.php';
require 'classes/Catagory.php';
class ProductMgnt
{
	
	public static function ShowProductDetail($pro_index)
	{
		require 'config/config.php';
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$sql = "SELECT * FROM PRODUCT WHERE PRO_INDEX ='" . $pro_index . "'";
		$query = $conn->query($sql);
		$result = $query->fetch_assoc();
		$product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"]);
		return $product;
	}
	
	public static function getallProduct(){
		
		
		require 'config/config.php';
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$sql = "SELECT * FROM PRODUCT ";
		$query = $conn->query($sql);
		$resultArray = array();
		$i=0;
		while($result = $query->fetch_array()){
			$product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"]);
			$resultArray [] = $product;
		}
		return $resultArray;
	}
	public static function getGuitarProduct(){
		require 'config/config.php';
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$sql = "SELECT * FROM CATAGORY ";
		$query = $conn->query($sql);
		$resultArray = array();
		$i=0;
		while($result = $query->fetch_array()){
			
			//echo $result["CAT_INDEX"].'<br/>';
			if($result["CAT_NAME"]=='guitar'){
				$catagory = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
				$resultArray [] = $catagory;
			}
		}
		return $resultArray;
	}
	public static function getBassProduct(){
		require 'config/config.php';
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$sql = "SELECT * FROM CATAGORY ";
		$query = $conn->query($sql);
		$resultArray = array();
		$i=0;
		while($result = $query->fetch_array()){
			
			//echo $result["CAT_INDEX"].'<br/>';
			if($result["CAT_NAME"]=='bass'){
				$catagory = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
				$resultArray [] = $catagory;
			}
		}
		return $resultArray;
	}
	public static function getPianoProduct(){
		require 'config/config.php';
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$sql = "SELECT * FROM CATAGORY ";
		$query = $conn->query($sql);
		$resultArray = array();
		$i=0;
		while($result = $query->fetch_array()){
			
			//echo $result["CAT_INDEX"].'<br/>';
			if($result["CAT_NAME"]=='piano'){
				$catagory = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
				$resultArray [] = $catagory;
			}
		}
		return $resultArray;
	}
	public static function getDrumProduct(){
		require 'config/config.php';
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$sql = "SELECT * FROM CATAGORY ";
		$query = $conn->query($sql);
		$resultArray = array();
		$i=0;
		while($result = $query->fetch_array()){
			
			//echo $result["CAT_INDEX"].'<br/>';
			if($result["CAT_NAME"]=='drum'){
				$catagory = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
				$resultArray [] = $catagory;
			}
		}
		return $resultArray;
	}
}
$proArr = ProductMgnt::getGuitarProduct();
foreach ($proArr as $pro){
	echo $pro->getcName().'<br/>';
}
?>
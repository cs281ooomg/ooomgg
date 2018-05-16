<?php

class OrderMgnt
{
    
    public static function createOrder($order,$acc)
    {   
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO ORDERS (ORDER_DATE,ACC_ID,ADD_INDEX,ORDER_CODE,ORDER_STATUS) VALUES ('".$order->getDate()."', '".$acc->getID()."', '".AddressMgnt::getLastAddress($acc)->getAdd_index()."', '".$order->getCode()."', '".$order->getStatus()."')";
        $query = $conn->query($sql);
        if($query){
            $sql = "SELECT * FROM ORDERS WHERE ACC_ID = '".$acc->getID()."' ORDER BY ORDER_INDEX";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            if ($result) {
                $orderIndex = $result['ORDER_INDEX'];
                $sql = "SELECT * FROM CART WHERE ACC_ID='".$acc->getID()."'";
                $query = $conn->query($sql);
                while ($result = $query->fetch_array()){
                    $productIndex = $result['CART_INDEX'];
                    $qty = $result['QUANTITY'];
                    $sql = "INSERT INTO ORDER_ITEMS (ORDER_INDEX,PRO_INDEX,QUANTITY)  VALUES ('".$orderIndex."','" . $productIndex . "','" . $qty . "')";
                    $query1 = $conn->query($sql);
                }
                $sql = "DELETE FROM CART WHERE ACC_ID='".$acc->getID()."'";
                $query = $conn->query($sql);
                return true;
            }
        } 
        return $query;
    }

    public static function deleteOrder($order,$acc)
    {}

    public static function changeStatus($order, $status)
    {
        if($status == Order::$UN_PAYMENT){
            
        }else if($status === Order::$DELIVERING){
            
        }else{ //success
            
        }
        return true;
    }
    
    public static function billExport($order){
        
    }
    public static function getOrderStatus($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ORDERS WHERE ACC_ID='".$acc->getID()."'";
        $query = $conn->query($sql);
        $orderarr = array();
        
        while ($result = $query->fetch_assoc()){
            $orderarr[] = new Order($result["ORDER_INDEX"], $result["ORDER_DATE"], $result["ACC_ID"], $result["ORDER_CODE"], $result["ORDER_STATUS"]);
        }
       
        return $orderarr;
        
    }
    
    public static function generateCodeOrder($length = 10){
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
    public static function getOrderByID($order_id){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ORDERS WHERE ORDER_INDEX ='".$order_id."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            $order = new Order($result['ORDER_INDEX'], $result['ORDER_DATE'], $result['ACC_ID'], $result['ORDER_CODE'], $result['ORDER_STATUS']);
            return $order;
        }
        return null;
    }
    public static function getAddress($acc)
    {
    	require 'config/config.php';
    	$conn = new mysqli($hostname, $username, $password, $dbname);
    	$sql = "SELECT * FROM ADDRESS WHERE ACC_ID ='" . $acc->getID() . "'";
    	$query = $conn->query($sql);
    	$result = $query->fetch_assoc();
    	if($result){
    		$address = new Address($result["ADD_INDEX"], $result["ACC_ID"], $result["ADD_INFO"], $result["ADD_SUB_DISTRICT"], $result["ADD_DISTRICT"], $result["ADD_PROVINCE"], $result["ADD_CODE"], $result["DATE"]);
    		return $address;
    	}else{
    		return NULL;
    	}
    }
    public static function getACC($acc)
    {
    	require 'config/config.php';
    	$conn = new mysqli($hostname, $username, $password, $dbname);
    	$sql = "SELECT * FROM ACCOUNT WHERE ACC_ID ='" . $acc->getID() . "'";
    	$query = $conn->query($sql);
    	$result = $query->fetch_assoc();
    	if($result){
    		$acc = new Account($result["ACC_ID"],$result["ACC_PASS"], $result["ACC_TYPE"], $result["ACC_EMAIL"], $result["ACC_FNAME"], $result["ACC_LNAME"], $result["ACC_GENDER"], $result["ACC_TEL"], $result["ACC_POINT"]);
    		return $acc;
    	}else{
    		return NULL;
    	}
    }
    public static function getOrd($acc)
    {
    	require 'config/config.php';
    	$conn = new mysqli($hostname, $username, $password, $dbname);
    	$sql = "SELECT * FROM ORDERS WHERE ACC_ID ='" . $acc->getID() . "'";
    	$query = $conn->query($sql);
    	$result = $query->fetch_assoc();
    	if($result){
    		$ord = new Order($result["ORDER_INDEX"], $result["ORDER_DATE"],$result["ACC_ID"], $result["ORDER_CODE"], $result["ORDER_STATUS"]);
    		return $ord;
    	}else{
    		return NULL;
    	}
    }
    
    public static function getProduct($acc){
    	require 'config/config.php';
    	$conn = new mysqli($hostname, $username, $password, $dbname);
    	$sql = "SELECT * FROM ORDERS  WHERE ACC_ID ='" . $acc->getID() . "'";
    	$query = $conn->query($sql);
    	$result = $query->fetch_assoc();
    	$sql2 = "SELECT * FROM ORDER_ITEMS WHERE ORDER_INDEX = '" . $result['ORDER_INDEX']. "' ";
    	$query2 = $conn->query($sql2);
    	$resultArray = array();
    	$count = 0;
    	while ($result2 = $query->fetch_array()) {
    		
    		$product = ProductMgnt::getProduct($result2['PRO_INDEX']);
    		$quantity = $result2['QUANTITY'];
    		$orderItem = new OrderItem($product, $quantity);
    		$resultArray[] = $orderItem;
    		$count ++;
    	}
    	if ($count === 0) {
    		return NULL;
    	}
    	//$ordd = new Order($result['ORDER_INDEX'], $resultArray);
    	return $resultArray;
    }
}
?>

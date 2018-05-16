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
            $sql = "SELECT * FROM ORDERS WHERE ACC_ID = '".$acc->getID()."' ORDER BY ORDER_INDEX DESC LIMIT 1";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            if ($result) {
                $orderIndex = $result['ORDER_INDEX'];
                $sql = "SELECT * FROM CART WHERE ACC_ID='".$acc->getID()."'";
                $query = $conn->query($sql);
                while ($result = $query->fetch_array()){
                    $productIndex = $result['PRO_INDEX'];
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
    
    public static function getOrderByOrderID($order_id){
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
    
    public static function getOrderItemsByOrderID($order_id){
    	require 'config/config.php';
    	$conn = new mysqli($hostname, $username, $password, $dbname);
    	$sql = "SELECT * FROM ORDER_ITEMS WHERE ORDER_INDEX = '" . $order_id. "' ";
    	$query = $conn->query($sql);
    	$resultArray = array();
    	$count = 0;
    	while ($result = $query->fetch_array()) { 
    		$product = ProductMgnt::getProduct($result['PRO_INDEX']);
    		$quantity = $result['QUANTITY'];
    		$index =$result['INDEX'];
    		$orderItem = new OrderItem($index,$product, $quantity);
    		$resultArray[] = $orderItem;
    		$count ++;
    	}
    	if ($count === 0) {
    		return NULL;
    	}
    	return $resultArray;
    }
    
    public static function getAddressByOrderId($order_id){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT ADD_INDEX FROM ORDERS WHERE ORDER_INDEX ='".$order_id."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            return AddressMgnt::getAddress($result['ADD_INDEX']);
        }
        return null;
    }
    
    public function getTotalPrice($items)
    {
        $totalPrice = $this->getPriceByOrderItems($items);
        return $totalPrice + $this->getVatPrice($totalPrice);
    }
    
    public function getVatPriceByOrderItems($items){
        $totalPrice = $this->getPriceByOrderItems($items);
        return $this->getVatPrice($totalPrice);
    }
    
    private function getVatPrice($price)
    {
        return $price * CartMgnt::$vat / 100;
    }
    
    private function getPriceByOrderItems($items)
    {
        $totalPrice = 0;
        foreach ($items as $item) {
            $product = $item->getProduct();
            $quantity = $item->getQuantity();
            $price = $product->getPPrice();
            $totalPrice += $price * $quantity;
        }
        return $totalPrice;
    }
}
?>

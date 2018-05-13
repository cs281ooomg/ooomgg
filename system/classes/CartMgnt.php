<?php

class CartMgnt
{

    public static $vat = 7;

    public function getTotalPrice($cart)
    {
        $cartItems = $this->getAllCartItems($cart);
        $totalPrice = $this->getPriceByCartItem($cartItems);
        return $totalPrice + $this->getVatPrice($totalPrice);
    }
    
    public function getVatPriceByCart($cart){
        $cartItems = $this->getAllCartItems($cart);
        $totalPrice = $this->getPriceByCartItem($cartItems);
        return $this->getVatPrice($totalPrice);
    }
    
    public static function getCartByAccount($account){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CART WHERE ACC_ID = '" . $account->getID() . "' ";
        $query = $conn->query($sql);
        $conn->close();
        $resultArray = array();
        $count = 0;
        while ($result = $query->fetch_array()) {
            $product = ProductMgnt::getProduct($result['PRO_INDEX']);
            $quantity = $result['QUANTITY'];
            $cartItem = new CartItem($product, $quantity);
            $resultArray[] = $cartItem;
            $count ++;
        }
        if ($count === 0) {
            return NULL;
        }
        $cart = new Cart($result['CART_INDEX'], $resultArray);
        return $cart;
    }
    
    public static function addToMyCart($acc,$product,$quan)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CART WHERE ACC_ID = '" . $acc->getID() . "' AND PRO_INDEX = '" . $product->getPId() . "';";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) { // update
            $quantity = $quan + $result['QUANTITY'];
            $sql = "UPDATE CART SET QUANTITY = '" . $quantity . "' WHERE CART_INDEX = '" . $result['CART_INDEX'] . "';";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        } else { // new
            $sql = "INSERT INTO CART (ACC_ID,PRO_INDEX,QUANTITY)  VALUES ('" . $acc->getID() . "','" . $product->getPId() . "'," . $quan . ");";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        }
    }
    
    public static function removeFromMyCart($acc,$product)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "DELETE FROM CART WHERE ACC_ID = '" . $acc->getID() . "' AND PRO_INDEX = '" . $product->getPId() . "';";
        $query = $conn->query($sql);
        $conn->close();
        if ($query) {
            return TRUE;
        }
        return FALSE;
    }

    private function getVatPrice($price)
    {
        return $price * CartMgnt::$vat / 100;
    }

    private function getPriceByCartItem($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $product = $item->getProduct();
            $quantity = $item->getQuantity();
            $price = $product->getPPrice();
            $totalPrice += $price * $quantity;
        }
        return $totalPrice;
    }

    private function getAllCartItems($cart)
    {
        return $cart->getItems();
    }
}
?>

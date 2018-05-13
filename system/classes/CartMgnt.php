<?php

class CartMgnt
{

    private $vat = 7;

    public function getTotalPrice($cart)
    {
        $cartItems = $this->getAllCartItems($cart);
        $totalPrice = $this->getPriceByCartItem($cartItems);
        return $totalPrice * $this->getVatPrice($totalPrice);
    }
    
    public function getCartByAccount($account){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CART WHERE ACC_ID = '" . $account->getID() . "' ";
        $query = $conn->query($sql);
        $conn->close();
        $resultArray = array();
        $count = 0;
        while ($result = $query->fetch_array()) {
            $product = ProductMgnt::getProduct($result['PRO_ID']);
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

    private function getVatPrice($price)
    {
        return $price * $vat / 100;
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

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


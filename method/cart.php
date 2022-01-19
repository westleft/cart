<?php

namespace app\method;

class Cart {
    function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public function addToCart($product){
        $_SESSION['cartItems'][$product['id']]['item'] = $product;
        $_SESSION['cartItems'][$product['id']]['qty']++;
        $_SESSION['cartItems'][$product['id']]['total'] = $_SESSION['cartItems'][$product['id']]['qty'] * $_SESSION['cartItems'][$product['id']]['item']['price'];
    }

    public function calc($id, $operation){
        if($_SESSION['cartItems'][$id]['qty'] == 1 && $operation == 'decrease'){
            return;
        }
        if($operation == 'decrease'){
            $_SESSION['cartItems'][$id]['qty']--;
            $_SESSION['cartItems'][$id]['total'] -= $_SESSION['cartItems'][$id]['item']['price'];
        }else{
            $_SESSION['cartItems'][$id]['qty']++;
            $_SESSION['cartItems'][$id]['total'] += $_SESSION['cartItems'][$id]['item']['price'];
        }
        
        echo '<pre>', print_r($_SESSION['cartItems'][$id]), '</pre>';
    }
    
    public function clearAll(){
        unset($_SESSION['cartItems']);
    }

    public function remove($id){
        unset($_SESSION['cartItems'][$id]);
    }

    public function shipping(){
        $shipping_data = [];
        $shipping_data['shipping'] = 60;
        foreach ($_SESSION['cartItems'] as $product) {
            // echo '<pre>',print_r($product),'</pre>';
            $shipping_data['qty'] += $product['qty'];
            $shipping_data['total'] += $product['total'];
        }

        // 滿 10 免運
        if($shipping_data['qty'] >= 10){
            $shipping_data['shipping'] = 'FREE';
        }
        $shipping_data['total_price'] = $shipping_data['total'] + $shipping_data['shipping'];
        if($shipping_data['total'] == 0){
            $shipping_data['total_price'] = 0;
        }
        return $shipping_data;
    }

    public function say(){
        echo "hi";
    }
}

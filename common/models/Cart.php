<?php


namespace common\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product , $qty = 1)
    {
        if (isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id]  = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->discount > 0 ? $product->discount : $product->price,
                'qty' => $qty,
            ];
        }

        if ($_SESSION['cart'][$product->id]['qty'] == 0){
            unset($_SESSION['cart'][$product->id]);
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($product->discount > 0 ? $product->discount : $product->price) * $qty : ($product->discount > 0 ? $product->discount : $product->price);
    }

    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])){
           return false;
        }else{
            $qtyMinus = $_SESSION['cart'][$id]['qty'];
            $sumMinus = $_SESSION['cart'][$id]['price'] * $qtyMinus;

            $_SESSION['cart.qty'] -=$qtyMinus;
            $_SESSION['cart.sum'] -=$sumMinus;
            unset($_SESSION['cart'][$id]);
        }
    }
}
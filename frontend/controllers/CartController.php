<?php


namespace frontend\controllers;


use common\models\Cart;
use common\models\Product;
use Yii;
use yii\web\Controller;


class CartController extends Controller
{
    public $layout = 'main3';

    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        $qty = (int)Yii::$app->request->get('qty');
        $qty = empty($qty) ? 1 : $qty;
        if (empty($product)){
            return false;
        }else{
            $session = \Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product , $qty);
            $this->layout = false;
            return $this->render('cart-modal' , [
                'session' => $session,
            ]);
        }
    }

    public function actionRecalc($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->renderAjax('cart-modal' , [
            'session' => $session,
        ]);
    }

    public function actionShow()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal' , [
            'session' => $session,
        ]);
    }

    public function actionCart()
    {
        return $this->render('cart');
    }


}
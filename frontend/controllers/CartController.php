<?php


namespace frontend\controllers;


use common\models\Cart;
use common\models\Customer;
use common\models\CustomerAddress;
use common\models\CustomerUser;
use common\models\District;
use common\models\Order;
use common\models\OrderDetail;
use common\models\Product;
use common\models\TelegramNotificator;
use frontend\models\LoginForm;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;


class CartController extends Controller
{
    public $layout = 'cart';

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
        $session = Yii::$app->session;
        $session->open();
        return $this->render('cart' , [
            'session' => $session,
        ]);
    }

    public function actionMinus(){
        $id = Yii::$app->request->get('id');
        $count = Yii::$app->request->get('count');
        $session = Yii::$app->session;
        $session->open();
        $product = Product::findOne($id);
        $cart = new Cart();
        $cart->addToCart($product,$count);
        $this->layout = false;
        return $this->renderAjax('cart',compact('session'));

    }

    public function actionRemove($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        return $this->render('/cart/cart' , [
            'session' => $session,
        ]);
    }

    public function actionCheckout()
    {
        $userId = Yii::$app->user->getId();
        $user = CustomerUser::findOne($userId);
        $session = Yii::$app->session;
        $session->open();
        $model = Customer::findOne(['customer_user_id' => $userId]);
        $login = new LoginForm();
        if(Yii::$app->request->isPost && $login->load(Yii::$app->request->post())){
            if ($login->validate()){
                $login->login();
                return $this->refresh();
            }
        }
        $customer = new Customer();
        $customerAdress = new CustomerAddress();
        if (Yii::$app->request->isPost && $customer->load(Yii::$app->request->post()) && $customerAdress->load(Yii::$app->request->post())){
//            $customer->birth_date = date('Y-m-d' , strtotime($customer->birth_date));
//            $customer->registered_at = date('Y-m-d');
//            $customer->customer_user_id = $user->customers[0]['id'];
//            $customer->status = 1;
//            $customer->save();
            $customerAdress->customer_id = $model->id;
            $customerAdress->save();
            if ($customerAdress->save()){
                $session->open();
                $cart = $session['cart'];
                $order = new Order();
                $order->customer_id = $model->id;
                $order->customer_address_id = $customerAdress->id;
                $order->sum = $session['cart.sum'];
                $order->qty = $session['cart.qty'];
                $order->ordered_at = date('Y-m-d H:i:s');
                $order->save();
                if($order->save()){
                    foreach ($cart as $key => $item){
                        $orderDetail = new OrderDetail();
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $key;
                        $orderDetail->count = $item['qty'];
                        $orderDetail->save();
                    }
//                    $sendOrder = new TelegramNotificator();
//                    $sendOrder->sendOrderNotification($order);
                    unset($session['cart']);
                    unset($session['cart.sum']);
                    unset($session['cart.qty']);
                    return $this->redirect('success');

                }

            }

        }

        return $this->render('checkout' , [
            'session' => $session,
            'user' => $user,
            'login' => $login,
            'customerAdress' => $customerAdress,
            'customer' => $customer,
            'model' => $model
        ]);
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionGetDistricts($region_id)
    {
        $districts = District::find()
            ->where(['region_id' => $region_id])
            ->all();

        $options = [];
        foreach ($districts as $district) {
            $options[$district->id] = $district->name_uz;
        }

        return Json::encode($options);
    }


}
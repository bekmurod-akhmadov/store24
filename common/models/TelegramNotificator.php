<?php


namespace common\models;


use yii\base\Model;
use yii\httpclient\Client;

class TelegramNotificator extends Model
{
    public function sendGuestNotification(){
        $message = "Saytga kimdir kirdi";
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://api.telegram.org/bot6656848080:AAFwg4qk9ZFj9w7WEb0W7UuQN1YHCoj0Cbk/sendMessage')
            ->setData(['text'=>"Nima gap",'chat_id'=>'1990948908'])
            ->send();

    }

    public function sendOrderNotification($orderModel){
        $message = "
<b>Yangi buyurtma!</b>\n
<b>Tovar : </b>$orderModel->first_name  $orderModel->last_name\n
<b>Telefon : </b> $orderModel->phone\n
<b>Viloyat: </b>$orderModel->city\n
<b>Tuman: </b>$orderModel->street\n
<b>Ko'cha uy raqami : </b>$orderModel->street\n
<b>Tovarlar soni : </b>$orderModel->qty\n
<b>Jami summa : </b>$ $orderModel->sum\n 
_________________________________________ 
<b><i>Tovarlar</i></b>  
       ";

        $orderProducts = OrderDetail::find()->where(['order_id' => $orderModel->id])->all();
        foreach ($orderProducts as $orderProduct){
            $productData = Product::findOne($orderProduct->product_id);
            $productText = "
<b>Название товара : </b> $productData->name
<b>Цена : </b> $orderProduct->price 
<b>Количество : </b> $orderProduct->qty_item  
_________________________________________ 
            ";

            $message .=$productText;

        }

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://api.telegram.org/bot6656848080:AAFwg4qk9ZFj9w7WEb0W7UuQN1YHCoj0Cbk/sendMessage')
            ->setData(['text'=>$message,'chat_id'=>'1990948908','parse_mode'=>'HTML'])
            ->send();
    }
}
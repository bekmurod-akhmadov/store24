<?php


namespace frontend\controllers;


use yii\web\Controller;

class ProductController extends Controller
{
    public $layout = 'main2';
    public function actionIndex()
    {

        echo \Yii::$app->formatter->asRelativeTime('2023-08-24 15:00');
        return $this->render('index');
    }
}
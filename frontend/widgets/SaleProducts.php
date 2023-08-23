<?php


namespace frontend\widgets;


use yii\base\Widget;

class SaleProducts extends Widget
{
    public function run()
    {
        return $this->render('sale-products');
    }
}
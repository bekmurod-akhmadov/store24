<?php


namespace frontend\widgets;


use yii\base\Widget;

class Brands extends Widget
{
    public function run()
    {
        return $this->render('brands');
    }
}
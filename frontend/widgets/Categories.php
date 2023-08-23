<?php


namespace frontend\widgets;


use yii\base\Widget;

class Categories extends Widget
{
    public function run()
    {
        return $this->render('categories');
    }
}
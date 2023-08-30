<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class SaleProducts extends Widget
{
    public function run()
    {
        $models = Product::find()->where(['status' => 1])->andWhere(['not in' ,'discount','NULL'])->all();
        return $this->render('sale-products' , [
            'models' => $models
        ]);
    }
}
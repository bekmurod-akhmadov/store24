<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class NewProduct extends Widget
{
    public function run()
    {
        $models = Product::find()->where(['status' => 1 ])->orderBy(['created_at' => SORT_DESC])->limit(15)->all();
        return $this->render('new-product', [
            'models' => $models,
        ]);
    }
}
<?php


namespace frontend\widgets;


use common\models\Category;
use yii\base\Widget;

class ProductsByCat extends Widget
{
    public function run()
    {
        $categories = Category::find()->where(['status' => 1,'parent_id'=>NULL])->all();
        return $this->render('product-by-cat' , [
            'categories' => $categories,
        ]);
    }
}
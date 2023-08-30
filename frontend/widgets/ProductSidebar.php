<?php


namespace frontend\widgets;


use common\models\Category;
use yii\base\Widget;

class ProductSidebar extends Widget
{
    public function run()
    {
        $allCategories = Category::find()->where(['status' => 1])->andWhere(['not in' , 'parent_id' , 'NULL'])->all();
        $newProducts = \common\models\Product::find()->where(['status' => 1])->andWhere(['not in' ,'discount','NULL'])->limit(10)->all();
        return $this->render('product-sidebar' , [
            'allCategories' => $allCategories,
            'newProducts' => $newProducts,
        ]);
    }
}
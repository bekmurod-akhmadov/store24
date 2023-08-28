<?php


namespace frontend\widgets;


use app\models\Product;
use common\models\Brand;
use common\models\Category;
use yii\base\Widget;

class BestSeller extends  Widget
{
    public function run()
    {
        $models = Product::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(15)->all();
        $brands = Brand::find()->all();
        return $this->render('best-seller' , [
            'models' => $models,
            'brands' => $brands,
        ]);
    }
}
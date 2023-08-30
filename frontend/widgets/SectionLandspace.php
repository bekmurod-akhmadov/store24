<?php


namespace frontend\widgets;


use app\models\Product;
use common\models\Category;
use yii\base\Widget;

class SectionLandspace extends Widget
{
    public function run()
    {

        $categories = Category::find()->where(['status' => 1,'parent_id' => 2])->asArray()->all();
        $catId = [];
        for($i=0;$i < count($categories);$i++){
            $catId[$i] = $categories[$i]['id'];
        }
        $models = \common\models\Product::find()->where(['status' => 1])->andWhere(['in' , 'category_id' , $catId])->all();
        return $this->render('section-landscape' , [
            'models' => $models
        ]);
    }
}
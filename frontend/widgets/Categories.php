<?php


namespace frontend\widgets;


use common\models\Category;
use yii\base\Widget;

class Categories extends Widget
{
    public function run()
    {
        $models = Category::find()->where(['status' => 1 , 'parent_id' => NULL])->all();

        return $this->render('categories' , [
            'models' => $models,
        ]);
    }
}
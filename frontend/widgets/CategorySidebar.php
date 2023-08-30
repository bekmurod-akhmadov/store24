<?php


namespace frontend\widgets;


use common\models\Category;
use yii\base\Widget;

class CategorySidebar extends Widget
{
    public function run()
    {
        $allCategories = Category::find()->where(['status' => 1])->andWhere(['not in' , 'parent_id' , 'NULL'])->all();
        return $this->render('category-sidebar' , [
            'allCategories' => $allCategories,
        ]);
    }
}
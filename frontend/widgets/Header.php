<?php
namespace frontend\widgets;

use common\models\Category;
use yii\base\Widget;

class Header extends Widget
{
    public function run()
    {
        $categories = Category::find()->where(['status' => 1])->all();
        $parentCategories = Category::find()->where(['status' => 1 , 'parent_id' => NULL])->all();
        return $this->render('header' , [
            'categories' => $categories,
            'parentCategories' => $parentCategories,
        ]);
    }
}
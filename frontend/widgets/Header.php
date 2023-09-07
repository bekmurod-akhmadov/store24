<?php
namespace frontend\widgets;

use common\models\Category;
use common\models\Menu;
use yii\base\Widget;

class Header extends Widget
{
    public function run()
    {
        $categories = Category::find()->where(['status' => 1])->all();
        $parentCategories = Category::find()->where(['status' => 1 , 'parent_id' => NULL])->all();
        $menus = Menu::find()->where(['status' => 1 , 'parent' => NULL])->all();
        $session = \Yii::$app->session;
        $session->open();
        return $this->render('header' , [
            'categories' => $categories,
            'parentCategories' => $parentCategories,
            'menus' => $menus,
            'session' => $session,
        ]);
    }
}
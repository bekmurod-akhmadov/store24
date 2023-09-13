<?php


namespace frontend\widgets;


use yii\base\Widget;

class ProfileSidebar  extends Widget
{
    public function run()
    {
        return $this->render('profile-sidebar');
    }
}
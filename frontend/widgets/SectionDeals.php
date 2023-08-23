<?php


namespace frontend\widgets;


use yii\base\Widget;
use function Symfony\Component\Console\Helper\render;

class SectionDeals extends Widget
{
    public function run()
    {
        return $this->render('section-deals');
    }
}
<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="shortcut icon" href="/images/fav-icon.png">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="woocommerce-active left-sidebar">
    <?php $this->beginBody() ?>
    <div id="page" class="hfeed site">
        <?=\frontend\widgets\Header2::widget()?>
        <div id="content" class="site-content">
            <div class="col-full">
                <div class="row">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?=$content?>
                        </main>
                    </div>
                    <?=\frontend\widgets\CategorySidebar::widget()?>
                </div>
            </div>
        </div>
        <?=\frontend\widgets\Footer::widget()?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();

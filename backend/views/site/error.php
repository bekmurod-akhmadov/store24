<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <div class="container text-center">
        <div class="image_block text-center my-4">
            <img style="width:1000px;height:400px;object-fit:cover;" class="error_404"  src="/images/default/404.gif" alt="404.gif">
        </div>
        <h1>Sahifa topilmadi!</h1>
        <a href="<?=\yii\helpers\Url::to(['/site/index'])?>" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Bosh Sahifa</a>
    </div>
</div>

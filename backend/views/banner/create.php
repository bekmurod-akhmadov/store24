<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Banner $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Bannerlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

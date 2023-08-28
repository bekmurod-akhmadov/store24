<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Banner $model */

$this->title = 'Update Banner: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Bannerlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="banner-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

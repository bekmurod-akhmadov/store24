<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Social $model */

$this->title = 'Update Social: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ijtimoiy tarmoqlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="social-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

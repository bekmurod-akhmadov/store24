<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OrderDetail $model */

$this->title = 'Update Order Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="order-detail-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

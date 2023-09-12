<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OrderDetail $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

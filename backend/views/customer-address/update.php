<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CustomerAddress $model */

$this->title = 'Update Customer Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="customer-address-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CustomerAddress $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Customer Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-address-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

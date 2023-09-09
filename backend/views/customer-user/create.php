<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CustomerUser $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Customer Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\OrderDetail $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

    

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
    </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

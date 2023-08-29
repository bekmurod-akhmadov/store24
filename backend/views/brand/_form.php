<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Brand $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="brand-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>

            </div>
        </div>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>

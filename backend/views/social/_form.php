<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Social $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="social-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [])?>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
            </div>
        </div>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>

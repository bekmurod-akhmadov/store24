<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductComment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'star')->textInput() ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [])?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
    </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

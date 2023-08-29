<?php

use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Menu $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="menu-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'parent')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($model->parentMenu , 'id' , 'name'),
                    'options' => ['placeholder' => 'Parentni tanlang...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

                <?= $form->field($model, 'position')->widget(Select2::classname(), [
                    'data' => Yii::$app->params['menu_types'],
                    'options' => ['placeholder' => 'Joylashuvni tanlang...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'order_by')->textInput() ?>

                <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [])?>

                <div class="form-group">
                    <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
                </div>
        </div>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>

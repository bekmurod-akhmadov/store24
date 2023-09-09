<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\District $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="district-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">

            <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map($model->regions , 'id' , 'name_uz'),
                'options' => ['placeholder' => 'Viloyatni tanlang...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
            </div>
        </div>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>

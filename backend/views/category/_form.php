<?php

use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Category $model */
/** @var yii\widgets\ActiveForm $form */

$css = <<<CSS
    .upload{
        display:none;
    }

    .label_image{
        width:200px;
        height:auto;
        object-fit:cover;
        cursor: pointer;
    }
  
  
CSS;

$this->registerCss($css);
?>

<div class="category-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($model->categories , 'id' , 'name'),
                        'options' => ['placeholder' => 'Kategoriyani tanlang...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>


                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [])?>

                </div>
                <div class="col-lg-4">
                    <?php
                        $image = \common\components\StaticFunctions::getImage($model ,'category' , 'image');
                    ?>
                    <div class="text-center">
                        <label for="category-image">
                            <img class="label_image" src="<?=$image?>" alt="">
                            <?= $form->field($model, 'image')->fileInput([
                                'class' => 'upload'
                            ]) ?>
                        </label>
                    </div>
                </div>
            </div>






    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
    </div>
        </div>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>

<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Banner $model */
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

<div class="banner-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [])?>
                </div>
                <div class="col-lg-4">
                    <?php
                        $image = \common\components\StaticFunctions::getImage($model ,'banner' , 'image');
                    ?>
                    <div class="text-center">
                        <label for="banner-image">
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

    <?php ActiveForm::end(); ?>

</div>

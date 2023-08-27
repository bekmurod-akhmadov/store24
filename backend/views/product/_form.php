<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
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

<div class="product-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                    <?=  $form->field($model, 'body')->widget(CKEditor::className(),[
                        'options' =>[
                            'rows' => 2,
                            'cols' => 6
                        ],
                        'editorOptions' => [
                            'inline' => false, //по умолчанию false
                        ],
                    ]);?>

                    <div class="file_input">
                        <?=
                         $form->field($model, 'gallery[]')->widget(FileInput::classname(), [
                            'options' => ['multiple' => true],
                            'pluginOptions' => ['previewFileType' => 'any']
                        ]);

                        ?>
                    </div>

                </div>
                <div class="col-lg-4">
                    <?php $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image') ?>
                    <div class="text-center">
                        <label for="product-image">
                            <img class="label_image" src="<?=$image?>" alt="">
                            <?= $form->field($model, 'image')->fileInput([
                                'class' => 'upload'
                            ]) ?>
                        </label>
                    </div>


                    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($model->categories , 'id' , 'name'),
                        'options' => ['placeholder' => 'Kategoriyani tanlang...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>

                    <?= $form->field($model, 'brand_id')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($model->brands , 'id' , 'name'),
                        'options' => ['placeholder' => 'Brandni tanlang...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>

                    <?= $form->field($model, 'price')->textInput() ?>

                    <?= $form->field($model, 'discount')->textInput() ?>


                    <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [])?>

                </div>
            </div>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'deleted_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'sale')->textInput() ?>

<!--    --><?//= $form->field($model, 'new')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn-fill-lg bg-blue-dark']) ?>
    </div>
        </div>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>

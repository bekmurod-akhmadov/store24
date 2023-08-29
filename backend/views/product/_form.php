<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);

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

                    <div class="dynamic_form" style="margin-top:30px;border:1px solid #ccc;padding:10px;border-radius:10px;">

                        <?php
                        DynamicFormWidget::begin([
                            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                            'widgetBody' => '.container-items', // required: css class selector
                            'widgetItem' => '.item', // required: css class
                            'limit' => 20, // the maximum times, an element can be cloned (default 999)
                            'min' => 1, // 0 or 1 (default 1)
                            'insertButton' => '.add-item', // css class
                            'deleteButton' => '.remove-item', // css class
                            'model' => $chars[0],
                            'formId' => 'w0',
                            'formFields' => [
                                'attribute',
                                'value'
                            ],
                        ]); ?>
                        <div class="container-items"><!-- widgetContainer -->
                            <?php foreach ($chars as $i => $char): ?>
                                <div class="item panel panel-default"><!-- widgetBody -->
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <button type="button" class="add-item btn btn-success btn-xs"><i class="fas fa-plus"></i></button>
                                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fas fa-minus"></i></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <?php

                                        // necessary for update action.
                                        if (! $char->isNewRecord) {
                                            echo Html::activeHiddenInput($char, "[{$i}]id");
                                        }
                                        ?>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <?= $form->field($char, "[{$i}]attribute")->textInput(['maxlength' => true]) ?>

                                            </div>
                                            <div class="col-sm-6">
                                                <?= $form->field($char, "[{$i}]value")->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div><!-- .row -->

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php DynamicFormWidget::end(); ?>
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

                    <div class="file_input">
                        <?=
                        $form->field($model, 'gallery[]')->widget(FileInput::classname(), [
                            'options' => ['multiple' => true],
                            'pluginOptions' => ['previewFileType' => 'any']
                        ]);

                        ?>
                    </div>

                    <?php if(!empty($prImages)): ?>

                        <div class="panel panel-default p-3">
                            <h4>Tovar rasmlari</h4>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <?php foreach ($prImages as $galleryImage): ?>

                                    <tr>
                                        <td style="padding: 20px;vertical-align: middle;"><img style="max-width: 60px;" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/m_<?=$galleryImage->image?>" alt=""></td>
                                        <td style="padding: 20px;vertical-align: middle;">
                                            <a href="<?=\yii\helpers\Url::to(['product/del-item','id'=>$galleryImage->id])?>" class="btn btn-danger rem">O'chirish</a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>

                    <?php endif; ?>

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

<script>
    var buttons = document.querySelectorAll('.rem');
    for(let i=0;i<buttons.length;i++){
        buttons[i].addEventListener('click',function(e){
            let del = confirm("Rostdan ham o'chirilsinmi?");
            if(!del){
                e.preventDefault();
                return false;
            }
        })
    }
</script>

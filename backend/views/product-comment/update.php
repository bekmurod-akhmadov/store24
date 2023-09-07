<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductComment $model */

$this->title = 'Update Product Comment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tovar izohlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="product-comment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

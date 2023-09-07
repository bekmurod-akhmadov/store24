<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductComment $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Tovar Izohlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-comment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

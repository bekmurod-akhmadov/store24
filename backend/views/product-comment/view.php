<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductComment $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tovar izohlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-comment-view">

    <p>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn-fill-md text-light bg-dark-pastel-green']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn-fill-md radius-4 text-light bg-orange-red',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'message:ntext',
            'status',
            'created_at',
            'updated_at',
            'star',
        ],
    ]) ?>

</div>

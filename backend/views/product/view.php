<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tovarlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            'description',
            'body:ntext',
            'category_id',
            'brand_id',
            'sku',
            'price',
            'discount',
            'status',
            [
                'attribute' => 'image',
                'value' => function($model){
                    $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
                    return "<img src='$image' style='width:100px;height: 80px;object-fit:cover'>";
                },
                'format' => 'HTML',
            ],
        ],
    ]) ?>

</div>

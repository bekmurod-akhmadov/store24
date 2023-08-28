<?php

use common\models\ProductChar;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Tovarlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'chars' => (empty($chars)) ? [new ProductChar()] : $chars,
    ]) ?>

</div>

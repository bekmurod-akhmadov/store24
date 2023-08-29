<?php

use common\models\ProductChar;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Brand $model */

$this->title = 'Update Brand: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brandlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

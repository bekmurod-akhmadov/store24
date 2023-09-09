<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Region $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

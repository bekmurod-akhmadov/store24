<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\District $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Tumanlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Social $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Ijtimoiy tarmoqlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

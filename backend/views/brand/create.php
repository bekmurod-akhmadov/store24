<?php

use common\models\ProductChar;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Brand $model */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Brandlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>

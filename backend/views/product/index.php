<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tovarlar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                  
                </div>
                <p>
                    <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn-fill-lg bg-blue-dark btn-hover-yellow']) ?>
                </p>
            </div>
            <div class="table-responsive">
                <div class="dataTables_wrapper no-footer" id="DataTables_Table_0_wrapper">
                <div class="product-index">
   
                                                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                                        
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                    
//                                    'id',
                                    'name',
//                                    'description',
//                                    'body:ntext',
                                    'category_id',
                                    'price',
                                    'created_at',
                                    [
                                        'attribute' => 'image',
                                        'value' => function($model){
                                            $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
                                            return "<img src='$image' style='width:100px;height: 80px;object-fit:cover'>";
                                        },
                                        'format' => 'HTML',
                                    ],

                                     //'brand_id',
                                     //'sku',

                                     //'discount',

                                     //'updated_at',
                                     //'deleted_at',
                                     //'status',
                                     //'sale',
                                     //'new',
                                                    [
                                    'class' => ActionColumn::className(),
                                    'template' => '{view} {update} {delete}',
                                    'buttons' => [

                                        //view button
                                        'update' => function ($url, $model) {
                                            return Html::a('<span class="fa fa-pencil-alt p-2"></span>', $url, [
                                                'class'=>'btn btn-primary btn-xs',
                                                'title' => Yii::t('app', "Tahrirlash"),
                                            ]);
                                        },
                                        'delete' => function ($url) {
                                            return Html::a('<span class="fa fa-trash p-2"></span>', $url, [
                                                'title' => Yii::t('app', "O'chirish"),
                                                'data-confirm' => Yii::t('yii', 'Rostdan ham o\'chirilsinmi'),
                                                'data-method' => 'post', 'data-pjax' => '0',
                                                'class' => 'btn btn-danger btn-xs'
                                            ]);
                                        },
                                        'view' => function ($url , $model){
                                            return Html::a('<span class="fa fa-eye p-2"></span>', $url, [
                                                'class'=>'btn btn-info btn-xs',
                                                'title' => Yii::t('app', "Ko'rish"),
                                            ]);
                                        }
                                    ],
                                    'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                                ],
                            ],
                        ]); ?>
                                        
                                        
                    </div>
                </div>
            </div>            
        </div>
    </div>


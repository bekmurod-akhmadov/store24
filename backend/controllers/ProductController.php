<?php

namespace backend\controllers;

use backend\models\CommonModels;
use common\components\StaticFunctions;
use common\models\Product;
use common\models\ProductChar;
use common\models\ProductImage;
use common\models\ProductSearch;
use Exception;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();
        $chars = [new ProductChar()];
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                //product chars
                $chars = CommonModels::createMultiple(ProductChar::classname());
                CommonModels::loadMultiple($chars, Yii::$app->request->post());

                // validate all models
                $valid = $model->validate();
                $valid = CommonModels::validateMultiple($chars) && $valid;

                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($chars as $char) {
                                $char->product_id = $model->id;
                                if (! ($flag = $char->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                        if ($flag) {
                            $transaction->commit();
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }

                //upload image
                $image = UploadedFile::getInstance($model , 'image');
                if ($image){
                    $model->image = StaticFunctions::saveImage($image , $model->id , 'product');
                }
                $model->slug = StaticFunctions::generateSlug($model->name);
                $model->save();

                // Product imagelarni yuklash
                $galleryImages = UploadedFile::getInstances($model , 'gallery');
                if (!empty($galleryImages)){
                    foreach ($galleryImages as $galleryImage){
                        $filename = StaticFunctions::saveImage($galleryImage , $model->id , 'product');
                        $prodImage = new ProductImage();
                        $prodImage->product_id = $model->id;
                        $prodImage->image = $filename;
                        $prodImage->save();
                    }
                }
                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'chars' => (empty($chars)) ? [new ProductChar()] : $chars,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $prImages = ProductImage::find()->where(['product_id' => $id])->all();
        $chars = ProductChar::find()->where(['product_id'=>$id])->all();
        $oldImage = $model->image;
        if ($this->request->isPost && $model->load($this->request->post())) {

            $oldIDs = ArrayHelper::map($chars, 'id', 'id');
            $chars = CommonModels::createMultiple(ProductChar::classname(), $chars);
            CommonModels::loadMultiple($chars, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($chars, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = CommonModels::validateMultiple($chars) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            ProductChar::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($chars as $char) {
                            $char->product_id = $model->id;
                            if (! ($flag = $char->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            //Upload image
            $image = UploadedFile::getInstance($model , 'image');
            if ($image){
                $model->image = StaticFunctions::saveImage($image , $model->id , 'product');
                StaticFunctions::deleteImage($oldImage , $model->id , 'product');
            }else{
                $model->image = $oldImage;
            }
            $model->slug = StaticFunctions::generateSlug($model->name);

            // Product imagelarni yuklash
            $galleryImages = UploadedFile::getInstances($model , 'gallery');
            if (!empty($galleryImages)){
                foreach ($galleryImages as $galleryImage){
                    $filename = StaticFunctions::saveImage($galleryImage , $model->id , 'product');
                    $prodImage = new ProductImage();
                    $prodImage->product_id = $model->id;
                    $prodImage->image = $filename;
                    $prodImage->save();
                }
            }

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'prImages' => $prImages,
            'chars' => (empty($chars)) ? [new ProductChar()] : $chars,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        $model->delete();
        if ($model->delete()){
            StaticFunctions::deleteImage($image , $id , 'product');
        }

        return $this->redirect(['index']);
    }

    public function actionDelItem($id)
    {
        $model = ProductImage::findOne($id);
        $model->delete();
        return $this->redirect(['/product/update' , 'id' => $model->product_id]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php


namespace frontend\controllers;


//use app\models\Product;
use common\models\Category;
use common\models\ProductComment;
use common\models\ProductImage;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Product;

class ProductController extends Controller
{

    public function actionByCat($id)
    {
        $this->layout = 'main2';
        $mainCategory = Category::findOne($id);
        $models = Category::find()->where(['parent_id' => $id , 'status' => 1])->all();
        $newProducts = \common\models\Product::find()->where(['status' => 1 ])->orderBy(['created_at' => SORT_DESC])->limit(15)->all();
        return $this->render('by-cat' , [
            'mainCategory' => $mainCategory,
            'models' => $models,
            'newProducts' => $newProducts
        ]);
    }

    public function actionCategory($id)
    {
        $parentCategory = NULL;
        $this->layout = 'main3';
        $mainCategory = Category::findOne($id);
        if ($mainCategory->parent_id != NULL){
            $parentCategory = Category::findOne($mainCategory->parent_id);
        }

        $query =  \common\models\Product::find()->where(['status' => 1 , 'category_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' =>$query,
            'pagination' => [
                'pageSize' => 15,
                'totalCount' => $query->count(),
            ]
        ]);

        $dataProviderGrid = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
                'totalCount' => $query->count()
            ]
        ]);

        return $this->render('category' , [
            'dataProvider' => $dataProvider,
            'mainCategory' => $mainCategory,
            'parentCategory' => $parentCategory,
            'dataProviderGrid' => $dataProviderGrid
        ]);
    }

    public function actionView($slug)
    {
        $this->layout = 'product-view';
        if (!empty($slug)){
            $model = \common\models\Product::findOne(['slug' => $slug]);
            if (!empty($model)){
                $category = Category::findOne(['id' => $model->category_id]);
                $recomentProducts = Product::find()->where(['status' => 1 , 'category_id' => $model->category_id])->andWhere(['not in' , 'id' , $model->id])->limit(15)->all();
                $comment = new ProductComment();
                if (Yii::$app->request->isPost && $comment->load(\Yii::$app->request->post())){
                    $comment->product_id = $model->id;
                    $comment->save();
                    if ($comment->save()){
                        return $this->refresh();
                    }

                }
                return $this->render('view' , [
                    'category' => $category,
                    'model' => $model,
                    'recomentProducts' => $recomentProducts,
                    'comment' => $comment
                ]);
            }else{
                return $this->redirect('/site/error');
            }
        }else{
            return $this->redirect('/site/error');
        }


    }
}
<?php


namespace frontend\controllers;


//use app\models\Product;
use common\models\Category;
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
        $dateProvider = new ActiveDataProvider([
            'query' =>$query,
            'pagination' => [
                'pageSize' => 15,
                'totalCount' => $query->count(),
            ]
        ]);
        return $this->render('category' , [
            'dateProvider' => $dateProvider,
            'mainCategory' => $mainCategory,
            'parentCategory' => $parentCategory,
        ]);
    }

    public function actionView($slug)
    {
        $this->layout = 'main2';
        if (!empty($slug)){
            $model = \common\models\Product::findOne(['slug' => $slug]);
            if (!empty($model)){
                return $this->render('view');
            }else{
                return $this->redirect('/site/error');
            }
        }else{
            return $this->redirect('/site/error');
        }


    }
}
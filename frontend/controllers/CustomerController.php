<?php


namespace frontend\controllers;


use common\models\CustomerUser;
use common\models\Registration;
use frontend\models\LoginForm;
use Yii;
use yii\web\Controller;

class CustomerController extends Controller
{
    public $layout = 'cart';
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()){

            return $this->redirect('profile');
        }

        return $this->render('login' , [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('login');
        }

        $userId = Yii::$app->user->getId();
        $user = CustomerUser::findOne($userId);
        return $this->render('profile' , [
            'user' => $user,
        ]);
    }

    public function actionRegistration()
    {
        $model = new Registration();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            if ($model->validate() && $model->register()){
                Yii::$app->session->addFlash('success' , "Muvaffaqiyatli ro'yhatdan o'tdingiz");
                return  $this->redirect('login');
            }
        }
        return $this->render('registration' , [
            'model' => $model
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
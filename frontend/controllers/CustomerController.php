<?php


namespace frontend\controllers;


use common\models\Customer;
use common\models\CustomerUser;
use common\models\District;
use common\models\Order;
use common\models\OrderDetail;
use common\models\Registration;
use frontend\models\LoginForm;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use function Symfony\Component\Mime\Header\get;
use function Symfony\Component\Mime\Header\getId;

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
        $this->layout = 'profile';
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
                Yii::$app->session->setFlash('success' , "Muvaffaqiyatli ro'yhatdan o'tdingiz");
                return  $this->redirect('login');
            }
        }
        return $this->render('registration' , [
            'model' => $model
        ]);
    }

    public function actionGetDistricts($region_id)
    {
        $districts = District::find()
            ->where(['region_id' => $region_id])
            ->all();

        $options = [];
        foreach ($districts as $district) {
            $options[$district->id] = $district->name_uz;
        }

        return Json::encode($options);
    }

    public function actionOrderList()
    {
        $this->layout = 'profile';
        $userId = Yii::$app->user->getId();
        $user = CustomerUser::findOne($userId);
        $models = $user->customerOrders;

        return $this->render('order-list' , [
            'models' => $models,
        ]);
    }

    public function actionOrderDetail($id)
    {
        $this->layout = 'profile';
        $order = Order::findOne($id);

        return $this->render('order-detail' , [
            'order' => $order
        ]);
    }

    public function actionSettings()
    {
        $this->layout = 'profile';
        return $this->render('settings');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
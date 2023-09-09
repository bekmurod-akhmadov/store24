<?php


namespace common\models;


use yii\base\Model;

class Registration extends Model
{
    public $username;
    public $confirmation_code;

    public function rules()
    {
        return [
            [['username' , 'confirmation_code'] , 'required'],
            ['username' , 'string' , 'max' => 20 , 'min' => 4],
            ['username' , 'unique' , 'targetClass' => '\common\models\CustomerUser'],
            ['confirmation_code' , 'string' , 'min' => 6 , 'max' => 16],

        ];
    }

    public function attributeLabels()
    {
        return [
          'username' => 'Foydalanuvchi nomi',
          'confirmation_code' => 'Parol'
        ];
    }

    public function register()
    {
        $model = new CustomerUser();
        $model->username = $this->username;
        $model->confirmation_code = \Yii::$app->security->generatePasswordHash($this->confirmation_code);
        $model->status = 0;
        $model->save();
        if ($model->save()){
            return true;
        }else{
            echo "<pre>";
            print_r($model->getErrors());die;
        }
    }
}
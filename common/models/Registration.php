<?php


namespace common\models;


use yii\base\Model;

class Registration extends Model
{
    public $username;
    public $confirmation_code;
    public $last_name;
    public $first_name;
    public $region_id;
    public $district_id;
    public $address;
    public $zipcode;
    public $phone_number;

    public function rules()
    {
        return [
            [['zipcode','phone_number','username' , 'confirmation_code' , 'last_name' , 'first_name' , 'region_id' , 'district_id' , 'address'] , 'required'],
            ['username' , 'string' , 'max' => 20 , 'min' => 4],
            [['last_name' , 'first_name','phone_number' , 'zipcode'] , 'string' , 'max' => 255 , 'min' => 5],
            ['username' , 'unique' , 'targetClass' => '\common\models\CustomerUser'],
            ['phone_number' , 'unique' , 'targetClass' => '\common\models\CustomerAddress'],
            ['confirmation_code' , 'string' , 'min' => 6 , 'max' => 16],
            [['region_id' , 'district_id'] , 'integer']

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Foydalanuvchi nomi',
            'confirmation_code' => 'Parol',
            'last_name' => 'Ismi',
            'first_name' => 'Familiyasi',
            'region_id' => 'Viloyat',
            'district_id' => "Tuman",
            'address' => "Ko'cha nomi uy raqami(To'liq)",
            'zipcode' => 'Zipcode',
            'phone_number' => 'Telefon nomer'
        ];
    }

    public function register()
    {
        $model = new CustomerUser();
        $model->username = $this->username;
        $model->confirmation_code = \Yii::$app->security->generatePasswordHash($this->confirmation_code);
        $model->status = 0;
        $model->save();
        $customer = new Customer();
        $customer->last_name = $this->last_name;
        $customer->first_name = $this->first_name;
        $customer->customer_user_id = $model->id;
        $customer->registered_at = date('Y-m-d H:i:s');
        $customer->save();
        $customerAddress = new CustomerAddress();
        $customerAddress->customer_id = $customer->id;
        $customerAddress->region_id = $this->region_id;
        $customerAddress->district_id = $this->district_id;
        $customerAddress->address = $this->address;
        $customerAddress->zipcode = $this->zipcode;
        $customerAddress->phone_number = $this->phone_number;
        $customerAddress->save();

        if ($model->save() && $customer->save() && $customerAddress->save()){
            return true;
        }else{
            echo "<pre>";
            print_r($model->getErrors());die;
        }
    }

    public function getRegions()
    {
        return Region::find()->all();
    }
}
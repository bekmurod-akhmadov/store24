<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int $customer_user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $gender
 * @property string $birth_date
 * @property string $registered_at
 * @property int $status
 *
 * @property CustomerAddress[] $customerAddresses
 * @property CustomerUser $customerUser
 * @property Order[] $orders
 * @property PaymentMethod[] $paymentMethods
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_user_id', 'first_name', 'last_name', 'middle_name', 'gender', 'birth_date', 'registered_at'], 'required'],
            [['customer_user_id', 'status'], 'integer'],
            [['birth_date', 'registered_at' , 'status'], 'safe'],
            ['status' , 'default' , 'value' => 0],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['middle_name'], 'string', 'max' => 200],
            [['gender'], 'string', 'max' => 20],
            [['customer_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerUser::class, 'targetAttribute' => ['customer_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_user_id' => 'Customer User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
            'registered_at' => 'Registered At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[CustomerAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAddresses()
    {
        return $this->hasMany(CustomerAddress::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[CustomerUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerUser()
    {
        return $this->hasOne(CustomerUser::class, ['id' => 'customer_user_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[PaymentMethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethods()
    {
        return $this->hasMany(PaymentMethod::class, ['customer_id' => 'id']);
    }

    public function getDistricts()
    {
        return Region::find()->all();
    }

    public function getAdress()
    {
        return new CustomerAddress();
    }


}

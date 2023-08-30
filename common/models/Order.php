<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string $ordered_at
 * @property int|null $customer_address_id
 * @property int $status
 * @property string $required_at
 * @property string|null $updated_at
 *
 * @property Customer $customer
 * @property CustomerAddress $customerAddress
 * @property OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'customer_address_id', 'status'], 'integer'],
            [['ordered_at', 'status', 'required_at'], 'required'],
            [['ordered_at', 'required_at', 'updated_at'], 'safe'],
            [['customer_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerAddress::class, 'targetAttribute' => ['customer_address_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'ordered_at' => 'Ordered At',
            'customer_address_id' => 'Customer Address ID',
            'status' => 'Status',
            'required_at' => 'Required At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[CustomerAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAddress()
    {
        return $this->hasOne(CustomerAddress::class, ['id' => 'customer_address_id']);
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }
}

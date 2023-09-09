<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_address".
 *
 * @property int $id
 * @property int $customer_id
 * @property int|null $region_id
 * @property int $district_id
 * @property string $address
 * @property string $zipcode
 * @property string $phone_number
 *
 * @property Customer $customer
 * @property District $district
 * @property Order[] $orders
 * @property Region $region
 */
class CustomerAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'district_id', 'address', 'zipcode', 'phone_number'], 'required'],
            [['customer_id', 'region_id', 'district_id'], 'integer'],
            [['address'], 'string'],
            [['zipcode', 'phone_number'], 'string', 'max' => 20],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::class, 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
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
            'region_id' => 'Region ID',
            'district_id' => 'District ID',
            'address' => 'Address',
            'zipcode' => 'Zipcode',
            'phone_number' => 'Phone Number',
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
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['customer_address_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }
}
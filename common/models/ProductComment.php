<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_comment".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int $customer_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $rate
 * @property int|null $status
 */
class ProductComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_id', 'rate', 'status'], 'integer'],
            [['customer_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'rate' => 'Rate',
            'status' => 'Status',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className() , ['id' , 'product_id']);
    }
}

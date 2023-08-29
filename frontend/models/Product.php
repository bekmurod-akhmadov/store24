<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $body
 * @property string|null $image
 * @property int $category_id
 * @property int $brand_id
 * @property string $sku
 * @property float $price
 * @property float|null $discount
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $status
 * @property int|null $sale
 * @property int|null $new
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'body', 'category_id', 'brand_id', 'sku', 'price'], 'required'],
            [['body'], 'string'],
            [['category_id', 'brand_id', 'status', 'sale', 'new'], 'integer'],
            [['price', 'discount'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'image', 'sku'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'body' => 'Body',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'sku' => 'Sku',
            'price' => 'Price',
            'discount' => 'Discount',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'status' => 'Status',
            'sale' => 'Sale',
            'new' => 'New',
        ];
    }
}

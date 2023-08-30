<?php

namespace common\models;

use frontend\widgets\Brands;
use frontend\widgets\Categories;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
 * @property string|null $slug
 */
class Product extends \yii\db\ActiveRecord
{
    public $gallery = [];
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
            ['image' , 'image' ,  'extensions' => 'jpg, gif, png , svg , jpeg'],
            [['price', 'discount'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'image', 'sku'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
            [['slug'], 'string', 'max' => 300],
        ];
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'description' => 'Description',
            'body' => 'Tovar haqida',
            'image' => 'Rasm',
            'category_id' => 'Kategoriyasi',
            'brand_id' => 'Brand',
            'sku' => 'Sku',
            'price' => 'Narxi',
            'discount' => 'Aksiya %',
            'created_at' => 'Qo\'shilgan vaqti',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'status' => 'Status',
            'sale' => 'Sale',
            'new' => 'New',
        ];
    }

    // barcha status 1 bolga brandlarni olish
    public function getBrands()
    {
        return Brand::find()->all();
    }

    // brand_id boyicha 1 ta brandni olish
    public function getBrand()
    {
        return $this->hasOne(Brand::className() , ['id' => 'brand_id']);
    }
        // bazadan barcha status 1 bolgan kategoriyalarni olish
    public function getCategories()
    {
        return Category::find()->where(['status' => 1 ])->andWhere(['not in' , 'parent_id' , 'NULL'])->all();
    }

    // category_id boyicha 1 ta categoriyani olish
    public function getCategory()
    {
        return $this->hasOne(Brand::className() , ['id' => 'category_id']);
    }

    public function getCommentCount()
    {
        $res = $this->hasMany(ProductComment::className() , ['product_id' => 'id'])->count();
        if (!empty($res)){
            return $res;
        }else{
            return 0;
        }
    }

    public function getComments()
    {
        return $this->hasMany(ProductComment::className() , ['product_id' => 'id'])->all();
    }

    public function getImages()
    {
        return $this->hasMany(ProductImage::className() , ['product_id' => 'id'])->all();
    }

    public function getChars()
    {
        $res =  $this->hasMany(ProductChar::className() , ['product_id' => 'id'])->all();
    }




}

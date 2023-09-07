<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "product_comment".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string $name
 * @property string $message
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $star
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
            [['product_id', 'status', 'star'], 'integer'],
            [['name', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Tovar',
            'name' => 'Ismi',
            'message' => 'Izoh',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'star' => 'Star',
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

    public function getProduct()
    {
        return $this->hasOne(Product::className() , ['id' => 'product_id']);
    }

}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property string $url
 * @property int|null $order_by
 * @property int $position
 * @property int|null $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'position'], 'required'],
            [['parent', 'order_by', 'position', 'status'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
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
            'parent' => 'Parent',
            'url' => 'URL',
            'order_by' => 'Order',
            'position' => 'Joylashuvi',
            'status' => 'Status',
        ];
    }

    public function getParentMenu()
    {
        return self::find()->where(['parent' => NULL])->all();
    }

    public function getChildCount()
    {
        return $this->hasMany(self::className() , ['id' => 'parent'])->count();
    }

    public function getChildMenu()
    {
        return $this->hasMany(self::className() , ['parent' => 'id'])->all();
    }
}

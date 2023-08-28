<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $image
 * @property int|null $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['name'], 'required'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent',
            'name' => 'Kategoriya nomi',
            'image' => 'Rasm',
            'status' => 'Status',
        ];
    }

    public function getCategories()
    {
        return self::find()->where(['parent_id' => NULL])->all();
    }

    public function getChildCategory()
    {
        return $this->hasMany(self::className() , ['parent_id' => 'id'])->all();
    }

    public function getChildCount()
    {
        return $this->hasMany(self::className() , ['parent_id' => 'id'])->count();
    }
}

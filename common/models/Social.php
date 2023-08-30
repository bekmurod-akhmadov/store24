<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property string|null $url
 * @property int|null $status
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'icon', 'url'], 'string', 'max' => 100],
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
            'icon' => 'Ikonka',
            'url' => 'URL',
            'status' => 'Status',
        ];
    }
}

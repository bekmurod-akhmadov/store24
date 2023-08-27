<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $phone
 * @property int $gender
 * @property string $date_birth
 * @property string|null $adress
 * @property int|null $status
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'phone', 'gender', 'date_birth'], 'required'],
            [['gender', 'status'], 'integer'],
            [['date_birth'], 'safe'],
            [['last_name', 'first_name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
            [['adress'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'date_birth' => 'Date Birth',
            'adress' => 'Adress',
            'status' => 'Status',
        ];
    }
}

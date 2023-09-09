<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "customer_user".
 *
 * @property int $id
 * @property string $username
 * @property int $confirmation_code
 * @property int $status
 *
 * @property Customer[] $customers
 */
class CustomerUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'confirmation_code'], 'required'],
            [['confirmation_code',], 'string' , 'max' => 255],
            [['username'], 'string', 'max' => 20],
            ['status' , 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'confirmation_code' => 'Confirmation Code',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_user_id' => 'id']);
    }

    public static function findByUsername($username){
        foreach (self::find()->all() as $user){
            if(strcasecmp($user->username,$username) === 0){
                return new static($user);
            }
        }

        return null;
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public function getId(){
        return $this->id;
    }

    public function getAuthKey(){

    }

    public function validateAuthKey($authKey){

    }

    public function validatePassword($password){

        return Yii::$app->security->validatePassword($password,$this->confirmation_code);
    }

    public static function findIdentityByAccessToken($token,$type=null){

    }
}

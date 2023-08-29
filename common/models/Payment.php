<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $amount
 * @property int|null $payment_system_id
 * @property int|null $transaction_id
 * @property string|null $created_at
 * @property int|null $status
 *
 * @property Order $order
 * @property PaymentSystem $paymentSystem
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'amount', 'payment_system_id', 'transaction_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['payment_system_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentSystem::class, 'targetAttribute' => ['payment_system_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'amount' => Yii::t('app', 'Amount'),
            'payment_system_id' => Yii::t('app', 'Payment System ID'),
            'transaction_id' => Yii::t('app', 'Transaction ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery|OrderQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[PaymentSystem]].
     *
     * @return \yii\db\ActiveQuery|PaymentSystemQuery
     */
    public function getPaymentSystem()
    {
        return $this->hasOne(PaymentSystem::class, ['id' => 'payment_system_id']);
    }

    /**
     * {@inheritdoc}
     * @return PaymentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentsQuery(get_called_class());
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_transaction".
 *
 * @property int $id
 * @property int $member_cart_id
 * @property int $payment_type 1 = Bank transfer; 2 = SimplePay;
 * @property int $amount
 * @property string $account_number
 * @property string $account_name
 * @property string $created_date
 */
class PaymentTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_cart_id', 'payment_type', 'amount', 'account_number', 'account_name'], 'required'],
            [['member_cart_id', 'payment_type', 'amount'], 'integer'],
            [['created_date'], 'safe'],
            [['account_number'], 'string', 'max' => 32],
            [['account_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_cart_id' => 'Member Cart ID',
            'payment_type' => 'Payment Type',
            'amount' => 'Amount',
            'account_number' => 'Account Number',
            'account_name' => 'Account Name',
            'created_date' => 'Created Date',
        ];
    }
}

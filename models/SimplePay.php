<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "simple_pay".
 *
 * @property string $account_number
 * @property int $user_id
 * @property int $balance
 * @property string $created_date
 * @property string|null $updated_date
 */
class SimplePay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'simple_pay';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_number', 'user_id', 'balance'], 'required'],
            [['user_id', 'balance'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['account_number'], 'string', 'max' => 8],
            [['account_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account_number' => 'Account Number',
            'user_id' => 'User ID',
            'balance' => 'Balance',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}

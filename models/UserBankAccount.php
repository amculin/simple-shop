<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_bank_account".
 *
 * @property int $id
 * @property int $user_id
 * @property int $bank_id
 * @property int $account_number
 * @property string $created_date
 * @property string|null $updated_date
 */
class UserBankAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_bank_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'bank_id', 'account_number'], 'required'],
            [['user_id', 'bank_id', 'account_number'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'bank_id' => 'Bank ID',
            'account_number' => 'Account Number',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}

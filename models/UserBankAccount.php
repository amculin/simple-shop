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
 *
 * @property DataBank $bank
 * @property User $user
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
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataBank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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

    /**
     * Gets query for [[Bank]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(DataBank::className(), ['id' => 'bank_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

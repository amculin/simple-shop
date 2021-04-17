<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_bank".
 *
 * @property int $id
 * @property string $bank_name
 * @property string $created_date
 * @property string|null $updated_date
 *
 * @property UserBankAccount[] $userBankAccounts
 */
class DataBank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_name'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['bank_name'], 'string', 'max' => 48],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_name' => 'Bank Name',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[UserBankAccounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserBankAccounts()
    {
        return $this->hasMany(UserBankAccount::className(), ['bank_id' => 'id']);
    }
}
